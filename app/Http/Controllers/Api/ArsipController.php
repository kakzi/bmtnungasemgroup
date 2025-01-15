<?php

namespace App\Http\Controllers\Api;

use App\Models\Procedure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ArsipController extends Controller
{
    public function getArsipSOP(Request $request)
    {
        // Validasi request data
        // $validator = Validator::make($request->all(), [
        //     'type' => ['required'],
        // ]);
        // //Kasih pesan error ketika validasi tidak terpenuhi
        // if ($validator->fails()) {
        //     return response()->json($validator->errors());
        // }
        //variabel dari "type"
        // $type = $request->type;

        //Query database ambil data SOP berdasarkan type yang di return
        $prosedure = Procedure::latest()->get();
        //Cek Kondisi
        if($prosedure == null ){
            //Reponse JSON jika SOP tidak ada
            return response()->json(
                [
                    'message' => "Data SOP tidak ada",
                ],
                404
            );
        } else {
            //Response JSON jika SOP Ada
            return response()->json(
                [
                    'message' => "Data SOP",
                    'data' => $prosedure,
                ],
                200
            );
        }
    }
    public function getArsipSOPbyId(Request $request)
    {
        // Validasi request data
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
        ]);
        //Kasih pesan error ketika validasi tidak terpenuhi
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        // variabel dari "type"
        $id = $request->id;

        //Query database ambil data SOP berdasarkan type yang di return
        $prosedure = Procedure::where('id', $id)->latest()->get();
        //Cek Kondisi
        if($prosedure == null ){
            //Reponse JSON jika SOP tidak ada
            return response()->json(
                [
                    'message' => "Data SOP tidak ada",
                ],
                404
            );
        } else {
            //Response JSON jika SOP Ada
            return response()->json(
                [
                    'message' => "Data SOP",
                    'data' => $prosedure,
                ],
                200
            );
        }
    }
}
