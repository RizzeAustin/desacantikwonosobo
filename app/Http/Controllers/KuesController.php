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
use Carbon\Carbon;

class KuesController extends Controller
{

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

    public function index(Request $request){
        $desa = $this->getDesa($request['provinsi'], $request['kabupaten'], $request['kecamatan'], $request['desa']);
        return view('kues.index', [
            "title" => "Pencarian Penduduk dengan Data Kuisioner",
            "active" => "/data/kuisioner",
            "request" => $request,
            "desa" => $desa,
        ]);
    }

    public function tabelkk(Request $request){
        $desa = $this->getDesa($request['provinsi'], $request['kabupaten'], $request['kecamatan'], $request['desa']);
        $data = tbl_data1::where([
            ['kd_prov', '=', $request['provinsi']],
            ['kd_kab', '=', $request['kabupaten']],
            ['kd_kec', '=', $request['kecamatan']],
            ['kd_desa', '=', $request['desa']],
            ['flag', '=', null],
        ])->when($request['b1r10'], function ($query) use ($request) {
            return $query->where('b1r10', $request['b1r10']);
        })->when($request['kd_pencacah'], function ($query) use ($request) {
            return $query->where('kd_pencacah', $request['kd_pencacah']);
        })->when($request['kd_pemeriksa'], function ($query) use ($request) {
            return $query->where('kd_pemeriksa', $request['kd_pemeriksa']);
        })->when($request['b2r5'], function ($query) use ($request) {
            return $query->where('b2r5', $request['b2r5']);
        })->when($request['b3r1a'], function ($query) use ($request) {
            return $query->where('b3r1a', $request['b3r1a']);
        })->when($request['b3r1b'], function ($query) use ($request) {
            return $query->where('b3r1b', $request['b3r1b']);
        })->when($request['b3r2_min'], function ($query) use ($request) {
            return $query->where('b3r2', '>=', $request['b3r2_min']);
        })->when($request['b3r2_max'], function ($query) use ($request) {
            return $query->where('b3r2', '<=', $request['b3r2_max']);
        })->when($request['b3r3'], function ($query) use ($request) {
            return $query->where('b3r3', $request['b3r3']);
        })->when($request['b3r4a'], function ($query) use ($request) {
            return $query->where('b3r4a', $request['b3r4a']);
        })->when($request['b3r4b'], function ($query) use ($request) {
            return $query->where('b3r4b', $request['b3r4b']);
        })->when($request['b3r5a'], function ($query) use ($request) {
            return $query->where('b3r5a', $request['b3r5a']);
        })->when($request['b3r5b'], function ($query) use ($request) {
            return $query->where('b3r5b', $request['b3r5b']);
        })->when($request['b3r6_min'], function ($query) use ($request) {
            return $query->where('b3r6', '>=', $request['b3r6_min']);
        })->when($request['b3r6_max'], function ($query) use ($request) {
            return $query->where('b3r6', '<=', $request['b3r6_max']);
        })->when($request['b3r7'], function ($query) use ($request) {
            return $query->where('b3r7', $request['b3r7']);
        })->when($request['b3r8'], function ($query) use ($request) {
            return $query->where('b3r8', $request['b3r8']);
        })->when($request['b3r9a'], function ($query) use ($request) {
            return $query->where('b3r9a', $request['b3r9a']);
        })->when($request['b3r9b'], function ($query) use ($request) {
            return $query->where('b3r9b', $request['b3r9b']);
        })->when($request['b3r10'], function ($query) use ($request) {
            return $query->where('b3r10', $request['b3r10']);
        })->when($request['b3r11a'], function ($query) use ($request) {
            return $query->where('b3r11a', $request['b3r11a']);
        })->when($request['b3r11b'], function ($query) use ($request) {
            return $query->where('b3r11b', $request['b3r11b']);
        })->when($request['b3r12'], function ($query) use ($request) {
            return $query->where('b3r12', $request['b3r12']);
        })->when($request['b6r1k2'], function ($query) use ($request) {
            return $query->where('b6r1k2', $request['b6r1k2']);
        })->when($request['b6r2_min'], function ($query) use ($request) {
            return $query->where('b6r2', '>=', $request['b6r2_min']);
        })->when($request['b6r2_max'], function ($query) use ($request) {
            return $query->where('b6r2', '<=', $request['b6r2_max']);
        })->when($request['b7r1a'], function ($query) use ($request) {
            return $query->where('b7r1a', $request['b7r1a']);
        })->when($request['b7r1b'], function ($query) use ($request) {
            return $query->where('b7r1b', $request['b7r1b']);
        })->when($request['b7r1c'], function ($query) use ($request) {
            return $query->where('b7r1c', $request['b7r1c']);
        })->when($request['b7r1d'], function ($query) use ($request) {
            return $query->where('b7r1d', $request['b7r1d']);
        })->when($request['b7r1e'], function ($query) use ($request) {
            return $query->where('b7r1e', $request['b7r1e']);
        })->when($request['b7r1f'], function ($query) use ($request) {
            return $query->where('b7r1f', $request['b7r1f']);
        })->when($request['b7r1g'], function ($query) use ($request) {
            return $query->where('b7r1g', $request['b7r1g']);
        })->when($request['b7r1h'], function ($query) use ($request) {
            return $query->where('b7r1h', $request['b7r1h']);
        })->when($request['b7r1i'], function ($query) use ($request) {
            return $query->where('b7r1i', $request['b7r1i']);
        })->when($request['b7r1j'], function ($query) use ($request) {
            return $query->where('b7r1j', $request['b7r1j']);
        })->when($request['b7r1k'], function ($query) use ($request) {
            return $query->where('b7r1k', $request['b7r1k']);
        })->when($request['b7r1l'], function ($query) use ($request) {
            return $query->where('b7r1l', $request['b7r1l']);
        })->when($request['b7r1m'], function ($query) use ($request) {
            return $query->where('b7r1m', $request['b7r1m']);
        })->when($request['b7r1n'], function ($query) use ($request) {
            return $query->where('b7r1n', $request['b7r1n']);
        })->when($request['b7r1o'], function ($query) use ($request) {
            return $query->where('b7r1o', $request['b7r1o']);
        })->when($request['b7r2a_min'], function ($query) use ($request) {
            return $query->where('b7r2a', '>=', $request['b7r2a_min']);
        })->when($request['b7r2a_max'], function ($query) use ($request) {
            return $query->where('b7r2a', '<=', $request['b7r2a_max']);
        })->when($request['b7r2b_min'], function ($query) use ($request) {
            return $query->where('b7r2b', '>=', $request['b7r2b_min']);
        })->when($request['b7r2b_max'], function ($query) use ($request) {
            return $query->where('b7r2b', '<=', $request['b7r2b_max']);
        })->when($request['b7r3a1'], function ($query) use ($request) {
            return $query->where('b7r3a1', $request['b7r3a1']);
        })->when($request['b7r3a2_min'], function ($query) use ($request) {
            return $query->where('b7r3a2', '>=', $request['b7r3a2_min']);
        })->when($request['b7r3a2_max'], function ($query) use ($request) {
            return $query->where('b7r3a2', '<=', $request['b7r3a2_max']);
        })->when($request['b7r3b'], function ($query) use ($request) {
            return $query->where('b7r3b', $request['b7r3b']);
        })->when($request['b7r4a_min'], function ($query) use ($request) {
            return $query->where('b7r4a', '>=', $request['b7r4a_min']);
        })->when($request['b7r4b_min'], function ($query) use ($request) {
            return $query->where('b7r4b', '>=', $request['b7r4b_min']);
        })->when($request['b7r4c_min'], function ($query) use ($request) {
            return $query->where('b7r4c', '>=', $request['b7r4c_min']);
        })->when($request['b7r4d_min'], function ($query) use ($request) {
            return $query->where('b7r4d', '>=', $request['b7r4d_min']);
        })->when($request['b7r4e_min'], function ($query) use ($request) {
            return $query->where('b7r4e', '>=', $request['b7r4e_min']);
        })->when($request['b7r4a_max'], function ($query) use ($request) {
            return $query->where('b7r4a', '<=', $request['b7r4a_max']);
        })->when($request['b7r4b_max'], function ($query) use ($request) {
            return $query->where('b7r4b', '<=', $request['b7r4b_max']);
        })->when($request['b7r4c_max'], function ($query) use ($request) {
            return $query->where('b7r4c', '<=', $request['b7r4c_max']);
        })->when($request['b7r4d_max'], function ($query) use ($request) {
            return $query->where('b7r4d', '<=', $request['b7r4d_max']);
        })->when($request['b7r4e_max'], function ($query) use ($request) {
            return $query->where('b7r4e', '<=', $request['b7r4e_max']);
        })->when($request['b7r5a'], function ($query) use ($request) {
            return $query->where('b7r5a', $request['b7r5a']);
        })->get();
        // dd($request);

        return view('kues.index', [
            "title" => "Pencarian Penduduk dengan Data Kuisioner",
            "active" => "/data/kuisioner",
            "data1" => $data,
            "desa" => $desa,
            "request" => $request,
        ]);
    }

    public function tabelpenduduk(Request $request){
        // dd($request['flag']);
        $desa = $this->getDesa($request['provinsi'], $request['kabupaten'], $request['kecamatan'], $request['desa']);

        $data = tbl_data2::whereHas('tbl_data1', function($query) use ($request) {
            $query->where([
                ['kd_prov', '=', $request['provinsi']],
                ['kd_kab', '=', $request['kabupaten']],
                ['kd_kec', '=', $request['kecamatan']],
                ['kd_desa', '=', $request['desa']],
                ['flag', '=', null],
            ]);
        })->when($request['b4k2_nama'], function ($query) use ($request) {
            return $query->where('b4k2_nama', $request['b4k2_nama']);
        })->when($request['b4k2_nik'], function ($query) use ($request) {
            return $query->where('b4k2_nik', $request['b4k2_nik']);
        })->when($request['b4k3'], function ($query) use ($request) {
            return $query->where('b4k3', $request['b4k3']);
        })->when($request['b4k4'], function ($query) use ($request) {
            return $query->where('b4k4', $request['b4k4']);
        })->when($request['b4k5_min'], function ($query) use ($request) {
            return $query->where('b4k5', '>=', $request['b4k5_min']);
        })->when($request['b4k5_max'], function ($query) use ($request) {
            return $query->where('b4k5', '<=', $request['b4k5_max']);
        })->when($request['b4k6'], function ($query) use ($request) {
            return $query->where('b4k6', $request['b4k6']);
        })->when($request['b4k7'], function ($query) use ($request) {
            return $query->where('b4k7', $request['b4k7']);
        })->when($request['b4k8'], function ($query) use ($request) {
            return $query->where('b4k8', $request['b4k8']);
        })->when($request['b4k9'], function ($query) use ($request) {
            return $query->where('b4k9', $request['b4k9']);
        })->when($request['b4k10'], function ($query) use ($request) {
            return $query->where('b4k10', $request['b4k10']);
        })->when($request['b4k11'], function ($query) use ($request) {
            return $query->where('b4k11', $request['b4k11']);
        })->when($request['b4k12'], function ($query) use ($request) {
            return $query->where('b4k12', $request['b4k12']);
        })->when($request['b4k13'], function ($query) use ($request) {
            return $query->where('b4k13', $request['b4k13']);
        })->when($request['b4k14'], function ($query) use ($request) {
            return $query->where('b4k14', $request['b4k14']);
        })->when($request['b4k15'], function ($query) use ($request) {
            return $query->where('b4k15', $request['b4k15']);
        })->when($request['b4k16'], function ($query) use ($request) {
            return $query->where('b4k16', $request['b4k16']);
        })->when($request['b4k17'], function ($query) use ($request) {
            return $query->where('b4k17', $request['b4k17']);
        })->when($request['b4k18'], function ($query) use ($request) {
            return $query->where('b4k18', $request['b4k18']);
        })->when($request['b4k19'], function ($query) use ($request) {
            return $query->where('b4k19', $request['b4k19']);
        })->when($request['b4k20'], function ($query) use ($request) {
            return $query->where('b4k20', $request['b4k20']);
        })->when($request['b4k21'], function ($query) use ($request) {
            return $query->where('b4k21', $request['b4k21']);
        })->when($request['b4k22'], function ($query) use ($request) {
            return $query->where('b4k22', $request['b4k22']);
        })->when($request['b4k23'], function ($query) use ($request) {
            return $query->where('b4k23', $request['b4k23']);
        })->when($request['b4k24'], function ($query) use ($request) {
            return $query->where('b4k24', $request['b4k24']);
        })->when($request['b4k25'], function ($query) use ($request) {
            return $query->where('b4k25', $request['b4k25']);
        })->when($request['b4k26'], function ($query) use ($request) {
            return $query->where('b4k26', $request['b4k26']);
        })->when($request['vaksinCovid'], function ($query) use ($request) {
            return $query->where('vaksinCovid', $request['vaksinCovid']);
        })->when($request['flag'], function ($query) use ($request) {
            if ($request['flag']=='all') {
                return $query;
            }
            return $query->where('flag', $request['flag']);
        }, function ($query) {
            return $query->where('flag', null);
        })->get();

        return view('kues.index', [
            "title" => "Pencarian Penduduk dengan Data Kuisioner",
            "active" => "/data/kuisioner",
            "data2" => $data,
            "desa" => $desa,
            "request" => $request,
        ]);
    }

    public function tabelsertifikat(Request $request){
        $desa = $this->getDesa($request['provinsi'], $request['kabupaten'], $request['kecamatan'], $request['desa']);

        $data = tbl_data3::where('flag', null)
        ->whereHas('tbl_data1', function($query) use ($request) {
            $query->where([
                ['kd_prov', '=', $request['provinsi']],
                ['kd_kab', '=', $request['kabupaten']],
                ['kd_kec', '=', $request['kecamatan']],
                ['kd_desa', '=', $request['desa']],
                ['flag', '=', null],
            ]);
        })->when($request['b5k3'], function ($query) use ($request) {
            return $query->where('b5k3', $request['b5k3']);
        })->when($request['b5k4'], function ($query) use ($request) {
            return $query->where('b5k4', $request['b5k4']);
        })->when($request['b5k5'], function ($query) use ($request) {
            return $query->where('b5k5', $request['b5k5']);
        })->when($request['b5k6_min'], function ($query) use ($request) {
            return $query->where('b5k6', '>=', $request['b5k6_min']);
        })->when($request['b5k6_max'], function ($query) use ($request) {
            return $query->where('b5k6', '<=', $request['b5k6_max']);
        })->when($request['b5k7'], function ($query) use ($request) {
            return $query->where('b5k7', $request['b5k7']);
        })->get();

        return view('kues.index', [
            "title" => "Pencarian Penduduk dengan Data Kuisioner",
            "active" => "/data/kuisioner",
            "data3" => $data,
            "desa" => $desa,
            "request" => $request,
        ]);
    }

    public function tabelusaha(Request $request){
        $desa = $this->getDesa($request['provinsi'], $request['kabupaten'], $request['kecamatan'], $request['desa']);
        $data = tbl_data4::where('flag', null)
        ->whereHas('tbl_data1', function($query) use ($request) {
            $query->where([
                ['kd_prov', '=', $request['provinsi']],
                ['kd_kab', '=', $request['kabupaten']],
                ['kd_kec', '=', $request['kecamatan']],
                ['kd_desa', '=', $request['desa']],
                ['flag', '=', null],
            ]);
        })->when($request['b7r5bk2_kode'], function ($query) use ($request) {
            return $query->where('b7r5bk2_kode', $request['b7r5bk2_kode']);
        })->when($request['b7r5bk3_min'], function ($query) use ($request) {
            return $query->where('b7r5bk3', '>=', $request['b7r5bk3_min']);
        })->when($request['b7r5bk3_max'], function ($query) use ($request) {
            return $query->where('b7r5bk3', '<=', $request['b7r5bk3_max']);
        })->when($request['b7r5bk4'], function ($query) use ($request) {
            return $query->where('b7r5bk4', $request['b7r5bk4']);
        })->when($request['b7r5bk5'], function ($query) use ($request) {
            return $query->where('b7r5bk5', $request['b7r5bk5']);
        })->get();

        return view('kues.index', [
            "title" => "Pencarian Penduduk dengan Data Kuisioner",
            "active" => "/data/kuisioner",
            "data4" => $data,
            "desa" => $desa,
            "request" => $request,
        ]);
    }
}
