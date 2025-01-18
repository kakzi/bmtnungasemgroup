<?php

namespace App\Http\Controllers\Api;

use App\Models\Cuti;
use App\Models\Izin;
use App\Models\SyncDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as ResizeImage;

class PermissionFormController extends Controller
{
    public function cuti(Request $request){
        //make api
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        if($request->foto == null){
            $cuti = Cuti::create([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'reason' => $request->reason,
                'user_id' => auth()->user()->id
            ]);
            $cuti->save();

            return response()->json([
                'success' => true,
                'message' => 'Cuti berhasil di kirim!',
                'data' => $cuti
            ],201);
        } else {
            $path = storage_path('app/public/permission/');
            !is_dir($path) &&
                mkdir($path, 0777, true);

            $name = time() . '.' . $request->foto->extension();
            ResizeImage::make($request->file('foto'))
                ->resize(512, 512, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($path . $name);

            $cuti = Cuti::create([
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'reason' => $request->reason,
                    'user_id' => auth()->user()->id,
                    'foto' => $name
            ]);
            $cuti->save();

            return response()->json([
                'success' => true,
                'message' => 'Cuti berhasil di kirim!',
                'data' => $cuti
            ],201);
        }
        

    }
    public function izin(Request $request){
        //make api
        $validator = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpeg,jpg,png',
            'reason' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $path = storage_path('app/public/permission/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $name = time() . '.' . $request->foto->extension();
        ResizeImage::make($request->file('foto'))
            ->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($path . $name);

        $izin = Izin::create([
                'date' => Carbon::now(),
                'reason' => $request->reason,
                'user_id' => auth()->user()->id,
                'foto' => $name
        ]);
        $izin->save();

        return response()->json([
            'success' => true,
            'message' => 'Izin berhasil di kirim!',
            'data' => $izin
        ],201);

    }
    public function get_izin(Request $request){
        $user_id = auth()->user()->id;

        $date = SyncDate::where('id', 1)->first();
        $count = Izin::where('user_id', $user_id)
            ->whereBetween(
                DB::raw('DATE(date)'),
                    [
                        $date->date_start, $date->date_end
                    ]
            )->where('status', 'approved')->count();
        $izin = Izin::where('user_id', $user_id)
            ->whereBetween(
                DB::raw('DATE(date)'),
                    [
                        $date->date_start, $date->date_end
                    ]
            )->get();

        $this->response['count'] = $count;
        $this->response['izin'] = $izin;
        return response()->json([
            'success' => true,
            'message' => 'Get Izin by User!',
            'data' => $this->response
        ]);

    }
    public function get_cuti(Request $request){
        $user_id = auth()->user()->id;

        $date = SyncDate::where('id', 1)->first();
        $count = Cuti::where('user_id', $user_id)
            ->whereBetween(
                DB::raw('DATE(created_at)'),
                    [
                        $date->date_start, $date->date_end
                    ]
            )->where('status', 'approved')->count();
        $izin = Cuti::where('user_id', $user_id)
            ->whereBetween(
                DB::raw('DATE(created_at)'),
                    [
                        $date->date_start, $date->date_end
                    ]
            )->get();

        $this->response['count'] = $count;
        $this->response['cuti'] = $izin;
        return response()->json([
            'success' => true,
            'message' => 'Get Izin by User!',
            'data' => $this->response
        ]);

    }
}
