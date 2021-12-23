<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_data1;
use App\Models\tbl_data2;
use App\Models\tbl_data3;
use App\Models\tbl_data4;
use App\Models\tbl_desa;
use App\Models\tbl_prov;
use App\Models\tbl_kab;
use App\Models\tbl_kec;
use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

use function PHPUnit\Framework\isEmpty;

class TblData1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = tbl_data1::select('kd_prov', 'kd_kab', 'kd_kec', 'kd_desa', 'alamat', 'b1r7', 'b1r8', 'b1r9', 'flag')
            ->where([
                ['kd_prov', '=', $request['provinsi']],
                ['kd_kab', '=', $request['kabupaten']],
                ['kd_kec', '=', $request['kecamatan']],
                ['kd_desa', '=', $request['desa']],
            ])->get();

        $desa = tbl_desa::select('desa')
            ->where([
                ['kd_prov', '=', $request['provinsi']],
                ['kd_kab', '=', $request['kabupaten']],
                ['kd_kec', '=', $request['kecamatan']],
                ['kd_desa', '=', $request['desa']],
            ])->first();;

        $indexCollection = collect([]);
        $data->each(function ($data) use ($indexCollection){
            $next = true;
            $col = collect($data);
            // if ($this->checkEmpty1($data)){
            //     $col->put('notComplete', true);
            //     $next = false;
            // } else {
            //     $col->put('notComplete', false);
            // }
            // if ($next) {
            //     $data->tbl_data2->each(function ($data) use ($col, $next){
            //         if ($this->checkEmpty2($data)){
            //             $col->put('notComplete', true);
            //             return false;
            //             $next = false;
            //         } else {
            //             $col->put('notComplete', false);
            //         }
            //     });
            // }
            // if ($next) {
            //     $data->tbl_data3->each(function ($data) use ($col, $next){
            //         if ($this->checkEmpty3($data)){
            //             $col->put('notComplete', true);
            //             return false;
            //             $next = false;
            //         } else {
            //             $col->put('notComplete', false);
            //         }
            //     });
            // }
            // if ($next) {
            //     $data->tbl_data4->each(function ($data) use ($col){
            //         if ($this->checkEmpty4($data)){
            //             $col->put('notComplete', true);
            //             return false;
            //         } else {
            //             $col->put('notComplete', false);
            //         }
            //     });
            // }
            $col->put('notComplete', false);
            $col = $col->only(['kd_prov', 'kd_kab', 'kd_kec', 'kd_desa', 'alamat', 'b1r7', 'b1r8', 'b1r9', 'flag', 'notComplete']);
            $indexCollection->push($col);
        });
        
        return view('kk.index', [
            "title" => "Daftar",
            "active" => "/data",
            "lokasi" => $request,
            "data" => $indexCollection,
            "desa" => $desa,
        ]);
    }

    public function checkEmpty1($data){
        if (empty($data->b2r1_tgl)){return true;}
        if (empty($data->b2r1_bln)){return true;}
        if (empty($data->b2r1_thn)){return true;}
        if (empty($data->nm_pencacah)){return true;}
        if (empty($data->kd_pencacah)){return true;}
        if (empty($data->b2r3_tgl)){return true;}
        if (empty($data->b2r3_bln)){return true;}
        if (empty($data->b2r3_thn)){return true;}
        if (empty($data->nm_pemeriksa)){return true;}
        if (empty($data->kd_pemeriksa)){return true;}
        if (empty($data->b2r5)){return true;}


        if (empty($data->b3r1a)){return true;}
        if ($data->b3r1a==1){
            if (empty($data->b3r1b)){return true;}
        }
        if (empty($data->b3r2) && $data->b3r2!=0){return true;}
        if (empty($data->b3r3)){return true;}
        if (empty($data->b3r4a)){return true;}
        if ($data->b3r4a=='1'||$data->b3r4a=='2'||$data->b3r4a=='3'){
            if (empty($data->b3r4b)){return true;}
        }
        if (empty($data->b3r5a)){return true;}
        if ($data->b3r5a=='01'||$data->b3r5a=='02'||$data->b3r5a=='03'||$data->b3r5a=='04'||$data->b3r5a=='05'||$data->b3r5a=='06'||$data->b3r5a=='07'){
            if (empty($data->b3r5b)){return true;}
        }
        if (empty($data->b3r6) && $data->b3r6!=0){return true;}
        if (empty($data->b3r7)){return true;}
        if (empty($data->b3r8)){return true;}
        if (empty($data->b3r9a)){return true;}
        if ($data->b3r9a=='1'){
            if (empty($data->b3r9b)){return true;}
        }
        if (empty($data->b3r10)){return true;}
        if (empty($data->b3r11a)){return true;}
        if ($data->b3r11a=='1'||$data->b3r11a=='2'||$data->b3r11a=='3'){
            if (empty($data->ber11b)){return true;}
        }
        if (empty($data->b3r12)){return true;}


        if (empty($data->b6r1k1)){return true;}
        if (empty($data->b6r1k2)){return true;}
        if (empty($data->b6r2)){return true;}


        if (empty($data->b7r1a)){return true;}
        if (empty($data->b7r1b)){return true;}
        if (empty($data->b7r1c)){return true;}
        if (empty($data->b7r1d)){return true;}
        if (empty($data->b7r1e)){return true;}
        if (empty($data->b7r1f)){return true;}
        if (empty($data->b7r1g)){return true;}
        if (empty($data->b7r1h)){return true;}
        if (empty($data->b7r1i)){return true;}
        if (empty($data->b7r1j)){return true;}
        if (empty($data->b7r1k)){return true;}
        if (empty($data->b7r1l)){return true;}
        if (empty($data->b7r1m)){return true;}
        if (empty($data->b7r1n)){return true;}
        if (empty($data->b7r1o)){return true;}
        if (empty($data->b7r2a)){return true;}
        if (empty($data->b7r2b)){return true;}
        if (empty($data->b7r3a1)){return true;}
        if ($data->b7r3a1=='1'){
            if (empty($data->b7r3a2)){return true;}
        }
        if (empty($data->b7r3b)){return true;}
        if (empty($data->b7r4a)){return true;}
        if (empty($data->b7r4b)){return true;}
        if (empty($data->b7r4c)){return true;}
        if (empty($data->b7r4d)){return true;}
        if (empty($data->b7r4e)){return true;}
        if (empty($data->b7r5a)){return true;}
        if (empty($data->b7r6a)){return true;}
        if (empty($data->b7r6b)){return true;}
        if (empty($data->b7r6c)){return true;}
        if (empty($data->b7r6d)){return true;}
        if (empty($data->b7r6e)){return true;}
        if (empty($data->b7r6f)){return true;}
        if (empty($data->b7r6g)){return true;}
        if (empty($data->b7r6h)){return true;}
        if (empty($data->b7r6i)){return true;}
        

        return false;
    }
    public function checkEmpty2($data){
        if (empty($data->b4k2_nama)){return true;}
        if (empty($data->b4k2_nik)){return true;}
        if (empty($data->b4k3)){return true;}
        if (empty($data->b4k4)){return true;}
        if (empty($data->b4k5)){return true;}
        if (empty($data->b4k6)){return true;}
        if ($data->b4k6=='2'||$data->b4k6=='3') {
            if (empty($data->b4k7)){return true;}
        }
        if (empty($data->b4k8)){return true;}
        if (empty($data->b4k9)){return true;}
        if ($data->b4k4=='2' && $data->b4k5>9 && $data->b4k5<50 && $data->b4k6=='2') {
            if (empty($data->b4k10)){return true;}
            if (empty($data->b4k11)){return true;}
        }
        if (empty($data->b4k12)){return true;}
        if (empty($data->b4k13)){return true;}
        if (empty($data->b4k14)){return true;}
        if ($data->b4k5>4) {
            if (empty($data->b4k15)){return true;}
            if ($data->b4k15=='1'||$data->b4k15=='2') {
                if (empty($data->b4k16)){return true;}
                if (empty($data->b4k17)){return true;}
                if (empty($data->b4k18)){return true;}
            }
            if (empty($data->b4k19)){return true;}
            if (empty($data->b4k20)){return true;}
            if ($data->b4k20=='1') {
                if (empty($data->b4k21)){return true;}
                if (empty($data->b4k22)){return true;}
            }
        }
        if (empty($data->b4k23)){return true;}
        if (empty($data->b4k24)){return true;}
        if (empty($data->b4k25)){return true;}
        if (empty($data->b4k26)){return true;}


        return false;
    }
    public function checkEmpty3($data){
        if (empty($data->b5k2)){return true;}
        if (empty($data->b5k3)){return true;}
        if (empty($data->b5k4)){return true;}
        if ($data->b5k4=='1') {
            if (empty($data->b5k5)){return true;}
            if (empty($data->b5k6)){return true;}
            if (empty($data->b5k7)){return true;}
            if (empty($data->b5k8)){return true;}
        }

        return false;
    }
    public function checkEmpty4($data){
        if (empty($data->b7r5bk1)){return true;}
        if (empty($data->b7r5bk2_usaha)){return true;}
        if (empty($data->b7r5bk2_kode)){return true;}
        if (empty($data->b7r5bk3)){return true;}
        if (empty($data->b7r5bk4)){return true;}
        if (empty($data->b7r5bk5)){return true;}
        
        return false;
    }

    public function nmtempat(Request $request){
        $prov = tbl_prov::select('prov')
        ->where([
            ['kd_prov', '=', $request['kd_prov']],
        ])->first();

        $kab = tbl_kab::select('kab')
        ->where([
            ['kd_prov', '=', $request['kd_prov']],
            ['kd_kab', '=', $request['kd_kab']],
        ])->first();

        $kec = tbl_kec::select('kec')
        ->where([
            ['kd_prov', '=', $request['kd_prov']],
            ['kd_kab', '=', $request['kd_kab']],
            ['kd_kec', '=', $request['kd_kec']],
        ])->first();

        $desa = tbl_desa::select('desa')
        ->where([
            ['kd_prov', '=', $request['kd_prov']],
            ['kd_kab', '=', $request['kd_kab']],
            ['kd_kec', '=', $request['kd_kec']],
            ['kd_desa', '=', $request['kd_desa']],
        ])->first();
        return response()->json(['nm_prov'=>$prov->prov,'nm_kab'=>$kab->kab,'nm_kec'=>$kec->kec,'nm_desa'=>$desa->desa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $prov = tbl_prov::get();
        $kab = tbl_kab::get();
        $kec = tbl_kec::get();
        $desa = tbl_desa::get();

        return view('kk.add', [
            "title" => "Tambah Data",
            "active" => "/data/tambah",
            "prov" => $prov,
            "kab" => $kab,
            "kec" => $kec,
            "desa" => $desa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBlok1(Request $request)
    {
        $rules = [
            'kd_prov' => ['required', 'size:2'],
            'kd_kab' => ['required', 'size:2'],
            'kd_kec' => ['required', 'size:3'],
            'kd_desa' => ['required', 'size:3'],
            'nm_dusun' => ['max:255'],
            'alamat' => ['max:255'],
            'b1r7' => ['required', 'size:16', 'unique:tbl_data1s,b1r7'],
            'b1r8' => ['required', 'max:255'],
            'b1r9' => [ ],
            'b1r10' => [ ],
        ];
        $customMessages = [
            'kd_prov.required' => 'Rincian ini harus diisi',
            'kd_kab.required' => 'Rincian ini harus diisi',
            'kd_kec.required' => 'Rincian ini harus diisi',
            'kd_desa.required' => 'Rincian ini harus diisi',
            'b1r7.required' => 'Rincian ini harus diisi',
            'b1r7.size' => 'Nomor KK harus terdiri dari 16 karakter',
            'b1r7.unique' => 'Nomor KK sudah ada',
            'b1r8.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $nm = explode(' ', $request['alamat']);
        
        if ($validator->passes()) {
            $tbl_data1 = new tbl_data1([
                'kd_prov' => $request['kd_prov'],
                'kd_kab' => $request['kd_kab'],
                'kd_kec' => $request['kd_kec'],
                'kd_desa' => $request['kd_desa'],
                'nm_dusun' => $request['nm_dusun'],
                'nm_rw' => $nm[3],
                'nm_rt' => $nm[1],
                'alamat' => $request['alamat'].' DUSUN '.$request['nm_dusun'],
                'b1r7' => $request['b1r7'],
                'b1r8' => $request['b1r8'],
                'b1r9' => $request['b1r9'],
                'b1r10' => $request['b1r10'],
                'b5_total_luas_lahan' => 0,
                'tahun' => Carbon::now()->format('Y'),
            ]);
            $tbl_data1->save();

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
			
        }

        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        
    }

    public function storeBlok2(Request $request)
    {
        $rules = [
            'b1r7Blok2' => ['required', 'size:16'],
            'b2r1' => [],
            'nm_pencacah' => ['max:255'],
            'kd_pencacah' => ['max:3'],
            'b2r3' => [],
            'nm_pemeriksa' => ['max:255'],
            'kd_pemeriksa' => ['max:3'],
            'b2r5' => ['max:1'],
        ];
        $customMessages = [
            'b1r7Blok2.required' => 'Mohon masukkan kembali No KK di Blok I',
            'b1r7Blok2.size' => 'No KK di Blok I harus berisi 16 karakter',
            'kd_pencacah.max' => 'Kode pencacah harus terdiri dari 3 karakter',
            'kd_pemeriksa.max' => 'Kode pemeriksa harus terdiri dari 3 karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data1::where('b1r7', $request['b1r7Blok2'])->first();
        
        $b2r1Arr = explode('-', $request['b2r1']);
        $b2r3Arr = explode('-', $request['b2r3']);

        if ($dataExist){
            if ($validator->passes()) {

                $dataExist->update([
                    'b2r1_tgl' => empty($b2r1Arr[2]) ? null : $b2r1Arr[2],
                    'b2r1_bln' => empty($b2r1Arr[1]) ? null : $b2r1Arr[1],
                    'b2r1_thn' => empty($b2r1Arr[0]) ? null : $b2r1Arr[0],
                    'nm_pencacah' => empty($request['nm_pencacah']) ? null : $request['nm_pencacah'],
                    'kd_pencacah' => empty($request['kd_pencacah']) ? null : $request['kd_pencacah'],
                    'b2r3_tgl' => empty($b2r3Arr[2]) ? null : $b2r3Arr[2],
                    'b2r3_bln' => empty($b2r3Arr[1]) ? null : $b2r3Arr[1],
                    'b2r3_thn' => empty($b2r3Arr[0]) ? null : $b2r3Arr[0],
                    'nm_pemeriksa' => empty($request['nm_pemeriksa']) ? null : $request['nm_pemeriksa'],
                    'kd_pemeriksa' => empty($request['kd_pemeriksa']) ? null : $request['kd_pemeriksa'],
                    'b2r5' => empty($request['b2r5']) ? null : $request['b2r5'],
                ]);
                $dataExist->save();
    
                return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
                
            }
    
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
        
    }

    public function storeBlok3(Request $request)
    {
        $rules = [
            'b1r7Blok3' => ['required', 'size:16'],
            'b3r1a' => ['max:1'],
            'b3r1b' => ['max:1'],
            'b3r2' => [],
            'b3r3' => ['max:2'],
            'b3r4a' => ['max:1'],
            'b3r4b' => ['max:1'],
            'b3r5a' => ['max:2'],
            'b3r5b' => ['max:1'],
            'b3r6' => [],
            'b3r7' => ['max:2'],
            'b3r8' => ['max:1'],
            'b3r9a' => ['max:1'],
            'b3r9b' => ['max:1'],
            'b3r10' => ['max:1'],
            'b3r11a' => ['max:1'],
            'b3r11b' => ['max:1'],
            'b3r12' => ['max:1'],
        ];
        $customMessages = [
            'b1r7Blok3.required' => 'Mohon masukkan kembali No KK di Blok I',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data1::where('b1r7', $request['b1r7Blok3'])->first();
        
        // dd($validator);

        if ($dataExist){
            if ($validator->passes()) {

                $dataExist->update([
                    'b3r1a' => empty($request['b3r1a']) ? null : $request['b3r1a'],
                    'b3r1b' => empty($request['b3r1b']) ? null : $request['b3r1b'],
                    'b3r2' => empty($request['b3r2']) && $request['b3r2']!=0 ? null : $request['b3r2'],
                    'b3r3' => empty($request['b3r3']) ? null : $request['b3r3'],
                    'b3r4a' => empty($request['b3r4a']) ? null : $request['b3r4a'],
                    'b3r4b' => empty($request['b3r4b']) ? null : $request['b3r4b'],
                    'b3r5a' => empty($request['b3r5a']) ? null : $request['b3r5a'],
                    'b3r5b' => empty($request['b3r5b']) ? null : $request['b3r5b'],
                    'b3r6' => empty($request['b3r6']) && $request['b3r6']!=0 ? null : $request['b3r6'],
                    'b3r7' => empty($request['b3r7']) ? null : $request['b3r7'],
                    'b3r8' => empty($request['b3r8']) ? null : $request['b3r8'],
                    'b3r9a' => empty($request['b3r9a']) ? null : $request['b3r9a'],
                    'b3r9b' => empty($request['b3r9b']) ? null : $request['b3r9b'],
                    'b3r10' => empty($request['b3r10']) ? null : $request['b3r10'],
                    'b3r11a' => empty($request['b3r11a']) ? null : $request['b3r11a'],
                    'b3r11b' => empty($request['b3r11b']) ? null : $request['b3r11b'],
                    'b3r12' => empty($request['b3r12']) ? null : $request['b3r12'],
                ]);
                $dataExist->save();
    
                return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
                
            }
    
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
        
    }

    public function storeBlok4Table(Request $request)
    {
        $rules = [
            'b1r7Blok4Table' => ['required', 'size:16'],
            'b4k1' => ['max:99'],
            'b4k2_nama' => ['max:255', 'required'],
            'b4k2_nik' => ['size:16', 'required', Rule::unique('tbl_data2s')->where(function ($query) use($request) { return $query->where('b4k2_nik', $request['b4k2_nik'])->where('flag', null);})],
            'b4k3' => ['max:1'],
            'b4k4' => ['max:1'],
            'b4k5' => ['max:999'],
            'b4k5_dob' => [],
            'b4k6' => ['max:1'],
            'b4k7' => ['max:1'],
            'b4k8' => ['max:1'],
            'b4k9' => ['max:2'],
            'b4k10' => ['max:1'],
            'b4k11' => ['max:1'],
            'b4k12' => ['max:2'],
            'b4k13' => ['max:1'],
            'b4k14' => ['max:1'],
            'b4k15' => ['max:1'],
            'b4k16' => ['max:2'],
            'b4k17' => ['max:1'],
            'b4k18' => ['max:1'],
            'b4k19' => ['max:1'],
            'b4k20' => ['max:1'],
            'b4k21' => ['max:2'],
            'b4k22' => ['max:1'],
            'b4k23' => ['max:2'],
            'b4k24' => ['max:2'],
            'b4k25' => ['max:1'],
            'b4k26' => ['max:3'],
        ];
        $customMessages = [
            'b1r7Blok4Table.required' => 'Mohon masukkan kembali No KK di Blok I',
            'b4k2_nama.required' => 'Rincian ini harus diisi',
            'b4k2_nik.required' => 'Rincian ini harus diisi',
            'b4k2_nik.unique' => 'NIK sudah ada',
            'b4k23.required' => 'Rincian ini harus diisi',
            'b4k24.required' => 'Rincian ini harus diisi',
            'b4k25.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data1::where('b1r7', $request['b1r7Blok4Table'])->first();
        
        if ($dataExist){
            if ($validator->passes()) {
                $tbl_data2 = new tbl_data2([
                    'b1r7' => empty($request['b1r7Blok4Table']) ? null : $request['b1r7Blok4Table'],
                    'b4k1' => empty($request['b4k1']) ? null : $request['b4k1'],
                    'b4k2_nama' => empty($request['b4k2_nama']) ? null : $request['b4k2_nama'],
                    'b4k2_nik' => empty($request['b4k2_nik']) ? null : $request['b4k2_nik'],
                    'b4k3' => empty($request['b4k3']) ? null : $request['b4k3'],
                    'b4k4' => empty($request['b4k4']) ? null : $request['b4k4'],
                    'b4k5' => empty($request['b4k5']) && $request['b4k5']!=0 ? null : $request['b4k5'],
                    'b4k5_dob' => empty($request['b4k5_dob']) ? null : $request['b4k5_dob'],
                    'b4k6' => empty($request['b4k6']) ? null : $request['b4k6'],
                    'b4k7' => empty($request['b4k7']) && $request['b4k7']!='0' ? null : $request['b4k7'],
                    'b4k8' => empty($request['b4k8']) ? null : $request['b4k8'],
                    'b4k9' => empty($request['b4k9']) && $request['b4k9']!=0 ? null : $request['b4k9'],
                    'b4k10' => empty($request['b4k10']) ? null : $request['b4k10'],
                    'b4k11' => empty($request['b4k11']) ? null : $request['b4k11'],
                    'b4k12' => empty($request['b4k12']) ? null : $request['b4k12'],
                    'b4k13' => empty($request['b4k13']) && $request['b4k13']!='0' ? null : $request['b4k13'],
                    'b4k14' => empty($request['b4k14']) ? null : $request['b4k14'],
                    'b4k15' => empty($request['b4k15']) && $request['b4k15']!='0' ? null : $request['b4k15'],
                    'b4k16' => empty($request['b4k16']) ? null : $request['b4k16'],
                    'b4k17' => empty($request['b4k17']) ? null : $request['b4k17'],
                    'b4k18' => empty($request['b4k18']) && $request['b4k18']!='0' ? null : $request['b4k18'],
                    'b4k19' => empty($request['b4k19']) ? null : $request['b4k19'],
                    'b4k20' => empty($request['b4k20']) ? null : $request['b4k20'],
                    'b4k21' => empty($request['b4k21']) ? null : $request['b4k21'],
                    'b4k22' => empty($request['b4k22']) ? null : $request['b4k22'],
                    'b4k23' => empty($request['b4k23']) ? null : $request['b4k23'],
                    'b4k24' => empty($request['b4k24']) ? null : $request['b4k24'],
                    'b4k25' => empty($request['b4k25']) ? null : $request['b4k25'],
                    'b4k26' => empty($request['b4k26']) ? null : $request['b4k26'],
                    'tahun' => Carbon::now()->format('Y'),
                ]);
                $tbl_data2->tbl_data1()->associate($dataExist);
                $dataExist->tbl_data2()->save($tbl_data2);

                if ($request['b4k3']=='1') {
                    tbl_data1::where('b1r7', $request['b1r7Blok4Table'])->update(['b1r8' => $request['b4k2_nama'],]);
                }

                $anggotaCount = tbl_data2::where('b1r7', $request['b1r7Blok4Table'])->where('flag', null)->count();
                tbl_data1::where('b1r7', $request['b1r7Blok4Table'])->update(['b1r9'=>$anggotaCount,]);

                $currentAge = Carbon::parse($request['b4k5_dob'])->age;
                $tbl_data2->update(['b4k5' => $currentAge,]);

                return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
    }

    public function storeBlok5Table(Request $request)
    {
        $rules = [
            'b1r7Blok5Table' => ['required', 'size:16'],
            'b5k1' => ['max:2'],
            'b5k2' => ['max:255'],
            'b5k3' => ['max:1'],
            'b5k4' => ['max:1'],
            'b5k5' => ['max:255'],
            'b5k6' => [],
            'b5k7' => ['max:1'],
            'b5k8' => ['max:255'],
        ];
        $customMessages = [
            'b1r7Blok5Table.required' => 'Mohon masukkan kembali No KK di Blok I',
            'b5k1.max' => 'Jumlah maksimal sertifikat yang dapat dicatat adalah 99',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data1::where('b1r7', $request['b1r7Blok5Table'])->first();
        $total_luas_lahan = $dataExist['b5_total_luas_lahan'] + $request['b5k6'];

        if ($dataExist){
            if ($validator->passes()) {
                $dataExist->update([
                    'b5_total_luas_lahan' => $total_luas_lahan,
                ]);
                $dataExist->save();
                $tbl_data3 = new tbl_data3([
                    'b1r7' => $request['b1r7Blok5Table'],
                    'b5k1' => empty($request['b5k1']) ? null : $request['b5k1'],
                    'b5k2' => empty($request['b5k2']) ? null : $request['b5k2'],
                    'b5k3' => empty($request['b5k3']) ? null : $request['b5k3'],
                    'b5k4' => empty($request['b5k4']) ? null : $request['b5k4'],
                    'b5k5' => empty($request['b5k5']) ? null : $request['b5k5'],
                    'b5k6' => empty($request['b5k6']) && $request['b5k6']!=0 ? null : $request['b5k6'],
                    'b5k7' => empty($request['b5k7']) ? null : $request['b5k7'],
                    'b5k8' => empty($request['b5k8']) ? null : $request['b5k8'],
                    'tahun' => Carbon::now()->format('Y'),
                ]);

                $tbl_data3->tbl_data1()->associate($dataExist);
                $dataExist->tbl_data3()->save($tbl_data3);
                return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
        
    }
    
    public function storeBlok6(Request $request)
    {
        $rules = [
            'b1r7Blok6' => ['required', 'size:16'],
            'b6r1k1' => ['max:255'],
            'b6r1k2' => ['max:2'],
            'b6r2' => [],
        ];
        $customMessages = [
            'b1r7Blok6.required' => 'Mohon masukkan kembali No KK di Blok I',
            'b1r7Blok6.size' => 'No KK di Blok I harus berisi 16 karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data1::where('b1r7', $request['b1r7Blok6'])->first();
        
        if ($dataExist){
            if ($validator->passes()) {
                $dataExist->update([
                    'b6r1k1' => empty($request['b6r1k1']) ? null : $request['b6r1k1'],
                    'b6r1k2' => empty($request['b6r1k2']) ? null : $request['b6r1k2'],
                    'b6r2' => empty($request['b6r2']) && $request['b6r2']!=0 ? null : $request['b6r2'],
                ]);
                $dataExist->save();
                return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
        
    }

    public function storeBlok7Table(Request $request)
    {
        $rules = [
            'b1r7Blok7Table' => ['required', 'size:16'],
            'b7r5bk0' => ['max:2'],
            'b7r5bk1' => ['max:255'],
            'b7r5bk2_usaha' => ['max:255'],
            'b7r5bk2_kode' => ['max:2'],
            'b7r5bk3' => ['max:999'],
            'b7r5bk4' => ['max:1'],
            'b7r5bk5' => ['max:1'],
        ];
        $customMessages = [
            'b1r7Blok5Table.required' => 'Mohon masukkan kembali No KK di Blok I',
            'b7r5bk0.max' => 'Jumlah maksimal Jenis usaha yang dapat dicatat adalah 99',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data1::where('b1r7', $request['b1r7Blok7Table'])->first();

        if ($dataExist){
            if ($validator->passes()) {
                $tbl_data4 = new tbl_data4([
                    'b1r7' => $request['b1r7Blok7Table'],
                    'b7r5bk0' => empty($request['b7r5bk0']) ? null : $request['b7r5bk0'],
                    'b7r5bk1' => empty($request['b7r5bk1']) ? null : $request['b7r5bk1'],
                    'b7r5bk2_usaha' => empty($request['b7r5bk2_usaha']) ? null : $request['b7r5bk2_usaha'],
                    'b7r5bk2_kode' => empty($request['b7r5bk2_kode']) ? null : $request['b7r5bk2_kode'],
                    'b7r5bk3' => empty($request['b7r5bk3']) ? 0 : $request['b7r5bk3'],
                    'b7r5bk4' => empty($request['b7r5bk4']) ? null : $request['b7r5bk4'],
                    'b7r5bk5' => empty($request['b7r5bk5']) ? null : $request['b7r5bk5'],
                    'tahun' => Carbon::now()->format('Y'),
                ]);
                $tbl_data4->tbl_data1()->associate($dataExist);
                $dataExist->tbl_data4()->save($tbl_data4);
                return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
        
    }

    public function storeBlok7(Request $request)
    {
        $rules = [
            'b1r7Blok7' => ['required', 'size:16'],
            'b7r1a' => ['max:1'],
            'b7r1b' => ['max:1'],
            'b7r1c' => ['max:1'],
            'b7r1d' => ['max:1'],
            'b7r1e' => ['max:1'],
            'b7r1f' => ['max:1'],
            'b7r1g' => ['max:1'],
            'b7r1h' => ['max:1'],
            'b7r1i' => ['max:1'],
            'b7r1j' => ['max:1'],
            'b7r1k' => ['max:1'],
            'b7r1l' => ['max:1'],
            'b7r1m' => ['max:1'],
            'b7r1n' => ['max:1'],
            'b7r1o' => ['max:1'],
            'b7r2a' => ['max:999'],
            'b7r2b' => ['max:999'],
            'b7r3a1' => ['max:1'],
            'b7r3a2' => [],
            'b7r3b' => ['max:1'],
            'b7r4a' => ['max:2'],
            'b7r4b' => ['max:2'],
            'b7r4c' => ['max:2'],
            'b7r4d' => ['max:2'],
            'b7r4e' => ['max:2'], ///end of data1
            'b7r5a' => ['max:1'],
            'b7r6a' => ['max:1'],
            'b7r6b' => ['max:1'],
            'b7r6c' => ['max:1'],
            'b7r6d' => ['max:1'],
            'b7r6e' => ['max:1'],
            'b7r6f' => ['max:1'],
            'b7r6g' => ['max:1'],
            'b7r6h' => ['max:1'],
            'b7r6i' => ['max:1'],
        ];
        $customMessages = [
            'b1r7Blok7.required' => 'Mohon masukkan kembali No KK di Blok I',
            'b1r7Blok7.size' => 'No KK di Blok I harus berisi 16 karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data1::where('b1r7', $request['b1r7Blok7'])->first();
        // $dataExist3 = tbl_data3::where('b1r7', $request['b1r7Blok7'])->first();
        
        if ($dataExist){
            if ($validator->passes()) {

                $dataExist->update([
                    'b7r1a' => empty($request['b7r1a']) ? null : $request['b7r1a'],
                    'b7r1b' => empty($request['b7r1b']) ? null : $request['b7r1b'],
                    'b7r1c' => empty($request['b7r1c']) ? null : $request['b7r1c'],
                    'b7r1d' => empty($request['b7r1d']) ? null : $request['b7r1d'],
                    'b7r1e' => empty($request['b7r1e']) ? null : $request['b7r1e'],
                    'b7r1f' => empty($request['b7r1f']) ? null : $request['b7r1f'],
                    'b7r1g' => empty($request['b7r1g']) ? null : $request['b7r1g'],
                    'b7r1h' => empty($request['b7r1h']) ? null : $request['b7r1h'],
                    'b7r1i' => empty($request['b7r1i']) ? null : $request['b7r1i'],
                    'b7r1j' => empty($request['b7r1j']) ? null : $request['b7r1j'],
                    'b7r1k' => empty($request['b7r1k']) ? null : $request['b7r1k'],
                    'b7r1l' => empty($request['b7r1l']) ? null : $request['b7r1l'],
                    'b7r1m' => empty($request['b7r1m']) ? null : $request['b7r1m'],
                    'b7r1n' => empty($request['b7r1n']) ? null : $request['b7r1n'],
                    'b7r1o' => empty($request['b7r1o']) ? null : $request['b7r1o'],
                    'b7r2a' => empty($request['b7r2a']) ? 0 : $request['b7r2a'],
                    'b7r2b' => empty($request['b7r2b']) ? 0 : $request['b7r2b'],
                    'b7r3a1' => empty($request['b7r3a1']) ? null : $request['b7r3a1'],
                    'b7r3a2' => empty($request['b7r3a2']) && $request['b7r3a2']!=0 ? null : $request['b7r3a2'],
                    'b7r3b' => empty($request['b7r3b']) ? null : $request['b7r3b'],
                    'b7r4a' => empty($request['b7r4a']) ? 0 : $request['b7r4a'],
                    'b7r4b' => empty($request['b7r4b']) ? 0 : $request['b7r4b'],
                    'b7r4c' => empty($request['b7r4c']) ? 0 : $request['b7r4c'],
                    'b7r4d' => empty($request['b7r4d']) ? 0 : $request['b7r4d'],
                    'b7r4e' => empty($request['b7r4e']) ? 0 : $request['b7r4e'],
                    'b7r5a' => empty($request['b7r5a']) ? null : $request['b7r5a'],
                    'b7r6a' => empty($request['b7r6a']) ? null : $request['b7r6a'],
                    'b7r6b' => empty($request['b7r6b']) ? null : $request['b7r6b'],
                    'b7r6c' => empty($request['b7r6c']) ? null : $request['b7r6c'],
                    'b7r6d' => empty($request['b7r6d']) ? null : $request['b7r6d'],
                    'b7r6e' => empty($request['b7r6e']) ? null : $request['b7r6e'],
                    'b7r6f' => empty($request['b7r6f']) ? null : $request['b7r6f'],
                    'b7r6g' => empty($request['b7r6g']) ? null : $request['b7r6g'],
                    'b7r6h' => empty($request['b7r6h']) ? null : $request['b7r6h'],
                    'b7r6i' => empty($request['b7r6i']) ? null : $request['b7r6i'],
                ]);
                $dataExist->save();
                return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
        
    }

    public function storeBlok8(Request $request)
    {
        $rules = [
            'b1r7Blok8' => ['required', 'size:16'],
            'catatan' => [],
        ];
        $customMessages = [
            'b1r7Blok8.required' => 'Mohon masukkan kembali No KK di Blok I',
            'b1r7Blok8.size' => 'No KK di Blok I harus berisi 16 karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data1::where('b1r7', $request['b1r7Blok8'])->first();
        // $dataExist3 = tbl_data3::where('b1r7', $request['b1r7Blok7'])->first();
        
        if ($dataExist){
            if ($validator->passes()) {

                $dataExist->update([
                    'catatan' => empty($request['catatan']) ? null : $request['catatan'],
                ]);
                $dataExist->save();
                return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_data1  $tbl_data1
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $dataExist = tbl_data1::where('b1r7', $request['b1r7'])->first();
        $f = null;
        $dataExist = tbl_data1::where('b1r7', $request['b1r7'])
        ->with('tbl_data2', function ($query) use ($f) {
            $query->where('flag', $f);
        })->with('tbl_data3', function ($query) use ($f) {
            $query->where('flag', $f);
        })->with('tbl_data4', function ($query) use ($f) {
            $query->where('flag', $f);
        })->first();
        return response()->json(['data1'=>$dataExist, 'data2'=>$dataExist['tbl_data2'], 'data3'=>$dataExist['tbl_data3'], 'data4'=>$dataExist['tbl_data4']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_data1  $tbl_data1
     * @return \Illuminate\Http\Response
     */
    public function edit($b1r7)
    {
        $data1 = tbl_data1::where('b1r7', $b1r7)->first();
        $prov = tbl_prov::get();
        $kab = tbl_kab::get();
        $kec = tbl_kec::get();
        $desa = tbl_desa::get();
        // dd($data1);

        if ($data1) {
            return view('kk.edit', [
                "title" => "Edit Data " . $b1r7,
                "active" => "/data/kk/edit",
                "prov" => $prov,
                "kab" => $kab,
                "kec" => $kec,
                "desa" => $desa,
                "data1" => $data1,
            ]);
        } else {
            abort(404);
        }

    }

    public function flagUpdate(Request $request){
        $dataExist = tbl_data1::where('b1r7', $request['flagKk'])->first();
        
        if ($dataExist){
            $dataExist->update([
                'flag' => empty($request['indexFlag']) ? null : $request['indexFlag'],
            ]);
            return response()->json(['success'=>'Flag berhasil diubah', 'flag'=>$request['indexFlag']]);
        } else {
            return response()->json(['failed'=>'No KK tidak ditemukan']);
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_data1  $tbl_data1
     * @return \Illuminate\Http\Response
     */
    public function editBlok1(Request $request)
    {
        $rules = [
            'kd_prov' => ['required', 'size:2'],
            'kd_kab' => ['required', 'size:2'],
            'kd_kec' => ['required', 'size:3'],
            'kd_desa' => ['required', 'size:3'],
            'nm_dusun' => ['max:255'],
            'alamat' => ['max:255'],
            'b1r7' => ['required', 'size:16'],
            'b1r8' => ['required', 'max:255'],
            'b1r9' => [ ],
            'b1r10' => [ ],
        ];
        $customMessages = [
            'kd_prov.required' => 'Rincian ini harus diisi',
            'kd_kab.required' => 'Rincian ini harus diisi',
            'kd_kec.required' => 'Rincian ini harus diisi',
            'kd_desa.required' => 'Rincian ini harus diisi',
            'b1r7.required' => 'Rincian ini harus diisi',
            'b1r7.size' => 'Nomor KK harus terdiri dari 16 karakter',
            'b1r8.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data1::where('b1r7', $request['b1r7Blok1'])->first();
        $nm = explode(' ', $request['alamat']);
        
        if ($dataExist){
            if ($validator->passes()) {
                $dataExist->update([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'nm_dusun' => $request['nm_dusun'],
                    'nm_rw' => $nm[3],
                    'nm_rt' => $nm[1],
                    'alamat' => $request['alamat'],
                    'b1r7' => $request['b1r7'],
                    'b1r8' => $request['b1r8'],
                    'b1r9' => $request['b1r9'],
                    'b1r10' => $request['b1r10'],
                ]);
                $dataExist->tbl_data2()->update(['b1r7'=>$request['b1r7']]);
                $dataExist->tbl_data3()->update(['b1r7'=>$request['b1r7']]);
                $dataExist->tbl_data4()->update(['b1r7'=>$request['b1r7']]);
                return response()->json(['success'=>'Data berhasil diubah', 'key'=>$validator->valid()]);	
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_data1  $tbl_data1
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_data1 $tbl_data1)
    {
        //
    }
}
