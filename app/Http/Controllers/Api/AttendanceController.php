<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SyncDate;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as ResizeImage;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'long' => 'required',
            'lat' => 'required',
            'address' => 'required',
            'type' => 'required',
            'photo' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
         //upload image
        // $image = $request->file('photo');
        $path = storage_path('app/public/absensi/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $name = time() . '.' . $request->photo->extension();
        ResizeImage::make($request->file('photo'))
            ->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($path . $name);

        $attendanceType = $request->type;
        $userAttendanceToday = $request->user()
            ->attendances()
            ->whereDate('created_at', Carbon::today())
            ->first();

        if ($attendanceType == 'in') {
            if (! $userAttendanceToday) {
                $office_id = auth()->user()->office_id[0];
                $current_date = Carbon::now("Asia/Jakarta");
                $date = $current_date->format('Y-m-d');
                $time = $current_date->format('H:i');
                $attendance = $request
                    ->user()
                    ->attendances()
                    ->create(
                        [
                            'date_absensi' => $date . " " . $time,
                            'status' => false,
                            'office_id' => $office_id
                        ]
                    );

                // $current_date = Carbon::now("Asia/Jakarta");
                // $date = $current_date->format('Y-m-d');
                // $time = $current_date->format('H:i');
                $start = '06:02';
                $pulawal = '13:00';
                $end = '15:00';

                $office_id = auth()->user()->office_id[0];
                $office = Office::where('id', $office_id)->first();
                // dd($office->name);
                if ($office->name == "Kantor Pusat"){
                    $end = '15:30';
                }

                if($time > $start){
                    $attendance->detail()->create(
                        [
                            'type' => 'in',
                            'point' => 0,
                            'tanggal' => $date ,
                            'pukul' => $time,
                            'keterangan' => "Telat",
                            'long' => $request->long,
                            'lat' => $request->lat,
                            'distance' => $request->distance,
                            'photo' => $name,
                            'address' => $request->address
                        ]
                    );

                    $token = "AGf3RDCCMB5RipQgjaY14AsTCyAFtrAUzLnGRCGqiMQfKyiePo";
                    $phone= "085155105056"; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
                    $message = "Testing by API ruangwa";

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone.'&message='.$message,
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    echo $response;

                    return response()->json(
                        [
                            'message' => 'Absensi Check in berhasil di kirim!',
                            'data' => $attendance,
                        ],
                        Response::HTTP_CREATED
                    );
                } else {
                    $attendance->detail()->create(
                        [
                            'type' => 'in',
                            'point' => 1,
                            'tanggal' => $date,
                            'pukul' => $time,
                            'keterangan' => "Datang",
                            'long' => $request->long,
                            'lat' => $request->lat,
                            'distance' => $request->distance,
                            'photo' => $name,
                            'address' => $request->address
                        ]
                    );


                    $token = "AGf3RDCCMB5RipQgjaY14AsTCyAFtrAUzLnGRCGqiMQfKyiePo";
                    $phone= "085155105056"; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
                    $message = "Testing by API ruangwa";

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone.'&message='.$message,
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    echo $response;
                    return response()->json(
                        [
                            'message' => 'Absensi Check in berhasil di kirim!',
                            'data' => $attendance,
                        ],
                        Response::HTTP_CREATED
                    );
                }
            }

            // else show user has been checked in
            return response()->json(
                [
                    'message' => 'Santri sudah Check in hari ini!',
                ],
                Response::HTTP_OK
            );
        }

        if ($attendanceType == 'out') {
            if ($userAttendanceToday) {
                if ($userAttendanceToday->status) {
                    return response()->json(
                        [
                            'message' => 'User has been checked out',
                        ],
                        Response::HTTP_OK
                    );
                }

                $userAttendanceToday->update(
                    [
                        'status' => true
                    ]
                );

                $current_date = Carbon::now("Asia/Jakarta");
                $date = $current_date->format('Y-m-d');
                $time = $current_date->format('H:i');
                $start = '13:02';
                $pulawal = '13:00';
                $end = '15:00';

                $office_id = auth()->user()->office_id[0];
                $office = Office::where('id', $office_id)->first();
                if ($office->name == "Kantor Pusat"){
                    $end = '15:30';
                }

                if($time > $pulawal && $time < $end){
                    $userAttendanceToday->detail()->create(
                        [
                            'type' => 'out',
                            'point' => 0,
                            'tanggal' => $date,
                            'pukul' => $time,
                            'keterangan' => "Pulang Awal",
                            'long' => $request->long,
                            'lat' => $request->lat,
                            'distance' => $request->distance,
                            'photo' => $name,
                            'address' => $request->address
                        ]
                    );
                    $token = "AGf3RDCCMB5RipQgjaY14AsTCyAFtrAUzLnGRCGqiMQfKyiePo";
                    $phone= "085155105056"; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
                    $message = "Testing by API ruangwa";

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone.'&message='.$message,
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    echo $response;
                    return response()->json(
                        [
                            'message' => 'Absensi Check out berhasil di kirim!',
                            'data' => $userAttendanceToday,
                        ],
                        Response::HTTP_CREATED
                    );
                } else if($time < $pulawal){
                    $userAttendanceToday->detail()->create(
                        [
                            'type' => 'out',
                            'point' => 0,
                            'tanggal' => $date,
                            'pukul' => $time,
                            'keterangan' => "Pulang Awal",
                            'long' => $request->long,
                            'lat' => $request->lat,
                            'distance' => $request->distance,
                            'photo' => $name,
                            'address' => $request->address
                        ]
                    );
                    $token = "AGf3RDCCMB5RipQgjaY14AsTCyAFtrAUzLnGRCGqiMQfKyiePo";
                    $phone= "085155105056"; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
                    $message = "Testing by API ruangwa";

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone.'&message='.$message,
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    echo $response;
                    return response()->json(
                        [
                            'message' => 'Absensi Check out berhasil di kirim!',
                            'data' => $userAttendanceToday,
                        ],
                        Response::HTTP_CREATED
                    );
                } else {
                    $userAttendanceToday->detail()->create(
                        [
                            'type' => 'out',
                            'point' => 1,
                            'tanggal' => $date,
                            'pukul' => $time,
                            'keterangan' => "Pulang",
                            'long' => $request->long,
                            'lat' => $request->lat,
                            'distance' => $request->distance,
                            'photo' => $name,
                            'address' => $request->address
                        ]
                    );
                    $token = "AGf3RDCCMB5RipQgjaY14AsTCyAFtrAUzLnGRCGqiMQfKyiePo";
                    $phone= "085155105056"; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
                    $message = "Testing by API ruangwa";

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone.'&message='.$message,
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    echo $response;
                    return response()->json(
                        [
                            'message' => 'Absensi Check out berhasil di kirim!',
                            'data' => $userAttendanceToday,
                        ],
                        Response::HTTP_CREATED
                    );
                }
            }

            return response()->json(
                [
                    'message' => 'Santri di mohon untuk Check in terlebih dahulu',
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    public function history(Request $request)
    {
        $request->validate(
            [
                'from' => ['required'],
                'to' => ['required'],
            ]
        );

        $history = $request->user()->attendances()->with('detail')
            ->whereBetween(
                DB::raw('DATE(created_at)'),
                [
                    $request->from, $request->to
                ]
            )->get();


        // $history = Attendance::with('user','detail')
        //     ->whereBetween(
        //         DB::raw('DATE(created_at)'),
        //         [
        //             $request->from, $request->to
        //         ]
        //     )->get();

        return response()->json(
            [
                'message' => "list of presences by user",
                'data' => $history,
            ],
            Response::HTTP_OK
        );
    }

    public function countIn(Request $request)
    {

        $date = SyncDate::where('id', 1)->first();

        $history = $request->user()->attendances()->with('detail')
        ->whereBetween(
            DB::raw('DATE(created_at)'),
                [
                    $date->date_start, $date->date_end
                ]
        )
        ->get();
        $history = $history->each(function ($item) {
            $item->countIn = $item->detail->where('type', 'in')->sum('point');
            $item->countOut = $item->detail->where('type', 'out')->sum('point');
        });

        $totalCountIn = $history->sum('countIn');
        $totalCountOut = $history->sum('countOut');

        $data = [
            "countIn" => $totalCountIn,
            "countOut" => $totalCountOut
        ];
        return response()->json(
            [
                'message' => "list of presences by user",
                'data' => $data,
                // 'totalCountIn' => $totalCountIn,
                // 'totalCountOut' => $totalCountOut,
            ],
            Response::HTTP_OK
        );
    }

    public function sync()
    {
        $date = SyncDate::where('id', 1)->first();
        $in = Carbon::parse($date->date_start)->format('Y-m-d');
        $out = Carbon::parse($date->date_end)->format('Y-m-d');
        return response()->json(
            [
                'message' => "Sync Data",
                'mulai' => $in,
                'selesai' => $out
            ],
            Response::HTTP_OK
        );
    }
}
