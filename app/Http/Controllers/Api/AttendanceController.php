<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Office;
use App\Models\SyncDate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
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
            ->whereDate('date_absensi', Carbon::today())
            ->first();

        if ($attendanceType == 'in') {
            if (! $userAttendanceToday) {
                $office_id = auth()->user()->office_id[0];
                $current_date = Carbon::now("Asia/Jakarta");
                $date = $current_date->format('Y-m-d');
                $time = $current_date->format('H:i:s');
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
                $start = '06:02:00';
                $pulawal = '13:00:00';
                $end = '15:00:00';

                $office_id = auth()->user()->office_id[0];
                $office = Office::where('id', $office_id)->first();
                // dd($office->name);
                if ($office->name == "Kantor Pusat"){
                    $end = '15:30:00';
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
                    // Send WhatsApp Notification
                    $keterangan = ($time > $start) ? "Telat" : "Datang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-in berhasil: $keterangan pada $time. Santri atas Nama : ".auth()->user()->name. ", Kantor penempatan : ".auth()->user()->office->name.", Selamat berjuang, kamu pasti bisa. semangat terus ya!");

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

                    // Send WhatsApp Notification
                    $keterangan = ($time > $start) ? "Telat" : "Datang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-in berhasil: $keterangan pada $time. Santri atas Nama : ".auth()->user()->name. ", Kantor penempatan : ".auth()->user()->office->name.", Selamat berjuang, kamu pasti bisa. semangat terus ya!");

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
                $time = $current_date->format('H:i:s');
                $start = '13:02:00';
                $pulawal = '13:00:00';
                $end = '15:00:00';

                $office_id = auth()->user()->office_id[0];
                $office = Office::where('id', $office_id)->first();
                if ($office->name == "Kantor Pusat"){
                    $end = '15:30:00';
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
                    $keterangan = ($time > $pulawal && $time < $end) ? "Pulang Awal" : "Pulang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-out berhasil: $keterangan pada $time. Santri atas Nama : ".auth()->user()->name. ", Kantor penempatan : ".auth()->user()->office->name.", Hati Hati di jalan ya!");
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
                    $keterangan = ($time > $pulawal && $time < $end) ? "Pulang Awal" : "Pulang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-out berhasil: $keterangan pada $time. Santri atas Nama : ".auth()->user()->name. ", Kantor penempatan : ".auth()->user()->office->name.", Hati Hati di jalan ya!");
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
                    $keterangan = ($time > $pulawal && $time < $end) ? "Pulang Awal" : "Pulang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-out berhasil: $keterangan pada $time. Santri atas Nama : ".auth()->user()->name. ", Kantor penempatan : ".auth()->user()->office->name.", Hati Hati di jalan ya!");
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
                DB::raw('DATE(date_absensi)'),
                [
                    $request->from, $request->to
                ]
            )->get();


        // $history = Attendance::with('user','detail')
        //     ->whereBetween(
        //         DB::raw('DATE(date_absensi)'),
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
            DB::raw('DATE(date_absensi)'),
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

    private function sendWhatsAppMessage($message)
    {
        $token = "AGf3RDCCMB5RipQgjaY14AsTCyAFtrAUzLnGRCGqiMQfKyiePo";

        $response = Http::asForm()->post('https://app.ruangwa.id/api/send_message', [
            'token' => $token,
            'number' => '085731581567-1501489476',
            'message' => $message,
        ]);

        return $response->json();
    }
}
