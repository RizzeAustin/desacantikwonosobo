<?php

namespace App\Http\Controllers;

use App\Models\tbl_data3;
use App\Models\tbl_data2;
use App\Models\tbl_data1;
use Illuminate\Http\Request;
use Validator;
use Carbon;

class TblData3Controller extends Controller
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
     * @param  \App\Models\tbl_data3  $tbl_data3
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_data3 $tbl_data3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_data3  $tbl_data3
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // $dataExist = tbl_data3::where(
        //     ['b1r7', '=', $request['kk']],
        //     ['b5k1', '=', $request['no']],
        // )->first();
        $dataExist = tbl_data3::where([
            ['b1r7', $request['kk']],
            ['b5k1', $request['no']],
        ])->first();
        $anggota = tbl_data2::select('b4k1', 'b4k2_nama')->where('b1r7', $request['kk'])->get();
        if ($dataExist){
            return response()->json(['data'=>$dataExist, 'anggota'=>$anggota]);
        } else {
            return response()->json(['error'=>'No KK tidak ditemukan']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_data3  $tbl_data3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
        $validData = $validator->valid();
        $dataExist1 = tbl_data1::where('b1r7', $request['b1r7Blok5Table'])->first();
        $dataExist = tbl_data3::where([
            ['b1r7', $request['b1r7Blok5Table']],
            ['b5k1', $request['b5k1']],
        ])->first();
        $total_luas_lahan = $dataExist1['b5_total_luas_lahan'] - $dataExist['b5k6'] + $request['b5k6'];
        
        if ($dataExist){
            if ($validator->passes()) {
                $dataExist1->update([
                    'b5_total_luas_lahan' => $total_luas_lahan,
                ]);
                $dataExist->update([
                    'b5k1' => empty($request['b5k1']) ? null : $validData['b5k1'],
                    'b5k2' => empty($request['b5k2']) ? null : $validData['b5k2'],
                    'b5k3' => empty($request['b5k3']) ? null : $validData['b5k3'],
                    'b5k4' => empty($request['b5k4']) ? null : $validData['b5k4'],
                    'b5k5' => empty($request['b5k5']) ? null : $validData['b5k5'],
                    'b5k6' => empty($request['b5k6']) ? 0 : $validData['b5k6'],
                    'b5k7' => empty($request['b5k7']) ? null : $validData['b5k7'],
                    'b5k8' => empty($request['b5k8']) ? null : $validData['b5k8'],
                ]);
                return response()->json(['success'=>'Data berhasil diubah', 'key'=>$validator->valid()]);
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
    }

    public function flagUpdate(Request $request){
        $dataExist = tbl_data3::where([
            ['b1r7', $request['kk']],
            ['b5k1', $request['no']],
        ])->first();
        $dataExist1 = tbl_data1::where('b1r7', $request['kk'])->first();
        
        if ($dataExist){
            if ($dataExist['flag']) {
                $dataExist->update([
                    'flag' => null,
                ]);
                $dataExist1->update([
                    'b5_total_luas_lahan' => $dataExist1['b5_total_luas_lahan'] + $dataExist['b5k6'],
                ]);
            } else {
                $dataExist->update([
                    'flag' => 'Dihapus',
                ]);
                $dataExist1->update([
                    'b5_total_luas_lahan' => $dataExist1['b5_total_luas_lahan'] - $dataExist['b5k6'],
                ]);
            }
            return response()->json(['success'=>'Flag berhasil diubah', 'flag'=>$dataExist['flag']]);
        } else {
            return response()->json(['failed'=>'NIK tidak ditemukan']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_data3  $tbl_data3
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_data3 $tbl_data3)
    {
        //
    }
}
