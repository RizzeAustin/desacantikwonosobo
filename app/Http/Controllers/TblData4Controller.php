<?php

namespace App\Http\Controllers;

use App\Models\tbl_data4;
use App\Models\tbl_data2;
use Illuminate\Http\Request;
use Validator;
use Carbon;

class TblData4Controller extends Controller
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
     * @param  \App\Models\tbl_data4  $tbl_data4
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_data4 $tbl_data4)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_data4  $tbl_data4
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $dataExist = tbl_data4::where([
            ['b1r7', $request['kk']],
            ['b7r5bk0', $request['no']],
        ])->first();
        $anggota = tbl_data2::select('b4k1', 'b4k2_nama')->where('b1r7', $request['kk'])->get();
        if ($dataExist){
            return response()->json(['data'=>$dataExist, 'anggota'=>$anggota]);
        } else {
            return response()->json(['error'=>'Nomor KK atau usaha tidak ditemukan']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_data4  $tbl_data4
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_data4 $tbl_data4)
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
        $validData = $validator->valid();
        $dataExist = tbl_data4::where([
            ['b1r7', $request['b1r7Blok7Table']],
            ['b7r5bk0', $request['b7r5bk0']]
        ])->first();

        if ($dataExist){
            if ($validator->passes()) {
                $dataExist->update([
                    'b1r7' => $validData['b1r7Blok7Table'],
                    'b7r5bk1' => empty($request['b7r5bk1']) ? null : $validData['b7r5bk1'],
                    'b7r5bk2_usaha' => empty($request['b7r5bk2_usaha']) ? null : $validData['b7r5bk2_usaha'],
                    'b7r5bk2_kode' => empty($request['b7r5bk2_kode']) ? null : $validData['b7r5bk2_kode'],
                    'b7r5bk3' => empty($request['b7r5bk3']) ? 0 : $validData['b7r5bk3'],
                    'b7r5bk4' => empty($request['b7r5bk4']) ? null : $validData['b7r5bk4'],
                    'b7r5bk5' => empty($request['b7r5bk5']) ? null : $validData['b7r5bk5'],
                ]);
                $dataExist->save();
                return response()->json(['success'=>'Data berhasil diubah', 'key'=>$validator->valid()]);
            }
            return response()->json(['error'=>$validator->errors(), 'key'=>$validator->valid()]);
        } else {
            return response()->json(['failed'=>'Nomor Kartu Keluarga tidak ditemukan']);
        };
    }

    public function flagUpdate(Request $request){
        $dataExist = tbl_data4::where([
            ['b1r7', $request['kk']],
            ['b7r5bk0', $request['no']],
        ])->first();
        
        if ($dataExist){
            if ($dataExist['flag']) {
                $dataExist->update([
                    'flag' => null,
                ]);
            } else {
                $dataExist->update([
                    'flag' => 'Dihapus',
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
     * @param  \App\Models\tbl_data4  $tbl_data4
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_data4 $tbl_data4)
    {
        //
    }
}
