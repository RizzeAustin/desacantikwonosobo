<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_prov;
use App\Models\tbl_kab;
use App\Models\tbl_kec;
use App\Models\tbl_desa;
use App\Models\tbl_dusun;
use App\Models\tbl_rw;
use App\Models\tbl_rt;
use App\Models\spasial_tabel4;
use App\Models\spasial_tabel5;
use App\Models\spasial_tabel6;
use App\Models\spasial_tabel7;
use App\Models\spasial_tabel8;
use App\Models\spasial_tabel9;
use App\Models\spasial_tabel10;
use App\Models\spasial_tabel11;
use App\Models\spasial_tabel12;
use App\Models\spasial_tabel13;
use App\Models\spasial_tabel14;
use App\Models\spasial_tabel15;
use App\Models\spasial_tabel16;
use App\Models\spasial_tabel17;
use App\Models\spasial_tabel18;
use App\Models\spasial_tabel19;
use App\Models\spasial_tabel20;
use App\Models\spasial_tabel21;
use App\Models\spasial_tabel22;
use App\Models\spasial_tabel23;
use App\Models\spasial_tabel24;
use App\Models\spasial_tabel25;
use App\Models\spasial_tabel26;
use App\Models\spasial_tabel27;
use Carbon;
use Validator;
use DB;

class SpasialController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request['tabel'])) {
            return back()->withErrors(['tabel' => 'Isian tidak boleh kosong']);
        }
        
        return redirect('/spasial/'.$request['provinsi'].'/'.$request['kabupaten'].'/'.$request['kecamatan'].'/'.$request['desa'].'/tabel'.$request['tabel']);

    }
    public function getDesa($prov, $kab, $kec, $desa){
        $des = tbl_desa::select('desa')
        ->where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->first();
        return $des;
    }
    public function getDusun($prov, $kab, $kec, $desa){
        $d = tbl_dusun::select('id', 'nama')
        ->where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
            ['flag', '=', null],
        ])->get();
        return $d;
    }
    public function getRw($prov, $kab, $kec, $desa){
        $d = tbl_rw::select('id', 'tbl_dusun_id', 'nama')
        ->where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
            ['flag', '=', null],
        ])->get();
        return $d;
    }
    public function getRt($prov, $kab, $kec, $desa){
        $d = tbl_rt::select('id', 'tbl_dusun_id', 'tbl_rw_id', 'nama')
        ->where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
            ['flag', '=', null],
        ])->get();
        return $d;
    }

    public function tabel1($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $data = tbl_dusun::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel1', [
            "title" => "Tabel 1 Banyaknya Dusun",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $data,
        ]);
    }
    public function tabel1Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['required', 'max:255'],
            'k3' => ['max:255'],
            'k4' => ['max:1'],
            'k5' => ['max:1'],
            'k6' => ['max:1'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.required' => 'Rincian ini harus diisi',
            'k2.max' => 'Maksimal 255 karakter',
            'k3.max' => 'Maksimal 255 karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = tbl_dusun::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'kadus' => $request['k3'],
                    'jk' => $request['k4'],
                    'usia' => $request['k5'],
                    'pendidikan' => $request['k6'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $tbl_dusun = new tbl_dusun([
                    'id' => $request['k1'],
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'nama' => $request['k2'],
                    'kadus' => $request['k3'],
                    'jk' => $request['k4'],
                    'usia' => $request['k5'],
                    'pendidikan' => $request['k6'],
                    'flag' => $request['flag'],
                ]);
                $tbl_dusun->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel1Data(Request $request){
        $data = tbl_dusun::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel2($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $data = tbl_rw::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel2', [
            "title" => "Tabel 2 Banyaknya RW",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $data,
            "dusun" => $dusun,
        ]);
    }
    public function tabel2Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['required'],
            'k3' => ['required', 'max:255'],
            'k4' => ['max:255'],
            'k5' => ['max:1'],
            'k6' => ['max:1'],
            'k7' => ['max:1'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.required' => 'Rincian ini harus diisi',
            'k3.required' => 'Rincian ini harus diisi',
            'k3.max' => 'Maksimal 255 karakter',
            'k4.max' => 'Maksimal 255 karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = tbl_rw::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'tbl_dusun_id' => $request['k2'],
                    'nama' => $request['k3'],
                    'ketuarw' => $request['k4'],
                    'jk' => $request['k5'],
                    'usia' => $request['k6'],
                    'pendidikan' => $request['k7'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $tbl_rw = new tbl_rw([
                    'id' => $request['k1'],
                    'tbl_dusun_id' => $request['k2'],
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'nama' => $request['k3'],
                    'ketuarw' => $request['k4'],
                    'jk' => $request['k5'],
                    'usia' => $request['k6'],
                    'pendidikan' => $request['k7'],
                    'flag' => $request['flag'],
                ]);
                $tbl_rw->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel2Data(Request $request){
        $data = tbl_rw::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel3($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $data = tbl_rt::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel3', [
            "title" => "Tabel 3 Banyaknya RT",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $data,
            "dusun" => $dusun,
            "rw" => $rw,
        ]);
    }
    public function tabel3Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['required'],
            'k3' => ['required'],
            'k4' => ['required', 'max:255'],
            'k5' => ['max:255'],
            'k6' => ['max:1'],
            'k7' => ['max:1'],
            'k8' => ['max:1'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.required' => 'Rincian ini harus diisi',
            'k3.required' => 'Rincian ini harus diisi',
            'k4.required' => 'Rincian ini harus diisi',
            'k4.max' => 'Maksimal 255 karakter',
            'k5.max' => 'Maksimal 255 karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = tbl_rt::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'tbl_dusun_id' => $request['k2'],
                    'tbl_rw_id' => $request['k3'],
                    'nama' => $request['k4'],
                    'ketuart' => $request['k5'],
                    'jk' => $request['k6'],
                    'usia' => $request['k7'],
                    'pendidikan' => $request['k8'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $tbl_rt = new tbl_rt([
                    'id' => $request['k1'],
                    'tbl_dusun_id' => $request['k2'],
                    'tbl_rw_id' => $request['k3'],
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'nama' => $request['k4'],
                    'ketuart' => $request['k5'],
                    'jk' => $request['k6'],
                    'usia' => $request['k7'],
                    'pendidikan' => $request['k8'],
                    'flag' => $request['flag'],
                ]);
                $tbl_rt->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel3Data(Request $request){
        $data = tbl_rt::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel4($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel4::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel4', [
            "title" => "Tabel 4 Banyaknya Tempat Ibadah",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel4Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:255'],
            'k4' => ['max:255'],
            'k5' => ['min:0'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k3.max' => 'Maksimal 255 karakter',
            'k4.max' => 'Maksimal 255 karakter',
            'k5.min' => 'Rincian ini tidak boleh negatif',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel4::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'pengurus' => $request['k4'],
                    'luas' => $request['k5'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel4([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'pengurus' => $request['k4'],
                    'luas' => $request['k5'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel4Data(Request $request){
        $data = spasial_tabel4::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel5($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel5::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel5', [
            "title" => "Tabel 5 Tanah Bengkok",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel5Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:1'],
            'k4' => ['min:0'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k4.min' => 'Rincian ini tidak boleh negatif',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel5::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'kepenguasaan' => $request['k2'],
                    'jenis' => $request['k3'],
                    'luas' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel5([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'kepenguasaan' => $request['k2'],
                    'jenis' => $request['k3'],
                    'luas' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel5Data(Request $request){
        $data = spasial_tabel5::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }
    
    public function tabel6($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel6::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel6', [
            "title" => "Tabel 6 Tanah Kas Desa/Kelurahan",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel6Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:1'],
            'k4' => ['min:0'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k4.min' => 'Rincian ini tidak boleh negatif',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel6::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'kepenguasaan' => $request['k2'],
                    'jenis' => $request['k3'],
                    'luas' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel6([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'kepenguasaan' => $request['k2'],
                    'jenis' => $request['k3'],
                    'luas' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel6Data(Request $request){
        $data = spasial_tabel6::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }
    
    public function tabel7($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel7::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel7', [
            "title" => "Tabel 7 Fasilitas Pendidikan",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel7Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:255'],
            'k4' => ['min:0'],
            'k5' => ['min:0'],
            'k6' => ['max:1'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k4.min' => 'Rincian ini tidak boleh negatif',
            'k5.min' => 'Rincian ini tidak boleh negatif',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel7::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenjang' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahguru' => $request['k4'],
                    'jumlahmurid' => $request['k5'],
                    'status' => $request['k6'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel7([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenjang' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahguru' => $request['k4'],
                    'jumlahmurid' => $request['k5'],
                    'status' => $request['k6'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel7Data(Request $request){
        $data = spasial_tabel7::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel8($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel8::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel8', [
            "title" => "Tabel 8 Fasilitas Pendidikan Agama",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel8Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:255'],
            'k4' => ['min:0'],
            'k5' => ['min:0'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k4.min' => 'Rincian ini tidak boleh negatif',
            'k5.min' => 'Rincian ini tidak boleh negatif',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel8::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenjang' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahustadz' => $request['k4'],
                    'jumlahsantri' => $request['k5'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel8([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenjang' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahustadz' => $request['k4'],
                    'jumlahsantri' => $request['k5'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel8Data(Request $request){
        $data = spasial_tabel8::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel9($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel9::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel9', [
            "title" => "Tabel 9 Organisasi Masyarakat",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel9Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:255'],
            'k4' => ['min:0'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k3.max' => 'Maksimal 255 karakter',
            'k4.min' => 'Rincian ini tidak boleh negatif',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel9::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'ketua' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel9([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'nama' => $request['k2'],
                    'ketua' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel9Data(Request $request){
        $data = spasial_tabel9::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel10($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel10::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel10', [
            "title" => "Tabel 10 Organisasi Masyarakat Keagamaan",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel10Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:255'],
            'k4' => ['min:0'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k3.max' => 'Maksimal 255 karakter',
            'k4.min' => 'Rincian ini tidak boleh negatif',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel10::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'ketua' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel10([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'nama' => $request['k2'],
                    'ketua' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel10Data(Request $request){
        $data = spasial_tabel10::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel11($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel11::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel11', [
            "title" => "Tabel 11 Fasilitas Kesehatan",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel11Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['min:0'],
            'k4' => ['max:4'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k3.min' => 'Rincian ini tidak boleh negatif',
            'k4.max' => 'Maksimal 4 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel11::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'jumlahtenaga' => $request['k3'],
                    'tahunberdiri' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel11([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'nama' => $request['k2'],
                    'jumlahtenaga' => $request['k3'],
                    'tahunberdiri' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel11Data(Request $request){
        $data = spasial_tabel11::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel12($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel12::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel12', [
            "title" => "Tabel 12 Tenaga Kesehatan",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel12Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel12::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'jenis' => $request['k3'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel12([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'nama' => $request['k2'],
                    'jenis' => $request['k3'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel12Data(Request $request){
        $data = spasial_tabel12::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel13($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel13::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel13', [
            "title" => "Tabel 13 Warga Penderita Gizi buruk",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel13Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel13::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel13([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'nama' => $request['k2'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel13Data(Request $request){
        $data = spasial_tabel13::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel14($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel14::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel14', [
            "title" => "Tabel 14 Kejadian Bencana Alam",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel14Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => [],
            'k4' => ['min:0'],
            'k5' => ['min:0'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k4.min' => 'Rincian ini tidak boleh negatif',
            'k5.min' => 'Rincian ini tidak boleh negatif',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel14::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'tanggal' => $request['k3'],
                    'jumlahkorban' => $request['k4'],
                    'jumlahkerugian' => $request['k5'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel14([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'tanggal' => $request['k3'],
                    'jumlahkorban' => $request['k4'],
                    'jumlahkerugian' => $request['k5'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel14Data(Request $request){
        $data = spasial_tabel14::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel15($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel15::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel15', [
            "title" => "Tabel 15 Sarana Olahraga",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel15Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel15::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel15([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel15Data(Request $request){
        $data = spasial_tabel15::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel16($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel16::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel16', [
            "title" => "Tabel 16 Unit Kesenian dan Sarana Rekreasi",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel16Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:255'],
            'k4' => ['max:4'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k3.max' => 'Maksimal 255 karakter',
            'k4.max' => 'Maksimal 4 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel16::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'ketua' => $request['k3'],
                    'tahunberdiri' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel16([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'nama' => $request['k2'],
                    'ketua' => $request['k3'],
                    'tahunberdiri' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel16Data(Request $request){
        $data = spasial_tabel16::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel17($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel17::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel17', [
            "title" => "Tabel 17 Banyaknya Kelompok Tani dan Anggota Kelompok Tani",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel17Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel17::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'komoditi' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel17([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'nama' => $request['k2'],
                    'komoditi' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel17Data(Request $request){
        $data = spasial_tabel17::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel18($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel18::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel18', [
            "title" => "Tabel 18 Banyaknya Kelompok Wanita Tani dan Anggota Kelompok Wanita Tani",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel18Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel18::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'komoditi' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel18([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'nama' => $request['k2'],
                    'komoditi' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel18Data(Request $request){
        $data = spasial_tabel18::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel19($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel19::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel19', [
            "title" => "Tabel 19 Banyaknya Sarana dan Prasarana Ekonomi",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel19Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:4'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k3.max' => 'Maksimal 4 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel19::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'tahunberdiri' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel19([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'tahunberdiri' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel19Data(Request $request){
        $data = spasial_tabel19::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel20($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel20::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel20', [
            "title" => "Tabel 20 Sarana Lembaga Keuangan",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel20Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel20::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel20([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel20Data(Request $request){
        $data = spasial_tabel20::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel21($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel21::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel21', [
            "title" => "Tabel 21 Banyaknya Koperasi Yang Masih Aktif",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel21Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel21::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel21([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel21Data(Request $request){
        $data = spasial_tabel21::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel22($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel22::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel22', [
            "title" => "Tabel 22 Banyaknya Pengrajin Kayu atau Penggilingan Padi",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel22Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel22::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel22([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel22Data(Request $request){
        $data = spasial_tabel22::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel23($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel23::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel23', [
            "title" => "Tabel 23 Banyaknya Usaha Persewaan",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel23Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel23::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel23([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel23Data(Request $request){
        $data = spasial_tabel23::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel24($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel24::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel24', [
            "title" => "Tabel 24 Banyaknya Sektor Jasa",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel24Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel24::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel24([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'nama' => $request['k3'],
                    'jumlahpekerja' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel24Data(Request $request){
        $data = spasial_tabel24::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel25($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel25::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel25', [
            "title" => "Tabel 25 Fasilitas Jembatan",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel25Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:1'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel25::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'nama' => $request['k2'],
                    'kondisi' => $request['k3'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel25([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'nama' => $request['k2'],
                    'kondisi' => $request['k3'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel25Data(Request $request){
        $data = spasial_tabel25::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel26($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel26::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel26', [
            "title" => "Tabel 26 Banyaknya Lembaga Keamanan",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel26Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:255'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k2.max' => 'Maksimal 255 karakter',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel26::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'ketua' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel26([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'ketua' => $request['k3'],
                    'jumlahanggota' => $request['k4'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel26Data(Request $request){
        $data = spasial_tabel26::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }

    public function tabel27($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dusun = $this->getDusun($prov, $kab, $kec, $desa);
        $rw = $this->getRw($prov, $kab, $kec, $desa);
        $rt = $this->getRt($prov, $kab, $kec, $desa);
        $data = spasial_tabel27::where([
            ['kd_prov', '=', $prov],
            ['kd_kab', '=', $kab],
            ['kd_kec', '=', $kec],
            ['kd_desa', '=', $desa],
        ])->get();

        return view('spasial.tabel27', [
            "title" => "Tabel 27 Fasilitas Pengelolaan Sampah",
            "active" => "/spasial/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "dusun" => $dusun,
            "rw" => $rw,
            "rt" => $rt,
            "data" => $data,
        ]);
    }
    public function tabel27Store(Request $request){
        $rules = [
            'k1' => ['required'],
            'k2' => ['max:1'],
            'k3' => ['max:255'],
            'dusun' => ['required'],
            'rw' => ['required'],
            'rt' => ['required'],
        ];
        $customMessages = [
            'k1.required' => 'Rincian ini harus diisi, silahkan reset form',
            'k3.max' => 'Maksimal 255 karakter',
            'dusun.required' => 'Rincian ini harus diisi',
            'rw.required' => 'Rincian ini harus diisi',
            'rt.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $data = spasial_tabel27::where('id', $request['k1'])->first();
        
        if ($validator->passes()) {
            if ($data) {
                $data->update([
                    'jenis' => $request['k2'],
                    'pengurus' => $request['k3'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
            } else {
                $new = new spasial_tabel27([
                    'kd_prov' => $request['kd_prov'],
                    'kd_kab' => $request['kd_kab'],
                    'kd_kec' => $request['kd_kec'],
                    'kd_desa' => $request['kd_desa'],
                    'id' => $request['k1'],
                    'jenis' => $request['k2'],
                    'pengurus' => $request['k3'],
                    'tbl_dusun_id' => $request['dusun'],
                    'tbl_rw_id' => $request['rw'],
                    'tbl_rt_id' => $request['rt'],
                    'flag' => $request['flag'],
                ]);
                $new->save();
            }

            return response()->json(['success'=>'Data berhasil disimpan', 'key'=>$validator->valid()]);
        }
        return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
    }
    public function tabel27Data(Request $request){
        $data = spasial_tabel27::where('id', $request['id'])->first();
        return response()->json(['data'=>$data]);
    }
}
