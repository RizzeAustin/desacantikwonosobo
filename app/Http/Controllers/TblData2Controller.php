<?php

namespace App\Http\Controllers;

use App\Models\tbl_data1;
use App\Models\tbl_data2;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;

class TblData2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_data2  $tbl_data2
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_data2 $tbl_data2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_data2  $tbl_data2
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $dataExist = tbl_data2::where('b4k2_nik', $request['nik'])->first();
        if ($dataExist){
            return response()->json(['data'=>$dataExist]);
        } else {
            return response()->json(['error'=>'NIK tidak ditemukan']);
        }
    }
    public function namaAnggota(Request $request)
    {
        $dataExist = tbl_data2::select('b4k1', 'b4k2_nama')->where('b1r7', $request['b1r7'])->get();
        return response()->json(['data'=>$dataExist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_data2  $tbl_data2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'b4k1' => ['max:99'],
            'b4k2_nama' => ['max:255', 'required'],
            'b4k2_nik' => ['size:16'],
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
        ];
        $customMessages = [
            'b4k2_nama.required' => 'Rincian ini harus diisi',
            'b4k23.required' => 'Rincian ini harus diisi',
            'b4k24.required' => 'Rincian ini harus diisi',
            'b4k25.required' => 'Rincian ini harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $dataExist = tbl_data2::where([
            ['b1r7', $request['b1r7Blok4Table']],
            ['b4k1', $request['b4k1']],
            ['flag', null],
        ])->orWhere([
            ['b4k2_nik', $request['b4k2_nik']],
            ['flag', null],
        ])->first();
        
        if ($dataExist){
            if ($validator->passes()) {
                $dataExist->update([
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
                ]);
                $dataExist->save();

                if ($request['b4k3']=='1') {
                    tbl_data1::where('b1r7', $request['b1r7Blok4Table'])->update(['b1r8' => $request['b4k2_nama'],]);
                }

                $currentAge = Carbon::parse($request['b4k5_dob'])->age;
                $dataExist->update(['b4k5' => $currentAge,]);

                return response()->json(['success'=>'Data berhasil diubah', 'key'=>$validator->valid()]);
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'No KK atau NIK tidak ditemukan']);
        };
    }

    public function flagUpdate(Request $request){
        $dataExist = tbl_data2::where('b4k2_nik', $request['flagNik'])->first();
        
        if ($dataExist){
            $dataExist->update([
                'flag' => empty($request['blok4Flag']) ? null : $request['blok4Flag'],
            ]);
            $dataExist->save();
            
            $anggotaCount = tbl_data2::where('b1r7', $dataExist['b1r7'])->where('flag', null)->count();
            tbl_data1::where('b1r7', $dataExist['b1r7'])->update(['b1r9'=>$anggotaCount,]);
            
            return response()->json(['success'=>'Flag berhasil diubah', 'flag'=>$request['blok4Flag']]);
        } else {
            return response()->json(['failed'=>'NIK tidak ditemukan']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_data2  $tbl_data2
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_data2 $tbl_data2)
    {
        //
    }
}
