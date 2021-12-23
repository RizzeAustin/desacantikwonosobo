<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_data1;
use App\Models\tbl_data2;
use App\Models\tbl_prov;
use App\Models\tbl_kab;
use App\Models\tbl_kec;
use App\Models\tbl_desa;
use Carbon\Carbon;
use DB;

use function GuzzleHttp\Promise\each;

class TabelController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request['tabel'])) {
            return back()->withErrors(['tabel' => 'Isian tidak boleh kosong']);
        }
        
        return redirect('/tabel/'.$request['provinsi'].'/'.$request['kabupaten'].'/'.$request['kecamatan'].'/'.$request['desa'].'/tabel'.$request['tabel']);
        
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

    public function tabel1($prov, $kab, $kec, $desa){

        $fixAge = tbl_data2::where('flag', null)->get();
        for ($i=0; $i < $fixAge->count(); $i++) { 
            if ($fixAge[$i]->b4k5_dob) {
                $currentAge = Carbon::parse($fixAge[$i]->b4k5_dob)->age;
                $fixAge[$i]->update(['b4k5' => $currentAge,]);
            }
        }
        //fix age done

        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $ranges = [
            '00-04' => 4,
            '05-09' => 9,
            '10-14' => 14,
            '15-19' => 19,
            '20-24' => 24,
            '25-29' => 29,
            '30-34' => 34,
            '35-39' => 39,
            '40-44' => 44,
            '45-49' => 49,
            '50-54' => 54,
            '55-59' => 59,
            '60-64' => 64,
            '65-69' => 69,
            '70-74' => 74,
            '75+' => 999,
        ];
        
        $dataCollection = collect([]);
        $total = collect([
            '00-04' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '05-09' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '10-14' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '15-19' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '20-24' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '25-29' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '30-34' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '35-39' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '40-44' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '45-49' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '50-54' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '55-59' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '60-64' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '65-69' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '70-74' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '75+' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection, $ranges) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection, $ranges) {
                $d = collect($data2);
                $d->put('nm_rw', $data1->nm_rw);
                if ($data2->b4k5 && $data2->flag==null) {
                    foreach($ranges as $key => $breakpoint){
                        if ($breakpoint >= $data2->b4k5){
                            $d->put('ageRange', $key);
                            break;
                        }
                    }
                } else {
                    $d->put('ageRange', null);
                }
                $tbl2Collection->push($d);
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $collect = collect([
                    '00-04' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '05-09' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '10-14' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '15-19' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '20-24' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '25-29' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '30-34' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '35-39' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '40-44' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '45-49' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '50-54' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '55-59' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '60-64' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '65-69' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '70-74' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                    '75+' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                ]);
                $temp = $data1->sortBy('ageRange')->groupBy('ageRange');
                $temp->each(function ($ageRange, $key) use ($collect) {
                    if ($key!=null) {
                        $collect2 = collect([
                            '1' => 0,
                            '2' => 0,
                            'jumlah' => 0,
                        ]);
                        $temp2 = $ageRange->sortBy('b4k4')->groupBy('b4k4');
                        $temp2->each(function ($b4k4, $key) use ($collect2, $ageRange) {
                            if ($key=='1' || $key=='2') {
                                $collect2->put($key, $b4k4->count());
                                $collect2->put('jumlah', $ageRange->count());
                            }
                        });
                        $collect->put($key, $collect2);
                    }
                });
                $dataCollection->put($nm_rw, $collect);         
            }
        });
        
        $temp = $tbl2Collection->sortBy('ageRange')->groupBy('ageRange');
        $temp->each(function ($ageRange, $key) use ($total) {
            if ($key!=''){
                $collect2 = collect([]);
                $temp2 = $ageRange->sortBy('b4k4')->groupBy('b4k4');
                $temp2->each(function ($b4k4, $key) use ($collect2, $ageRange) {
                    if ($key=='1' || $key=='2') {
                        $collect2->put($key, $b4k4->count());
                        $collect2->put('jumlah', $ageRange->count());
                    }
                });
                $total->put($key, $collect2);
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 1",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel2($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '1'=>0,
                '2'=>0,
                '3'=>0,
                '4'=>0,
                '5'=>0,
            ]);
            $temp = $data1->sortBy('b3r1a')->groupBy('b3r1a');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });
        
        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r1a')
        ->get()
        ->groupBy('b3r1a')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 2",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel3($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $ranges = [
            '<50' => 49,
            '50-100' => 100,
            '>100' => 999999999,
        ];
        
        $dataCollection = collect([]);
        $total = collect([
            '<50' => 0,
            '50-100' => 0,
            '>100' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl1Collection = collect([]);
        $data->each(function ($data1) use ($tbl1Collection, $ranges) {
            $d = collect($data1);
            if ($data1->b3r2) {
                foreach($ranges as $key => $breakpoint){
                    if ($breakpoint >= $data1->b3r2){
                        $d->put('luasLantai', $key);
                        break;
                    }
                }
            } else {
                $d->put('luasLantai', null);
            }
            $tbl1Collection->push($d);
        });
        $filter1 = $tbl1Collection->sortBy('nm_rw')->groupBy('nm_rw');

        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '<50' => 0,
                '50-100' => 0,
                '>100' => 0,
            ]);
            $temp = $data1->sortBy('luasLantai')->groupBy('luasLantai');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });
        
        $temp = $tbl1Collection->sortBy('luasLantai')->groupBy('luasLantai');
        $temp->each(function ($luasLantai, $key) use ($total) {
            if ($key!=''){
                $total->put($key, $luasLantai->count());
            }
        });
        // dd($total);

        return view('tabel.tabel', [
            "title" => "Tabel 3",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel4($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '01'=>0,
            '02'=>0,
            '03'=>0,
            '04'=>0,
            '05'=>0,
            '06'=>0,
            '07'=>0,
            '08'=>0,
            '09'=>0,
            '10'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '01'=>0,
                '02'=>0,
                '03'=>0,
                '04'=>0,
                '05'=>0,
                '06'=>0,
                '07'=>0,
                '08'=>0,
                '09'=>0,
                '10'=>0,
            ]);
            $temp = $data1->sortBy('b3r3')->groupBy('b3r3');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r3')
        ->get()
        ->groupBy('b3r3')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 4",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel5($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
            '6'=>0,
            '7'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '1'=>0,
                '2'=>0,
                '3'=>0,
                '4'=>0,
                '5'=>0,
                '6'=>0,
                '7'=>0,
            ]);
            $temp = $data1->sortBy('b3r4a')->groupBy('b3r4a');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r4a')
        ->get()
        ->groupBy('b3r4a')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 5",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel6($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '01'=>0,
            '02'=>0,
            '03'=>0,
            '04'=>0,
            '05'=>0,
            '06'=>0,
            '07'=>0,
            '08'=>0,
            '09'=>0,
            '10'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '01'=>0,
                '02'=>0,
                '03'=>0,
                '04'=>0,
                '05'=>0,
                '06'=>0,
                '07'=>0,
                '08'=>0,
                '09'=>0,
                '10'=>0,
            ]);
            $temp = $data1->sortBy('b3r5a')->groupBy('b3r5a');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r5a')
        ->get()
        ->groupBy('b3r5a')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 6",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel7($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '01'=>0,
            '02'=>0,
            '03'=>0,
            '04'=>0,
            '05'=>0,
            '06'=>0,
            '07'=>0,
            '08'=>0,
            '09'=>0,
            '10'=>0,
            '11'=>0,
            '12'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '01'=>0,
                '02'=>0,
                '03'=>0,
                '04'=>0,
                '05'=>0,
                '06'=>0,
                '07'=>0,
                '08'=>0,
                '09'=>0,
                '10'=>0,
                '11'=>0,
                '12'=>0,
            ]);
            $temp = $data1->sortBy('b3r7')->groupBy('b3r7');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r7')
        ->get()
        ->groupBy('b3r7')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 7",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel8($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '1'=>0,
            '2'=>0,
            '3'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '1'=>0,
                '2'=>0,
                '3'=>0,
            ]);
            $temp = $data1->sortBy('b3r8')->groupBy('b3r8');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
        ])
        ->orderBy('b3r8')
        ->get()
        ->groupBy('b3r8')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 8",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel9($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '1'=>0,
            '2'=>0,
            '3'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '1'=>0,
                '2'=>0,
                '3'=>0,
            ]);
            $temp = $data1->sortBy('b3r9a')->groupBy('b3r9a');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r9a')
        ->get()
        ->groupBy('b3r9a')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 9",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel10($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
            '6'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '1'=>0,
                '2'=>0,
                '3'=>0,
                '4'=>0,
                '5'=>0,
                '6'=>0,
            ]);
            $temp = $data1->sortBy('b3r9b')->groupBy('b3r9b');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r9b')
        ->get()
        ->groupBy('b3r9b')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 10",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel11($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
            '6'=>0,
            '7'=>0,
            '8'=>0,
            '9'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '1'=>0,
                '2'=>0,
                '3'=>0,
                '4'=>0,
                '5'=>0,
                '6'=>0,
                '7'=>0,
                '8'=>0,
                '9'=>0,
            ]);
            $temp = $data1->sortBy('b3r10')->groupBy('b3r10');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r10')
        ->get()
        ->groupBy('b3r10')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 11",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel12($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '1'=>0,
                '2'=>0,
                '3'=>0,
                '4'=>0,
            ]);
            $temp = $data1->sortBy('b3r11a')->groupBy('b3r11a');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r11a')
        ->get()
        ->groupBy('b3r11a')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 12",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel13($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '1'=>0,
                '2'=>0,
                '3'=>0,
                '4'=>0,
            ]);
            $temp = $data1->sortBy('b3r11b')->groupBy('b3r11b');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r11b')
        ->get()
        ->groupBy('b3r11b')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 13",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel14($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
            '6'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '1'=>0,
                '2'=>0,
                '3'=>0,
                '4'=>0,
                '5'=>0,
                '6'=>0,
            ]);
            $temp = $data1->sortBy('b3r12')->groupBy('b3r12');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());  
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });
        
        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('b3r12')
        ->get()
        ->groupBy('b3r12')
        ->each(function ($data1, $key) use ($total){
            if($key!=''){
                $total->put($key, $data1->count());
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 14",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel15($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $ranges = [
            '<19' => 18,
            '19-24' => 24,
            '25-30' => 30,
            '>30' => 999,
        ];
        
        $dataCollection = collect([]);
        $total = collect([
            '<19' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '19-24' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '25-30' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            '>30' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection, $ranges) {
            $data1->tbl_data2->each(function ($data2) use ($tbl2Collection, $ranges) {
                $d = collect($data2);
                if ($data2->b4k4 && $data2->b4k5 && $data2->flag==null) {
                    foreach($ranges as $key => $breakpoint){
                        if ($breakpoint >= $data2->b4k5){
                            $d->put('ageRange', $key);
                            break;
                        }
                    }
                } else {
                    $d->put('ageRange', null);
                }
                $tbl2Collection->push($d);
            });
        });
        $filter1 = $tbl2Collection->sortBy('b4k6')->groupBy('b4k6');

        $filter1->each(function ($data1, $b4k6) use ($dataCollection){
            $collect = collect([
                '<19' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                '19-24' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                '25-30' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
                '>30' => collect(['1' => 0, '2' => 0, 'jumlah' => 0]),
            ]);
            $temp = $data1->sortBy('ageRange')->groupBy('ageRange');
            $temp->each(function ($ageRange, $key) use ($collect) {
                if ($key!='') {
                    $collect2 = collect([
                        '1' => 0,
                        '2' => 0,
                        'jumlah' => 0,
                    ]);
                    $temp2 = $ageRange->sortBy('b4k4')->groupBy('b4k4');
                    $temp2->each(function ($b4k4, $key) use ($collect2, $ageRange) {
                        if ($key=='1' || $key=='2') {
                            $collect2->put($key, $b4k4->count());
                            $collect2->put('jumlah', $ageRange->count());
                        }
                    });
                    $collect->put($key, $collect2);
                }
            });
            switch ($b4k6) {
                case '1':
                    $b4k6 = 'Belum Kawin';
                    break;
                case '2':
                    $b4k6 = 'Kawin/Nikah';
                    break;
                case '3':
                    $b4k6 = 'Cerai Hidup';
                    break;
                case '4':
                    $b4k6 = 'Cerai Mati';
                    break;
            }
            $dataCollection->put($b4k6, $collect);
        });

        $temp = $tbl2Collection->sortBy('ageRange')->groupBy('ageRange');
        $temp->each(function ($ageRange, $key) use ($total) {
            if ($key!=''){
                $collect2 = collect([]);
                $temp2 = $ageRange->sortBy('b4k4')->groupBy('b4k4');
                $collect2->put('jumlah', $temp2[1]->count() + $temp2[2]->count());
                
                $temp2->each(function ($b4k4, $key) use ($collect2) {
                    if ($key=='1' || $key=='2') {
                        $collect2->put($key, $b4k4->count());
                    }
                });
                $total->put($key, $collect2);
            }
        });

        return view('tabel.tabel', [
            "title" => "Tabel 15",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel16($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);     
        $dataCollection = collect([]);
        $total = collect([
            '0' => 0,
            '1' => 0,
            '2' => 0,
            '4' => 0,
            '8' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection) {
                if ($data2->b4k5>4 && $data2->b4k20=='1' && $data2->flag==null) {
                    $d = collect($data2);
                    $d->put('nm_rw', $data1->nm_rw);
                    $tbl2Collection->push($d);
                }
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $a = 0;
                $b = 0;
                $c = 0;
                $d = 0;
                $e = 0;
                for ($i=0; $i <$data1->count() ; $i++) {
                    if ($data1[$i]['b4k9']=='0') {                        
                        $a = $a+1;
                    };
                    if ($data1[$i]['b4k9']=='1') {
                        $b = $b+1;
                    };
                    if ($data1[$i]['b4k9']=='2') {
                        $c = $c+1;
                    };
                    if ($data1[$i]['b4k9']=='4') {
                        $d = $d+1;
                    };
                    if ($data1[$i]['b4k9']=='8') {
                        $e = $e+1;
                    };
                    if ($data1[$i]['b4k9']=='3') {
                        $b = $b+1;
                        $c = $c+1;
                    };
                    if ($data1[$i]['b4k9']=='5') {
                        $b = $b+1;
                        $d = $d+1;
                    };
                    if ($data1[$i]['b4k9']=='9') {
                        $b = $b+1;
                        $e = $e+1;
                    };
                    if ($data1[$i]['b4k9']=='6') {
                        $c = $c+1;
                        $d = $d+1;
                    };
                    if ($data1[$i]['b4k9']=='10') {
                        $c = $c+1;
                        $e = $e+1;
                    };
                    if ($data1[$i]['b4k9']=='12') {
                        $d = $d+1;
                        $e = $e+1;
                    };
                    if ($data1[$i]['b4k9']=='7') {
                        $b = $b+1;
                        $c = $c+1;
                        $d = $d+1;
                    };
                    if ($data1[$i]['b4k9']=='11') {
                        $b = $b+1;
                        $c = $c+1;
                        $e = $e+1;
                    };
                    if ($data1[$i]['b4k9']=='14') {
                        $c = $c+1;
                        $d = $d+1;
                        $e = $e+1;
                    };
                    if ($data1[$i]['b4k9']=='15') {
                        $b = $b+1;
                        $c = $c+1;
                        $d = $d+1;
                        $e = $e+1;
                    };
                }
                $collect = collect([
                    '0' => $a,
                    '1' => $b,
                    '2' => $c,
                    '4' => $d,
                    '8' => $e,
                ]);
                $dataCollection->put($nm_rw, $collect);
            }
        });

        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $e = 0;
        for ($i=0; $i <$tbl2Collection->count() ; $i++) {
            if ($tbl2Collection[$i]['b4k9']=='0') {                        
                $a = $a+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='1') {
                $b = $b+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='2') {
                $c = $c+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='4') {
                $d = $d+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='8') {
                $e = $e+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='3') {
                $b = $b+1;
                $c = $c+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='5') {
                $b = $b+1;
                $d = $d+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='9') {
                $b = $b+1;
                $e = $e+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='6') {
                $c = $c+1;
                $d = $d+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='10') {
                $c = $c+1;
                $e = $e+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='12') {
                $d = $d+1;
                $e = $e+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='7') {
                $b = $b+1;
                $c = $c+1;
                $d = $d+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='11') {
                $b = $b+1;
                $c = $c+1;
                $e = $e+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='14') {
                $c = $c+1;
                $d = $d+1;
                $e = $e+1;
            };
            if ($tbl2Collection[$i]['b4k9']=='15') {
                $b = $b+1;
                $c = $c+1;
                $d = $d+1;
                $e = $e+1;
            };
        }
        $total = collect([
            '0' => $a,
            '!' => $b,
            '2' => $c,
            '4' => $d,
            '8' => $e,
        ]);
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 16",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel17($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);        
        $dataCollection = collect([]);
        $total = collect([
            '1' => 0,
            '2' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection) {
                if ($data2->b4k4=='2' && $data2->b4k5>9 && $data2->b4k5<50 && $data2->b4k6=='2' && $data2->flag==null) {
                    $d = collect($data2);
                    $d->put('nm_rw', $data1->nm_rw);
                    $tbl2Collection->push($d);
                }
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $collect = collect([
                    '1' => 0,
                    '2' => 0,
                ]);
                $temp = $data1->sortBy('b4k10')->groupBy('b4k10');
                $temp->each(function ($b4k10, $key) use ($collect) {
                    if ($key!='') {
                        $collect->put($key, $b4k10->count());
                    }
                });
                $dataCollection->put($nm_rw, $collect);
            }
        });
        
        $temp = $tbl2Collection->sortBy('b4k10')->groupBy('b4k10');
        $temp->each(function ($b4k10, $key) use ($total) {
            if ($key!='') {
                $total->put($key, $b4k10->count());
            }
        });
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 17",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel18($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);     
        $dataCollection = collect([]);
        $total = collect([
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
            '7' => 0,
            '8' => 0,
            '9' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection) {
                if ($data2->b4k4=='2' && $data2->b4k5>9 && $data2->b4k5<50 && $data2->b4k6=='2' && $data2->flag==null) {
                    $d = collect($data2);
                    $d->put('nm_rw', $data1->nm_rw);
                    $tbl2Collection->push($d);
                }
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $collect = collect([
                    '1' => 0,
                    '2' => 0,
                    '3' => 0,
                    '4' => 0,
                    '5' => 0,
                    '6' => 0,
                    '7' => 0,
                    '8' => 0,
                    '9' => 0,
                ]);
                $temp = $data1->sortBy('b4k11')->groupBy('b4k11');
                $temp->each(function ($b4k11, $key) use ($collect) {
                    if ($key!='') {
                        $collect->put($key, $b4k11->count());
                    }
                });
                $dataCollection->put($nm_rw, $collect);
            }
        });
        
        $temp = $tbl2Collection->sortBy('b4k11')->groupBy('b4k11');
        $temp->each(function ($b4k11, $key) use ($total) {
            if ($key!='') {
                $total->put($key, $b4k11->count());
            }
        });
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 18",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel19($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);       
        $dataCollection = collect([]);
        $total = collect([
            '00' => 0,
            '01' => 0,
            '02' => 0,
            '03' => 0,
            '04' => 0,
            '05' => 0,
            '06' => 0,
            '07' => 0,
            '08' => 0,
            '09' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection) {
                if ($data2->b4k12 && $data2->flag==null) {
                    $d = collect($data2);
                    $d->put('nm_rw', $data1->nm_rw);
                    $tbl2Collection->push($d);
                }
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $collect = collect([
                    '00' => 0,
                    '01' => 0,
                    '02' => 0,
                    '03' => 0,
                    '04' => 0,
                    '05' => 0,
                    '06' => 0,
                    '07' => 0,
                    '08' => 0,
                    '09' => 0,
                    '10' => 0,
                    '11' => 0,
                    '12' => 0,
                ]);
                $temp = $data1->sortBy('b4k12')->groupBy('b4k12');
                $temp->each(function ($b4k12, $key) use ($collect) {
                    if ($key!='') {
                        $collect->put($key, $b4k12->count());
                    }
                });
                $dataCollection->put($nm_rw, $collect);
            }
        });
        
        $temp = $tbl2Collection->sortBy('b4k12')->groupBy('b4k12');
        $temp->each(function ($b4k12, $key) use ($total) {
            if ($key!='') {
                $total->put($key, $b4k12->count());
            }
        });
        // dd($dataCollection);    

        return view('tabel.tabel', [
            "title" => "Tabel 19",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel20($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);     
        $dataCollection = collect([]);
        $total = collect([
            '0' => 0,
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
            '7' => 0,
            '8' => 0,
            '9' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection) {
                if ($data2->b4k13 && $data2->flag==null) {
                    $d = collect($data2);
                    $d->put('nm_rw', $data1->nm_rw);
                    $tbl2Collection->push($d);
                }
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $collect = collect([
                    '0' => 0,
                    '1' => 0,
                    '2' => 0,
                    '3' => 0,
                    '4' => 0,
                    '5' => 0,
                    '6' => 0,
                    '7' => 0,
                    '8' => 0,
                    '9' => 0,
                ]);
                $temp = $data1->sortBy('b4k13')->groupBy('b4k13');
                $temp->each(function ($b4k13, $key) use ($collect) {
                    if ($key!='') {
                        $collect->put($key, $b4k13->count());
                    }
                });
                $dataCollection->put($nm_rw, $collect);
            }
        });
        
        $temp = $tbl2Collection->sortBy('b4k13')->groupBy('b4k13');
        $temp->each(function ($b4k13, $key) use ($total) {
            if ($key!='') {
                $total->put($key, $b4k13->count());
            }
        });
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 20",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel21($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);     
        $dataCollection = collect([]);
        $total = collect([
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection) {
                if ($data2->b4k14 && $data2->flag==null) {
                    $d = collect($data2);
                    $d->put('nm_rw', $data1->nm_rw);
                    $tbl2Collection->push($d);
                }
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $collect = collect([
                    '1' => 0,
                    '2' => 0,
                    '3' => 0,
                    '4' => 0,
                    '5' => 0,
                ]);
                $temp = $data1->sortBy('b4k14')->groupBy('b4k14');
                $temp->each(function ($b4k14, $key) use ($collect) {
                    if ($key!='') {
                        $collect->put($key, $b4k14->count());
                    }
                });
                $dataCollection->put($nm_rw, $collect);
            }
        });
        
        $temp = $tbl2Collection->sortBy('b4k14')->groupBy('b4k14');
        $temp->each(function ($b4k14, $key) use ($total) {
            if ($key!='') {
                $total->put($key, $b4k14->count());
            }
        });
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 21",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel22($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);     
        $dataCollection = collect([]);
        $total = collect([
            '0' => 0,
            '1' => 0,
            '2' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection) {
                if ($data2->b4k5>4 && $data2->flag==null) {
                    $d = collect($data2);
                    $d->put('nm_rw', $data1->nm_rw);
                    $tbl2Collection->push($d);
                }
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $collect = collect([
                    '0' => 0,
                    '1' => 0,
                    '2' => 0,
                ]);
                $temp = $data1->sortBy('b4k15')->groupBy('b4k15');
                $temp->each(function ($b4k15, $key) use ($collect) {
                    if ($key!='') {
                        $collect->put($key, $b4k15->count());
                    }
                });
                $dataCollection->put($nm_rw, $collect);
            }
        });
        
        $temp = $tbl2Collection->sortBy('b4k15')->groupBy('b4k15');
        $temp->each(function ($b4k15, $key) use ($total) {
            if ($key!='') {
                $total->put($key, $b4k15->count());
            }
        });
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 22",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel23($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);     
        $dataCollection = collect([]);
        $total = collect([
            '0' => 0,
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection) {
                if ($data2->b4k5>4 && ($data2->b4k15=='1' || $data2->b4k15=='2') && $data2->flag==null) {
                    $d = collect($data2);
                    $d->put('nm_rw', $data1->nm_rw);
                    $tbl2Collection->push($d);
                }
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $collect = collect([
                    '0' => 0,
                    '1' => 0,
                    '2' => 0,
                    '3' => 0,
                    '4' => 0,
                    '5' => 0,
                    '6' => 0,
                ]);
                $temp = $data1->sortBy('b4k18')->groupBy('b4k18');
                $temp->each(function ($b4k18, $key) use ($collect) {
                    if ($key!='') {
                        $collect->put($key, $b4k18->count());
                    }
                });
                $dataCollection->put($nm_rw, $collect);
            }
        });
        
        $temp = $tbl2Collection->sortBy('b4k18')->groupBy('b4k18');
        $temp->each(function ($b4k18, $key) use ($total) {
            if ($key!='') {
                $total->put($key, $b4k18->count());
            }
        });
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 23",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel24($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);     
        $dataCollection = collect([]);
        $total = collect([
            '01' => 0,
            '02' => 0,
            '03' => 0,
            '04' => 0,
            '05' => 0,
            '06' => 0,
            '07' => 0,
            '08' => 0,
            '09' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
            '13' => 0,
            '14' => 0,
            '15' => 0,
            '16' => 0,
            '17' => 0,
            '18' => 0,
            '19' => 0,
            '20' => 0,
            '21' => 0,
            '22' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection) {
            $data1->tbl_data2->each(function ($data2) use ($data1, $tbl2Collection) {
                if ($data2->b4k5>4 && $data2->b4k20=='1' && $data2->flag==null) {
                    $d = collect($data2);
                    $d->put('nm_rw', $data1->nm_rw);
                    $tbl2Collection->push($d);
                }
            });
        });
        $filter1 = $tbl2Collection->sortBy('nm_rw')->groupBy('nm_rw');
        
        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            if ($nm_rw!='') {
                $collect = collect([
                    '01' => 0,
                    '02' => 0,
                    '03' => 0,
                    '04' => 0,
                    '05' => 0,
                    '06' => 0,
                    '07' => 0,
                    '08' => 0,
                    '09' => 0,
                    '10' => 0,
                    '11' => 0,
                    '12' => 0,
                    '13' => 0,
                    '14' => 0,
                    '15' => 0,
                    '16' => 0,
                    '17' => 0,
                    '18' => 0,
                    '19' => 0,
                    '20' => 0,
                    '21' => 0,
                    '22' => 0,
                ]);
                $temp = $data1->sortBy('b4k21')->groupBy('b4k21');
                $temp->each(function ($b4k21, $key) use ($collect) {
                    if ($key!='') {
                        $collect->put($key, $b4k21->count());
                    }
                });
                $dataCollection->put($nm_rw, $collect);
            }
        });
        
        $temp = $tbl2Collection->sortBy('b4k21')->groupBy('b4k21');
        $temp->each(function ($b4k21, $key) use ($total) {
            if ($key!='') {
                $total->put($key, $b4k21->count());
            }
        });
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 24",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel25($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            'b7r1a'=>0,
            'b7r1b'=>0,
            'b7r1c'=>0,
            'b7r1d'=>0,
            'b7r1e'=>0,
            'b7r1f'=>0,
            'b7r1g'=>0,
            'b7r1h'=>0,
            'b7r1i'=>0,
            'b7r1j'=>0,
            'b7r1k'=>0,
            'b7r1l'=>0,
            'b7r1m'=>0,
            'b7r1n'=>0,
            'b7r1o'=>0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection, $total){
            $collect = collect([
                'b7r1a'=>0,
                'b7r1b'=>0,
                'b7r1c'=>0,
                'b7r1d'=>0,
                'b7r1e'=>0,
                'b7r1f'=>0,
                'b7r1g'=>0,
                'b7r1h'=>0,
                'b7r1i'=>0,
                'b7r1j'=>0,
                'b7r1k'=>0,
                'b7r1l'=>0,
                'b7r1m'=>0,
                'b7r1n'=>0,
                'b7r1o'=>0,
            ]);
            foreach($total as $key => $ddd){
                $temp = $data1->sortBy($key)->groupBy($key);
                $temp->each(function ($data, $val) use ($collect, $key) {
                    if($val=='1' || $val=='3'){
                        $collect->put($key, $data->count());  
                    };
                });
            };

            $dataCollection->put($nm_rw, $collect);
        });
        
        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        foreach($total as $key => $ddd){
            $temp = $datatotal->sortBy($key)->groupBy($key);
            $temp->each(function ($data, $val) use ($total, $key) {
                if($val=='1' || $val=='3'){
                    $total->put($key, $data->count());
                };
            });
        };
        // dd($total);

        return view('tabel.tabel', [
            "title" => "Tabel 25",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel26($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $dataCollection = collect([]);
        $total = collect([
            'b7r4a' => 0,
            'b7r4b' => 0,
            'b7r4c' => 0,
            'b7r4d' => 0,
            'b7r4e' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])
        ->orderBy('nm_rw')
        ->get()
        ->groupBy('nm_rw')
        ->each(function ($data1, $nm_rw) use ($dataCollection){
            $a = 0;
            $b = 0;
            $c = 0;
            $d = 0;
            $e = 0;
            for ($i=0; $i <$data1->count() ; $i++) { 
                $a = $a + $data1[$i]->b7r4a;
                $b = $b + $data1[$i]->b7r4b;
                $c = $c + $data1[$i]->b7r4c;
                $d = $d + $data1[$i]->b7r4d;
                $e = $e + $data1[$i]->b7r4e;
            }
            $collect = collect([
                'b7r4a' => $a,
                'b7r4b' => $b,
                'b7r4c' => $c,
                'b7r4d' => $d,
                'b7r4e' => $e,
            ]);
            $dataCollection->put($nm_rw, $collect);
        });
        // dd($dataCollection);

        $datatotal = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $e = 0;
        for ($i=0; $i <$datatotal->count() ; $i++) { 
            $a = $a + $datatotal[$i]->b7r4a;
            $b = $b + $datatotal[$i]->b7r4b;
            $c = $c + $datatotal[$i]->b7r4c;
            $d = $d + $datatotal[$i]->b7r4d;
            $e = $e + $datatotal[$i]->b7r4e;
        }
        $total = collect([
            'b7r4a' => $a,
            'b7r4b' => $b,
            'b7r4c' => $c,
            'b7r4d' => $d,
            'b7r4e' => $e,
        ]);

        return view('tabel.tabel', [
            "title" => "Tabel 26",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel27($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $ranges = [
            '00-04' => 4,
            '05-09' => 9,
            '10-14' => 14,
            '15-19' => 19,
            '20-24' => 24,
            '25-29' => 29,
            '30-34' => 34,
            '35-39' => 39,
            '40-44' => 44,
            '45-49' => 49,
            '50-54' => 54,
            '55-59' => 59,
            '60-64' => 64,
            '65-69' => 69,
            '70-74' => 74,
            '75+' => 999,
        ];
        
        $dataCollection = collect([]);
        $total = collect([
            '00' => 0,
            '01' => 0,
            '02' => 0,
            '03' => 0,
            '04' => 0,
            '05' => 0,
            '06' => 0,
            '07' => 0,
            '08' => 0,
            '09' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl2Collection = collect([]);
        $data->each(function ($data1) use ($tbl2Collection, $ranges) {
            $data1->tbl_data2->each(function ($data2) use ($tbl2Collection, $ranges) {
                $d = collect($data2);
                if ($data2->b4k5 && $data2->flag==null) {
                    foreach($ranges as $key => $breakpoint){
                        if ($breakpoint >= $data2->b4k5){
                            $d->put('ageRange', $key);
                            break;
                        }
                    }
                } else {
                    $d->put('ageRange', null);
                }
                $tbl2Collection->push($d);
            });
        });
        $filter1 = $tbl2Collection->sortBy('ageRange')->groupBy('ageRange');

        $filter1->each(function ($data1, $ageRange) use ($dataCollection){
            if ($ageRange!='') {
                $collect = collect([
                    '00' => 0,
                    '01' => 0,
                    '02' => 0,
                    '03' => 0,
                    '04' => 0,
                    '05' => 0,
                    '06' => 0,
                    '07' => 0,
                    '08' => 0,
                    '09' => 0,
                    '10' => 0,
                    '11' => 0,
                    '12' => 0,
                ]);
                $temp = $data1->sortBy('b4k12')->groupBy('b4k12');
                $temp->each(function ($b4k12, $key) use ($collect) {
                    if ($key!='') {
                        $collect->put($key, $b4k12->count());
                    }
                });
                $dataCollection->put($ageRange, $collect);
            }
        });

        $temp = $tbl2Collection->sortBy('b4k12')->groupBy('b4k12');
        $temp->each(function ($b4k12, $key) use ($total) {
            if ($key!='') {
                $total->put($key, $b4k12->count());
            }
        });
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 27",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    public function tabel28($prov, $kab, $kec, $desa){
        $des = $this->getDesa($prov, $kab, $kec, $desa);
        $ranges = [
            '<1.000.000' => 999999,
            '1.000.000 - 2.000.000' => 1999999,
            '2.000.000 - 4.000.000' => 3999999,
            '>4.000.000' => 999999999999,
        ];
        
        $dataCollection = collect([]);
        $total = collect([
            '<1.000.000' => 0,
            '1.000.000 - 2.000.000' => 0,
            '2.000.000 - 4.000.000' => 0,
            '>4.000.000' => 0,
        ]);
        $data = tbl_data1::where([
            ['kd_prov', $prov],
            ['kd_kab', $kab],
            ['kd_kec', $kec],
            ['kd_desa', $desa],
            ['flag', null],
        ])->get();
        $tbl1Collection = collect([]);
        $data->each(function ($data1) use ($tbl1Collection, $ranges) {
            $d = collect($data1);
            if ($data1->b6r2) {
                foreach($ranges as $key => $breakpoint){
                    if ($breakpoint >= $data1->b6r2){
                        $d->put('averageIncome', $key);
                        break;
                    }
                }
            } else {
                $d->put('averageIncome', null);
            }
            $tbl1Collection->push($d);
        });
        $filter1 = $tbl1Collection->sortBy('nm_rw')->groupBy('nm_rw');

        $filter1->each(function ($data1, $nm_rw) use ($dataCollection){
            $collect = collect([
                '<1.000.000' => 0,
                '1.000.000 - 2.000.000' => 0,
                '2.000.000 - 4.000.000' => 0,
                '>4.000.000' => 0,
            ]);
            $temp = $data1->sortBy('averageIncome')->groupBy('averageIncome');
            $temp->each(function ($data, $key) use ($collect) {
                if($key!=''){
                    $collect->put($key, $data->count());
                }
            });
            $dataCollection->put($nm_rw, $collect);
        });
        
        $temp = $tbl1Collection->sortBy('averageIncome')->groupBy('averageIncome');
        $temp->each(function ($luasLantai, $key) use ($total) {
            if ($key!=''){
                $total->put($key, $luasLantai->count());
            }
        });
        // dd($dataCollection);

        return view('tabel.tabel', [
            "title" => "Tabel 28",
            "active" => "/tabel",
            "lokasi" => [$prov, $kab, $kec, $desa],
            "desa" => $des,
            "data" => $dataCollection,
            "total" => $total,
        ]);
    }
    
    // public function pkk(){
    //     $des = $this->getDesa(env('KD_PROV'), env('KD_KAB'), env('KD_KEC'), env('KD_DESA'));
    //     $data = tbl_data2::where('flag', null)
    //     ->whereHas('tbl_data1', function($query){
    //         $query->where([
    //             ['kd_prov', env('KD_PROV')],
    //             ['kd_kab', env('KD_KAB')],
    //             ['kd_kec', env('KD_KEC')],
    //             ['kd_desa', env('KD_DESA')],
    //             ['flag', '=', null],
    //         ]);
    //     })->get();

    //     return view('tabel.pkk', [
    //         "title" => "Tabel PKK",
    //         "active" => "/tabel/pkk",
    //         "lokasi" => [env('KD_PROV'), env('KD_KAB'), env('KD_KEC'), env('KD_DESA')],
    //         "desa" => $des,
    //         "data" => $data,
    //     ]);
    // }
}
