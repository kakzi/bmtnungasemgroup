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
            ->whereDate('date_absensi', Carbon::now("Asia/Jakarta")->format('Y-m-d H:i:s'))
            ->first();
        dd($userAttendanceToday); 

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
                    //Send WhatsApp Notification
                    $afirmasi = [
                        "Selamat pagi! Kamu luar biasa, dan hari ini adalah kesempatan baru untuk bersinar!✨",
                        "Aku yakin kamu bisa menghadapi hari ini dengan penuh semangat dan percaya diri! 💪🔥",
                        "Setiap langkah kecil yang kamu ambil hari ini membawa kamu lebih dekat ke impianmu! 🚀💡",
                        "Jangan ragu, kamu punya kemampuan hebat untuk mengatasi setiap tantangan! 🌟👏",
                        "Hari ini adalah milikmu! Hadapi dengan senyuman dan keyakinan! 😊🌈",
                        "Ingat, kerja kerasmu tidak sia-sia. Kamu semakin berkembang setiap hari! 🌟👏",
                        "Apapun yang terjadi hari ini, kamu tetap berharga dan luar biasa! ✨🤗",
                        "Kamu tidak sendirian! Aku mendukungmu dan percaya kamu bisa melakukannya! 🤝",
                        "Hari ini penuh peluang baru! Jangan takut untuk mencoba dan belajar! 🚀📚",
                        "Tetap semangat! Satu langkah maju hari ini adalah kemenangan besar untuk masa depanmu! 🎉🏆"
                    ];
                    // Send WhatsApp Notification
                    $keterangan = ($time > $start) ? "Telat" : "Datang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-in berhasil $keterangan pada $time. \n\nSantri atas Nama : ".auth()->user()->name. ", \nKantor penempatan : ".auth()->user()->office->name."\n\n".$afirmasi[array_rand($afirmasi)]."\nSelamat Berjuang ya!");

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

                    //Send WhatsApp Notification
                    $afirmasi = [
                        "Selamat pagi! Kamu luar biasa, dan hari ini adalah kesempatan baru untuk bersinar!✨",
                        "Aku yakin kamu bisa menghadapi hari ini dengan penuh semangat dan percaya diri! 💪🔥",
                        "Setiap langkah kecil yang kamu ambil hari ini membawa kamu lebih dekat ke impianmu! 🚀💡",
                        "Jangan ragu, kamu punya kemampuan hebat untuk mengatasi setiap tantangan! 🌟👏",
                        "Hari ini adalah milikmu! Hadapi dengan senyuman dan keyakinan! 😊🌈",
                        "Ingat, kerja kerasmu tidak sia-sia. Kamu semakin berkembang setiap hari! 🌟👏",
                        "Apapun yang terjadi hari ini, kamu tetap berharga dan luar biasa! ✨🤗",
                        "Kamu tidak sendirian! Aku mendukungmu dan percaya kamu bisa melakukannya! 🤝",
                        "Hari ini penuh peluang baru! Jangan takut untuk mencoba dan belajar! 🚀📚",
                        "Tetap semangat! Satu langkah maju hari ini adalah kemenangan besar untuk masa depanmu! 🎉🏆"
                    ];
                    // Send WhatsApp Notification
                    $keterangan = ($time > $start) ? "Telat" : "Datang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-in berhasil $keterangan pada $time. \n\nSantri atas Nama : ".auth()->user()->name. ", \nKantor penempatan : ".auth()->user()->office->name."\n\n".$afirmasi[array_rand($afirmasi)]."\nSelamat Berjuang ya!");

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

                    $semangat_besok = [
                        "Besok adalah kesempatan baru untuk menciptakan keajaiban. Semangat terus!",
                        "Jangan biarkan kelelahan menghalangimu, besok lebih banyak peluang menantimu!",
                        "Hari ini sudah luar biasa, besok akan lebih baik lagi. Tetap semangat!",
                        "Apa yang kamu lakukan hari ini akan mempermudah langkahmu besok. Teruskan usaha hebatmu!",
                        "Semangatmu hari ini adalah bekal untuk kesuksesan besok. Teruskan langkahmu!",
                        "Besok adalah hari baru untuk meraih lebih banyak impian. Kamu pasti bisa!",
                        "Apa pun yang terjadi hari ini, besok adalah kesempatan untuk mulai lagi. Semangat!",
                        "Hari ini mungkin penuh tantangan, tapi besok kamu akan siap menghadapi semuanya!",
                        "Setiap langkah yang kamu ambil hari ini, mendekatkanmu pada kesuksesan besok. Terus semangat!",
                        "Besok akan menjadi hari yang luar biasa, tetap percaya pada dirimu!",
                        "Besok adalah hari baru yang penuh dengan peluang, jangan berhenti berjuang!",
                        "Semangatmu hari ini akan membuahkan hasil yang luar biasa besok. Teruskan usaha terbaikmu!",
                        "Jangan pernah ragu, besok adalah kesempatan emas untuk meraih yang terbaik!",
                        "Setiap hari baru adalah peluang untuk menjadi lebih baik. Besok akan lebih gemilang!",
                        "Besok adalah babak baru yang lebih menarik. Terus beri yang terbaik!",
                        "Kalau perjalanan yang hati-hati ya!"
                    ];
                    $keterangan = ($time > $pulawal && $time < $end) ? "Pulang Awal" : "Pulang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-out berhasil: $keterangan pada $time. \n\nSantri atas Nama : ".auth()->user()->name. ", \nKantor penempatan : ".auth()->user()->office->name.", \n\n". $semangat_besok[array_rand($semangat_besok)] ."\nHati Hati di jalan ya!");
                    
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
                    $semangat_besok = [
                        "Besok adalah kesempatan baru untuk menciptakan keajaiban. Semangat terus!",
                        "Jangan biarkan kelelahan menghalangimu, besok lebih banyak peluang menantimu!",
                        "Hari ini sudah luar biasa, besok akan lebih baik lagi. Tetap semangat!",
                        "Apa yang kamu lakukan hari ini akan mempermudah langkahmu besok. Teruskan usaha hebatmu!",
                        "Semangatmu hari ini adalah bekal untuk kesuksesan besok. Teruskan langkahmu!",
                        "Besok adalah hari baru untuk meraih lebih banyak impian. Kamu pasti bisa!",
                        "Apa pun yang terjadi hari ini, besok adalah kesempatan untuk mulai lagi. Semangat!",
                        "Hari ini mungkin penuh tantangan, tapi besok kamu akan siap menghadapi semuanya!",
                        "Setiap langkah yang kamu ambil hari ini, mendekatkanmu pada kesuksesan besok. Terus semangat!",
                        "Besok akan menjadi hari yang luar biasa, tetap percaya pada dirimu!",
                        "Besok adalah hari baru yang penuh dengan peluang, jangan berhenti berjuang!",
                        "Semangatmu hari ini akan membuahkan hasil yang luar biasa besok. Teruskan usaha terbaikmu!",
                        "Jangan pernah ragu, besok adalah kesempatan emas untuk meraih yang terbaik!",
                        "Setiap hari baru adalah peluang untuk menjadi lebih baik. Besok akan lebih gemilang!",
                        "Besok adalah babak baru yang lebih menarik. Terus beri yang terbaik!",
                        "Kalau perjalanan yang hati-hati ya!"
                    ];
                    $keterangan = ($time > $pulawal && $time < $end) ? "Pulang Awal" : "Pulang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-out berhasil: $keterangan pada $time. \n\nSantri atas Nama : ".auth()->user()->name. ", \nKantor penempatan : ".auth()->user()->office->name.", \n\n". $semangat_besok[array_rand($semangat_besok)] ."\nHati Hati di jalan ya!");
                    
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
                    $semangat_besok = [
                        "Besok adalah kesempatan baru untuk menciptakan keajaiban. Semangat terus!",
                        "Jangan biarkan kelelahan menghalangimu, besok lebih banyak peluang menantimu!",
                        "Hari ini sudah luar biasa, besok akan lebih baik lagi. Tetap semangat!",
                        "Apa yang kamu lakukan hari ini akan mempermudah langkahmu besok. Teruskan usaha hebatmu!",
                        "Semangatmu hari ini adalah bekal untuk kesuksesan besok. Teruskan langkahmu!",
                        "Besok adalah hari baru untuk meraih lebih banyak impian. Kamu pasti bisa!",
                        "Apa pun yang terjadi hari ini, besok adalah kesempatan untuk mulai lagi. Semangat!",
                        "Hari ini mungkin penuh tantangan, tapi besok kamu akan siap menghadapi semuanya!",
                        "Setiap langkah yang kamu ambil hari ini, mendekatkanmu pada kesuksesan besok. Terus semangat!",
                        "Besok akan menjadi hari yang luar biasa, tetap percaya pada dirimu!",
                        "Besok adalah hari baru yang penuh dengan peluang, jangan berhenti berjuang!",
                        "Semangatmu hari ini akan membuahkan hasil yang luar biasa besok. Teruskan usaha terbaikmu!",
                        "Jangan pernah ragu, besok adalah kesempatan emas untuk meraih yang terbaik!",
                        "Setiap hari baru adalah peluang untuk menjadi lebih baik. Besok akan lebih gemilang!",
                        "Besok adalah babak baru yang lebih menarik. Terus beri yang terbaik!",
                        "Kalau perjalanan yang hati-hati ya!"
                    ];
                    $keterangan = ($time > $pulawal && $time < $end) ? "Pulang Awal" : "Pulang";
                    // Send WhatsApp Notification
                    $this->sendWhatsAppMessage( "Alhamdulillah.... \nAbsensi Check-out berhasil: $keterangan pada $time. \n\nSantri atas Nama : ".auth()->user()->name. ", \nKantor penempatan : ".auth()->user()->office->name.", \n\n". $semangat_besok[array_rand($semangat_besok)] ."\nHati Hati di jalan ya!");
                    
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
        $token = "PFfgXmrsu2eodrArGx4yrL7kMRWPdKPrk1ttZAXTn8Y72o2iaQ";

        $response = Http::asForm()->post('https://app.ruangwa.id/api/send_message', [
            'token' => $token,
            'number' => '085731581567-1501489476',
            // 'number' => '085155105056',
            'message' => $message,
        ]);

        return $response->json();
    }
}
