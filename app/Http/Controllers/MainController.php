<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_prov;
use App\Models\tbl_kab;
use App\Models\tbl_kec;
use App\Models\tbl_desa;
use App\Models\tbl_data1;
use App\Models\tbl_data2;
use App\Models\tbl_data3;
use App\Models\tbl_data4;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\Imports\TblData1Import;
use App\Imports\TblData2Import;
use App\Imports\VaksinImport;
use Maatwebsite\Excel\Facades\Excel;
use Artisan;
use Storage;
use App\Models\tbl_data1old;
use App\Models\tbl_data2old;
use App\Models\tbl_data3old;

class MainController extends Controller
{
    public function index(){
        $prov = tbl_prov::get();
        $kab = tbl_kab::get();
        $kec = tbl_kec::get();
        $desa = tbl_desa::get();

        return view('landing.lokasi', [
            "title" => "Halaman Utama",
            "active" => "/landing",
            "prov" => $prov,
            "kab" => $kab,
            "kec" => $kec,
            "desa" => $desa,
        ]);
    }

    public function register(Request $request){        
        $rules = [
            'usernameRegister' => 'required|unique:users,username|min:4|max:255',
            'emailRegister' => 'required|email:dns',
            'passwordRegister' => 'required|confirmed|min:6|max:255',
            'roleRegister' => 'required',
        ];
        $customMessages = [
            'usernameRegister.required' => 'Username tidak boleh kosong',
            'usernameRegister.unique' => 'Username sudah pernah terdaftar',
            'usernameRegister.min' => 'Username minimal terdiri dari 4 karakter',
            'usernameRegister.max' => 'Username maksimal terdiri dari 255 karakter',
            'emailRegister.required' => 'Email tidak boleh kosong',
            'passwordRegister.required' => 'Password tidak boleh kosong',
            'passwordRegister.min' => 'Password minimal terdiri dari 6 karakter',
            'passwordRegister.max' => 'Password maksimal terdiri dari 255 karakter',
            'passwordRegister.confirmed' => 'Password tidak sama',
            'roleRegister.required' => 'Role tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->passes()) {
            
            $request['passwordRegister'] = Hash::make($request['passwordRegister']); 
            $user = new User([
                'username' => $request['usernameRegister'],
                'email' => $request['emailRegister'], 
                'password' => $request['passwordRegister'],
                'role' => $request['roleRegister'],
                'flag' => 'inactive',
            ]);
            $user->save();
            return response()->json(['success'=>'Register berhasil, Silahkan hubungi Admin untuk aktivasi', 'key'=>$validator->valid()]);
            
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $credentials['flag'] = 'active';
        
        $user = User::where('username', $credentials['username'])->first();
        if ($user['role']=='pengentri') {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/data/add');
            }
            return back()->with('loginFailed', 'Pengguna tidak ditemukan / Password salah');
        } else {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/landing');
            }
            return back()->with('loginFailed', 'Pengguna tidak ditemukan / Password salah');
        }


    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function dump(){
        Artisan::call('backup:run', [
            '--only-db' => true,
            '--disable-notifications' =>true
        ]);
        $files = scandir(storage_path('app/'.env('APP_NAME').'/'), SCANDIR_SORT_DESCENDING);
        $newest_file = $files[0];
        return response()->download(storage_path('app/'.env('APP_NAME').'/'.$newest_file));

    }

    public function importBip(Request $request){
        $this->validate($request, [
            'filebip' => 'required|mimes:csv,xls,xlsx'
        ]);

        $import1 = Excel::import(new TblData1Import(), $request->file(key:'filebip'));
        $import2 = Excel::import(new TblData2Import(), $request->file(key:'filebip'));

        if($import2) {
            $data1 = tbl_data1::get();
            for ($i=0; $i < $data1->count(); $i++) { 
                $anggotaCount = tbl_data2::where('b1r7', $data1[$i]->b1r7)->count();
                $data1[$i]->update(['b1r9'=>$anggotaCount,]);
            }
            return back()->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            return back()->with(['error' => 'Data Gagal Diimport!']);
        }
    }

    public function importVaksin(Request $request){
        $this->validate($request, [
            'filevaksin' => 'required|mimes:csv,xls,xlsx'
        ]);

        $import1 = Excel::toArray(new VaksinImport(), $request->file(key:'filevaksin'));
        collect(head($import1))->each(function ($row, $key) {
            tbl_data2::where('b4k2_nik', $row['nik'])->update([
                'vaksinCovid' => $row['dosis'],
            ]);
        });

        if($import1) {
            return back()->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return back()->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    
    public function pindah(){

        // $data = tbl_data1old::get();
        // for ($i=0; $i < $data->count() ; $i++) {
        //     $tbl_data1 = tbl_data1::updateOrCreate(['b1r7' => $data[$i]->b1r7],
        //     [
        //         'kd_prov' => $data[$i]->kd_prov,
        //         'kd_kab' => $data[$i]->kd_kab,
        //         'kd_kec' => $data[$i]->kd_kec,
        //         'kd_desa' => $data[$i]->kd_desa,
        //         'nm_dusun' => $data[$i]->nm_dusun,
        //         'alamat' => $data[$i]->nm_rt,
        //         'b1r7' => $data[$i]->b1r7,
        //         'b1r8' => $data[$i]->b1r8,
        //         'b1r9' => $data[$i]->b1r9,
        //         'b1r10' => $data[$i]->b1r10,
        //         'b2r1_tgl' => $data[$i]->b2r1_tgl,
        //         'b2r1_bln' => $data[$i]->b2r1_bln,
        //         'b2r1_thn' => $data[$i]->b2r1_thn,
        //         'b2r3_tgl' => $data[$i]->b2r3_tgl,
        //         'b2r3_bln' => $data[$i]->b2r3_bln,
        //         'b2r3_thn' => $data[$i]->b2r3_thn,
        //         'kd_pencacah' => $data[$i]->kd_pencacah,
        //         'kd_pemeriksa' => $data[$i]->kd_pemeriksa,
        //         'b2r5' => $data[$i]->b2r5,
        //         'b3r1a' => $data[$i]->b3r1a,
        //         'b3r1b' => $data[$i]->b3r1b,
        //         'b3r2' => $data[$i]->b3r2,
        //         'b3r3' => $data[$i]->b3r3,
        //         'b3r4a' => $data[$i]->b3r4a,
        //         'b3r4b' => $data[$i]->b3r4b,
        //         'b3r5a' => $data[$i]->b3r5a,
        //         'b3r5b' => $data[$i]->b3r5b,
        //         'b3r6' => $data[$i]->b3r6,
        //         'b3r7' => $data[$i]->b3r7,
        //         'b3r8' => $data[$i]->b3r8,
        //         'b3r9a' => $data[$i]->b3r9a,
        //         'b3r9b' => $data[$i]->b3r9b,
        //         'b3r10' => $data[$i]->b3r10,
        //         'b3r11a' => $data[$i]->b3r11a,
        //         'b3r11b' => $data[$i]->b3r11b,
        //         'b3r12' => $data[$i]->b3r12,
        //         'b5_total_luas_lahan' => (int)$data[$i]->b5_total_luas_lahan ?? 0,
        //         'b6r1k1' => $data[$i]->b6r1k1,
        //         'b6r1k2' => $data[$i]->b6r1k2,
        //         'b6r2' => (int)$data[$i]->b6r2 ?? 0,
        //         'b7r1a' => $data[$i]->b7r1a,
        //         'b7r1b' => $data[$i]->b7r1b,
        //         'b7r1c' => $data[$i]->b7r1c,
        //         'b7r1d' => $data[$i]->b7r1d,
        //         'b7r1e' => $data[$i]->b7r1e,
        //         'b7r1f' => $data[$i]->b7r1f,
        //         'b7r1g' => $data[$i]->b7r1g,
        //         'b7r1h' => $data[$i]->b7r1h,
        //         'b7r1i' => $data[$i]->b7r1i,
        //         'b7r1j' => $data[$i]->b7r1j,
        //         'b7r1k' => $data[$i]->b7r1k,
        //         'b7r1l' => $data[$i]->b7r1l,
        //         'b7r1m' => $data[$i]->b7r1m,
        //         'b7r1n' => $data[$i]->b7r1n,
        //         'b7r1o' => $data[$i]->b7r1o,
        //         'b7r2a' => (int)$data[$i]->b7r2a ?? 0,
        //         'b7r2b' => (int)$data[$i]->b7r2b ?? 0,
        //         'b7r3a1' => $data[$i]->b7r3a1,
        //         'b7r3a2' => $data[$i]->b7r3a2,
        //         'b7r3b' => $data[$i]->b7r3b,
        //         'b7r4a' => (int)$data[$i]->b7r4a ?? 0,
        //         'b7r4b' => (int)$data[$i]->b7r4b ?? 0,
        //         'b7r4c' => (int)$data[$i]->b7r4c ?? 0,
        //         'b7r4d' => (int)$data[$i]->b7r4d ?? 0,
        //         'b7r4e' => (int)$data[$i]->b7r4e ?? 0,
        //         'tahun' => $data[$i]->tahun,
        //     ]);
        // }

        // $data = tbl_data2old::get();
        // for ($i=0; $i < $data->count() ; $i++) {
        //     $tbl_data2 = tbl_data2::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b4k2_nik' => $data[$i]->b4k2_nik],
        //     [
        //         'b1r7' => $data[$i]->b1r7,
        //         'b4k1' => $data[$i]->b4k1,
        //         'b4k2_nama' => $data[$i]->b4k2_nama,
        //         'b4k2_nik' => $data[$i]->b4k2_nik,
        //         'b4k3' => $data[$i]->b4k3,
        //         'b4k4' => $data[$i]->b4k4,
        //         'b4k5' => (int)$data[$i]->b4k5,
        //         'b4k6' => $data[$i]->b4k6,
        //         'b4k7' => $data[$i]->b4k7,
        //         'b4k8' => $data[$i]->b4k8,
        //         'b4k9' => (int)$data[$i]->b4k9,
        //         'b4k10' => $data[$i]->b4k10,
        //         'b4k11' => $data[$i]->b4k11,
        //         'b4k12' => $data[$i]->b4k12,
        //         'b4k13' => $data[$i]->b4k13,
        //         'b4k14' => $data[$i]->b4k14,
        //         'b4k15' => $data[$i]->b4k15,
        //         'b4k16' => $data[$i]->b4k16,
        //         'b4k17' => $data[$i]->b4k17,
        //         'b4k18' => $data[$i]->b4k18,
        //         'b4k19' => $data[$i]->b4k19,
        //         'b4k20' => $data[$i]->b4k20,
        //         'b4k21' => $data[$i]->b4k21,
        //         'b4k22' => $data[$i]->b4k22,
        //         'b4k23' => $data[$i]->b4k23,
        //         'b4k24' => $data[$i]->b4k24,
        //         'b4k25' => $data[$i]->b4k25,
        //         'b4k26' => $data[$i]->b4k26,
        //         'tahun' => $data[$i]->tahun,
        //     ]);
        // }

        // $data = tbl_data3old::get();
        // for ($i=0; $i < $data->count() ; $i++) {
        //     if ($data[$i]->b7r5b1k1) {
        //         $tbl_data4 = tbl_data4::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b7r5bk0' => '1',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b7r5bk0' => '1',
        //             'b7r5bk1' => (int)$data[$i]->b7r5b1k1,
        //             'b7r5bk2_usaha' => null,
        //             'b7r5bk2_kode' => $data[$i]->b7r5b1k2,
        //             'b7r5bk3' => (int)$data[$i]->b7r5b1k3,
        //             'b7r5bk4' => $data[$i]->b7r5b1k4,
        //             'b7r5bk5' => $data[$i]->b7r5b1k5,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }
        //     if ($data[$i]->b7r5b2k1) {
        //         $tbl_data4 = tbl_data4::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b7r5bk0' => '2',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b7r5bk0' => '2',
        //             'b7r5bk1' => (int)$data[$i]->b7r5b2k1,
        //             'b7r5bk2_usaha' => null,
        //             'b7r5bk2_kode' => empty($data[$i]->b7r5b2k2) ? 00 : $data[$i]->b7r5b2k2,
        //             'b7r5bk3' => (int)empty($data[$i]->b7r5b2k3) ? 0 : $data[$i]->b7r5b2k3,
        //             'b7r5bk4' => $data[$i]->b7r5b2k4,
        //             'b7r5bk5' => $data[$i]->b7r5b2k5,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }
        //     if ($data[$i]->b7r5b3k1) {
        //         $tbl_data4 = tbl_data4::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b7r5bk0' => '3',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b7r5bk0' => '3',
        //             'b7r5bk1' => (int)$data[$i]->b7r5b3k1,
        //             'b7r5bk2_usaha' => null,
        //             'b7r5bk2_kode' => $data[$i]->b7r5b3k2,
        //             'b7r5bk3' => (int)$data[$i]->b7r5b3k3,
        //             'b7r5bk4' => $data[$i]->b7r5b3k4,
        //             'b7r5bk5' => $data[$i]->b7r5b3k5,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }
        //     if ($data[$i]->b7r5b4k1) {
        //         $tbl_data4 = tbl_data4::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b7r5bk0' => '4',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b7r5bk0' => '4',
        //             'b7r5bk1' => (int)$data[$i]->b7r5b4k1,
        //             'b7r5bk2_usaha' => null,
        //             'b7r5bk2_kode' => $data[$i]->b7r5b4k2,
        //             'b7r5bk3' => (int)$data[$i]->b7r5b4k3,
        //             'b7r5bk4' => $data[$i]->b7r5b4k4,
        //             'b7r5bk5' => $data[$i]->b7r5b4k5,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }
        //     if ($data[$i]->b7r5b5k1) {
        //         $tbl_data4 = tbl_data4::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b7r5bk0' => '5',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b7r5bk0' => '5',
        //             'b7r5bk1' => (int)$data[$i]->b7r5b5k1,
        //             'b7r5bk2_usaha' => null,
        //             'b7r5bk2_kode' => $data[$i]->b7r5b5k2,
        //             'b7r5bk3' => (int)$data[$i]->b7r5b5k3,
        //             'b7r5bk4' => $data[$i]->b7r5b5k4,
        //             'b7r5bk5' => $data[$i]->b7r5b5k5,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }

        //     tbl_data1::where('b1r7', $data[$i]->b1r7)->first()->update([
        //         'b7r5a' => $data[$i]->b7r5a,
        //         'b7r6a' => $data[$i]->b7r6a,
        //         'b7r6b' => $data[$i]->b7r6b,
        //         'b7r6c' => $data[$i]->b7r6c,
        //         'b7r6d' => $data[$i]->b7r6d,
        //         'b7r6e' => $data[$i]->b7r6e,
        //         'b7r6f' => $data[$i]->b7r6f,
        //         'b7r6g' => $data[$i]->b7r6g,
        //         'b7r6h' => $data[$i]->b7r6h,
        //         'b7r6i' => $data[$i]->b7r6i,
        //     ]);
        // }

        // $data = tbl_data1old::get();
        // for ($i=0; $i < $data->count() ; $i++) {
        //     if ($data[$i]->b5r1k2) {
        //         $tbl_data3 = tbl_data3::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b5k1' => '1',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b5k1' => '1',
        //             'b5k2' => $data[$i]->b5r1k2,
        //             'b5k3' => $data[$i]->b5r1k3,
        //             'b5k4' => $data[$i]->b5r1k4,
        //             'b5k5' => $data[$i]->b5r1k5,
        //             'b5k6' => empty($data[$i]->b5r1k6) ? 0 : (int)$data[$i]->b5r1k6,
        //             'b5k7' => $data[$i]->b5r1k7,
        //             'b5k8' => $data[$i]->b5r1k8,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }
        //     if ($data[$i]->b5r2k2) {
        //         $tbl_data3 = tbl_data3::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b5k1' => '2',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b5k1' => '2',
        //             'b5k2' => $data[$i]->b5r2k2,
        //             'b5k3' => $data[$i]->b5r2k3,
        //             'b5k4' => $data[$i]->b5r2k4,
        //             'b5k5' => $data[$i]->b5r2k5,
        //             'b5k6' => empty($data[$i]->b5r2k6) ? 0 : (int)$data[$i]->b5r2k6,
        //             'b5k7' => $data[$i]->b5r2k7,
        //             'b5k8' => $data[$i]->b5r2k8,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }
        //     if ($data[$i]->b5r3k2) {
        //         $tbl_data3 = tbl_data3::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b5k1' => '3',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b5k1' => '3',
        //             'b5k2' => $data[$i]->b5r3k2,
        //             'b5k3' => $data[$i]->b5r3k3,
        //             'b5k4' => $data[$i]->b5r3k4,
        //             'b5k5' => $data[$i]->b5r3k5,
        //             'b5k6' => empty($data[$i]->b5r3k6) ? 0 : (int)$data[$i]->b5r3k6,
        //             'b5k7' => $data[$i]->b5r3k7,
        //             'b5k8' => $data[$i]->b5r3k8,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }
        //     if ($data[$i]->b5r4k2) {
        //         $tbl_data3 = tbl_data3::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b5k1' => '4',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b5k1' => '4',
        //             'b5k2' => $data[$i]->b5r4k2,
        //             'b5k3' => $data[$i]->b5r4k3,
        //             'b5k4' => $data[$i]->b5r4k4,
        //             'b5k5' => $data[$i]->b5r4k5,
        //             'b5k6' => empty($data[$i]->b5r4k6) ? 0 : (int)$data[$i]->b5r4k6,
        //             'b5k7' => $data[$i]->b5r4k7,
        //             'b5k8' => $data[$i]->b5r4k8,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }
        //     if ($data[$i]->b5r5k2) {
        //         $tbl_data3 = tbl_data3::updateOrCreate(['b1r7' => $data[$i]->b1r7, 'b5k1' => '5',],
        //         [
        //             'b1r7' => $data[$i]->b1r7,
        //             'b5k1' => '5',
        //             'b5k2' => $data[$i]->b5r5k2,
        //             'b5k3' => $data[$i]->b5r5k3,
        //             'b5k4' => $data[$i]->b5r5k4,
        //             'b5k5' => $data[$i]->b5r5k5,
        //             'b5k6' => empty($data[$i]->b5r5k6) ? 0 : (int)$data[$i]->b5r5k6,
        //             'b5k7' => $data[$i]->b5r5k7,
        //             'b5k8' => $data[$i]->b5r5k8,
        //             'tahun' => $data[$i]->tahun,
        //         ]);
        //     }
        // }

        // --------------------------------    MOVING END       ----------------------------------

        // -------------------------------------------- START LINKING --------------------------------------------
        

        // $data2 = tbl_data2::get();
        // for ($i=0; $i < $data2->count(); $i++) { 
        //     $data1 = tbl_data1::select('id')->where('b1r7', $data2[$i]->b1r7)->first();
        //     $data2[$i]->update([
        //         'parent_id' => $data1->id,
        //     ]);
        // }
        // $data3 = tbl_data3::get();
        // for ($i=0; $i < $data3->count(); $i++) { 
        //     $data1 = tbl_data1::select('id')->where('b1r7', $data3[$i]->b1r7)->first();
        //     $data3[$i]->update([
        //         'parent_id' => $data1->id,
        //     ]);
        // }
        // $data4 = tbl_data4::get();
        // for ($i=0; $i < $data4->count(); $i++) { 
        //     $data1 = tbl_data1::select('id')->where('b1r7', $data4[$i]->b1r7)->first();
        //     $data4[$i]->update([
        //         'parent_id' => $data1->id,
        //     ]);
        // }

        // -------------------------------------------- END START LINKING --------------------------------------------

        // --------------------------------    START FIXING     ----------------------------------

        // $data = tbl_data1::get();
        // for ($i=0; $i < $data->count() ; $i++) {
        //     // switch ($data[$i]->kd_kab) {
        //     //     case '7':
        //     //         $data[$i]->update(['kd_kab' => '07']);
        //     //         break;
        //     // }
        //     // switch ($data[$i]->kd_kec) {
        //     //     case '10':
        //     //         $data[$i]->update(['kd_kec' => '010']);
        //     //         break;
        //     //     case '50':
        //     //         $data[$i]->update(['kd_kec' => '050']);
        //     //         break;
        //     //     case '90':
        //     //         $data[$i]->update(['kd_kec' => '090']);
        //     //         break;
        //     // }
        //     // switch ($data[$i]->kd_desa) {
        //     //     case '2':
        //     //         $data[$i]->update(['kd_desa' => '002']);
        //     //         break;
        //     //     case '1':
        //     //         $data[$i]->update(['kd_desa' => '001']);
        //     //         break;
        //     //     case '16':
        //     //         $data[$i]->update(['kd_desa' => '016']);
        //     //         break;
        //     // }
        //     $nm = explode(' ', $data[$i]->alamat);
        //     $data[$i]->update([
        //         'nm_dusun' => empty($nm[5]) ? null : $nm[5],
        //         'nm_rw' => empty($nm[3]) ? null : $nm[3],
        //         'nm_rt' => empty($nm[1]) ? null : $nm[1],
        //     ]);
        //     switch ($data[$i]->b2r1_tgl) {
        //         case '1':
        //             $data[$i]->update(['b2r1_tgl' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b2r1_tgl' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b2r1_tgl' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b2r1_tgl' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b2r1_tgl' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b2r1_tgl' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b2r1_tgl' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b2r1_tgl' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b2r1_tgl' => '09']);
        //             break;
        //     }
        //     switch ($data[$i]->b2r1_bln) {
        //         case '1':
        //             $data[$i]->update(['b2r1_bln' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b2r1_bln' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b2r1_bln' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b2r1_bln' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b2r1_bln' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b2r1_bln' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b2r1_bln' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b2r1_bln' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b2r1_bln' => '09']);
        //             break;
        //     }
        //     switch ($data[$i]->b2r3_tgl) {
        //         case '1':
        //             $data[$i]->update(['b2r3_tgl' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b2r3_tgl' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b2r3_tgl' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b2r3_tgl' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b2r3_tgl' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b2r3_tgl' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b2r3_tgl' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b2r3_tgl' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b2r3_tgl' => '09']);
        //             break;
        //     }
        //     switch ($data[$i]->b2r3_bln) {
        //         case '1':
        //             $data[$i]->update(['b2r3_bln' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b2r3_bln' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b2r3_bln' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b2r3_bln' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b2r3_bln' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b2r3_bln' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b2r3_bln' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b2r3_bln' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b2r3_bln' => '09']);
        //             break;
        //     }
        //     switch ($data[$i]->b3r3) {
        //         case '1':
        //             $data[$i]->update(['b3r3' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b3r3' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b3r3' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b3r3' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b3r3' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b3r3' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b3r3' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b3r3' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b3r3' => '09']);
        //             break;
        //         case '0':
        //             $data[$i]->update(['b3r3' => null]);
        //             break;
        //     }
        //     switch ($data[$i]->b3r5a) {
        //         case '1':
        //             $data[$i]->update(['b3r5a' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b3r5a' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b3r5a' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b3r5a' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b3r5a' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b3r5a' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b3r5a' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b3r5a' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b3r5a' => '09']);
        //             break;
        //         case '43':
        //             $data[$i]->update(['b3r5a' => null]);
        //             break;
        //         case '94':
        //             $data[$i]->update(['b3r5a' => null]);
        //             break;
        //     }
        //     switch ($data[$i]->b3r7) {
        //         case '1':
        //             $data[$i]->update(['b3r7' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b3r7' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b3r7' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b3r7' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b3r7' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b3r7' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b3r7' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b3r7' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b3r7' => '09']);
        //             break;
        //         case '88':
        //             $data[$i]->update(['b3r7' => null]);
        //             break;
        //     }
        // }

        // $data = tbl_data2::get();
        // for ($i=0; $i < $data->count() ; $i++) {
        //     if ($data[$i]->b4k6=='0') {
        //         $data[$i]->update(['b4k6'=>null]);
        //     }
        //     if ($data[$i]->b4k8=='0') {
        //         $data[$i]->update(['b4k8'=>null]);
        //     }
        //     switch ($data[$i]->b4k10) {
        //         case '0':
        //             $data[$i]->update(['b4k10' => null]);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b4k10' => null]);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b4k10' => null]);
        //             break;
        //     }
        //     if ($data[$i]->b4k11=='0') {
        //         $data[$i]->update(['b4k11'=>null]);
        //     }
        //     switch ($data[$i]->b4k12) {
        //         case '0':
        //             $data[$i]->update(['b4k12' => '00']);
        //             break;
        //         case '1':
        //             $data[$i]->update(['b4k12' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b4k12' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b4k12' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b4k12' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b4k12' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b4k12' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b4k12' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b4k12' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b4k12' => '09']);
        //             break;
        //         case '99':
        //             $data[$i]->update(['b4k12' => null]);
        //             break;
        //     }
        //     switch ($data[$i]->b4k14) {
        //         case '6':
        //             $data[$i]->update(['b4k14' => null]);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b4k14' => null]);
        //             break;
        //     }
        //     switch ($data[$i]->b4k15) {
        //         case '4':
        //             $data[$i]->update(['b4k15' => null]);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b4k15' => null]);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b4k15' => null]);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b4k15' => null]);
        //             break;
        //     }
        //     switch ($data[$i]->b4k16) {
        //         case '0':
        //             $data[$i]->update(['b4k16' => null]);
        //             break;
        //         case '00':
        //             $data[$i]->update(['b4k16' => null]);
        //             break;
        //         case '1':
        //             $data[$i]->update(['b4k16' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b4k16' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b4k16' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b4k16' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b4k16' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b4k16' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b4k16' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b4k16' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b4k16' => '09']);
        //             break;
        //         case '20':
        //             $data[$i]->update(['b4k16' => null]);
        //             break;
        //     }
        //     switch ($data[$i]->b4k18) {
        //         case '7':
        //             $data[$i]->update(['b4k18' => null]);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b4k18' => null]);
        //             break;
        //     }
        //     switch ($data[$i]->b4k21) {
        //         case '0':
        //             $data[$i]->update(['b4k21' => null]);
        //             break;
        //         case '00':
        //             $data[$i]->update(['b4k21' => null]);
        //             break;
        //         case '1':
        //             $data[$i]->update(['b4k21' => '01']);
        //             break;
        //         case '2':
        //             $data[$i]->update(['b4k21' => '02']);
        //             break;
        //         case '3':
        //             $data[$i]->update(['b4k21' => '03']);
        //             break;
        //         case '4':
        //             $data[$i]->update(['b4k21' => '04']);
        //             break;
        //         case '5':
        //             $data[$i]->update(['b4k21' => '05']);
        //             break;
        //         case '6':
        //             $data[$i]->update(['b4k21' => '06']);
        //             break;
        //         case '7':
        //             $data[$i]->update(['b4k21' => '07']);
        //             break;
        //         case '8':
        //             $data[$i]->update(['b4k21' => '08']);
        //             break;
        //         case '9':
        //             $data[$i]->update(['b4k21' => '09']);
        //             break;
        //         case '91':
        //             $data[$i]->update(['b4k21' => '01']);
        //             break;
        //     }
        //     switch ($data[$i]->b4k24) {
        //         case '1':
        //             $data[$i]->update(['b4k24' => '01']);
        //             break;
        //     }
        // }

        // $data1 = tbl_data1::get();
        // for ($i=0; $i < $data1->count(); $i++) { 
        //     if ($data1[$i]->flag=='') {
        //         $data1[$i]->update([
        //             'flag' => null,
        //         ]);
        //     }
        // }
        // $data2 = tbl_data2::get();
        // for ($i=0; $i < $data2->count(); $i++) { 
        //     if ($data2[$i]->flag=='') {
        //         $data2[$i]->update([
        //             'flag' => null,
        //         ]);
        //     }
        // }
        // $data3 = tbl_data3::get();
        // for ($i=0; $i < $data3->count(); $i++) { 
        //     if ($data3[$i]->flag=='') {
        //         $data3[$i]->update([
        //             'flag' => null,
        //         ]);
        //     }
        // }
        // $data4 = tbl_data4::get();
        // for ($i=0; $i < $data4->count(); $i++) { 
        //     if ($data4[$i]->flag=='') {
        //         $data4[$i]->update([
        //             'flag' => null,
        //         ]);
        //     }
        // }

        //--------------------------------------------- END --------------------------------------------------------

        
        // $data1 = tbl_data1::get();
        // for ($i=0; $i < $data1->count(); $i++) { 
        //     if ($data1[$i]->kd_kec=='050') {
        //         DB::table('tbl_data2s')->where('parent_id', '=', $data1[$i]->id)->delete();
        //         DB::table('tbl_data3s')->where('parent_id', '=', $data1[$i]->id)->delete();
        //         DB::table('tbl_data4s')->where('parent_id', '=', $data1[$i]->id)->delete();
        //         DB::table('tbl_data1s')->where('id', '=', $data1[$i]->id)->delete();
        //     }
        // }
    }
}
