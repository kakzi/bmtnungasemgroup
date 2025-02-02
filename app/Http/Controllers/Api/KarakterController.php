<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Karakter;
use App\Models\SyncDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class KarakterController extends Controller
{
    public function get_count_tilawah(){
        $user_id = auth()->user()->id;

        $date = SyncDate::where('id', 1)->first();
        $count = Karakter::where('user_id', $user_id)
        ->whereBetween(
            DB::raw('DATE(date)'),
                [
                    $date->date_start, $date->date_end
                ]
        )
        ->where('type', 'tilawah')->count();

        $this->response['count'] = $count;
        return response()->json([
            'success' => true,
            'message' => 'Get user info!',
            'data' => $this->response
        ]);
    }

    public function get_count_tahajud(){
        $date = SyncDate::where('id', 1)->first();
        $user_id = auth()->user()->id;
        $count = Karakter::where('user_id', $user_id)
        ->whereBetween(
            DB::raw('DATE(date)'),
                [
                    $date->date_start, $date->date_end
                ]
        )
        ->where('type', 'tahajud')->count();

        $this->response['count'] = $count;
            
        return response()->json([
            'success' => true,
            'message' => 'Get user info!',
            'data' => $this->response
        ]);
    }


    public function get_karakter_tilawah_by_user()
    {
        $date = SyncDate::where('id', 1)->first();
        $user_id = auth()->user()->id;
        $tilawah = Karakter::where('user_id', $user_id)
        ->whereBetween(
            DB::raw('DATE(date)'),
                [
                    $date->date_start, $date->date_end
                ]
        )
        ->where('type', 'tilawah')->orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'Get user info!',
            'data' => $tilawah
        ]);
    }
    public function get_karakter_tahajud_by_user()
    {

        $date = SyncDate::where('id', 1)->first();
        $user_id = auth()->user()->id;
        $tilawah = Karakter::where('user_id', $user_id)
        ->whereBetween(
            DB::raw('DATE(date)'),
                [
                    $date->date_start, $date->date_end
                ]
        )
        ->where('type', 'tahajud')->orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Get user info!',
            'data' => $tilawah
        ]);
    }

    public function store_karakter(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'laporan'  => 'required',
            'type' => 'required'
        ],[
            'laporan.required' => "Laporan tidak boleh kosong!",
            'type.required' => "Type tidak boleh kosong!"
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                'success' => false,
                'message' => $messages->first(),
            ], 403);
        }

        $type = $request->type;
        if($type == "tilawah"){
            $current_date = Carbon::now("Asia/Jakarta");
            $date = $current_date->format('Y-m-d');
            $time = $current_date->format('H:i:s');
            $user_id = auth()->user()->id;
            // dd($user_id);
            $tilawah = Karakter::where('user_id', $user_id)
            ->where('type', 'tilawah')
            ->whereDate('date', '=', $date)
            ->first();
            
            if($tilawah == null){
                $tilawah = Karakter::create([
                    'type' => $request->type,
                    'laporan' => $request->laporan,
                    'user_id' => auth()->user()->id,
                    'poin' => 1,
                    'date' => $date,
                    'time' => $time,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Maaf hari ini kamu sudah laporan!",
                ], 403);
            }
    
            $tilawah->save();
            $this->response['id'] = $tilawah->id;

            $this->sendWhatsAppMessage( "Assalamualaikum\nBerikut data Laporan Tilawah Tanggal *$date* pukul $time. \n\nNama : *".auth()->user()->name."* \nKantor : ".auth()->user()->office->name."\nLaporan : *$tilawah->laporan*\n\n_Semoga selalu di berikan keberkahan nggih!_\n\nTerimakasih\n\n*HR KSPPS BMT NU Ngasem*");

            return response()->json([
                'success' => true,
                'message' => 'Tilawah berhasil di kirim!',
                'data' => $this->response
            ],201);
        } else {

            $current_date = Carbon::now("Asia/Jakarta");
            $date = $current_date->format('Y-m-d');
            $time = $current_date->format('H:i:s');
            $start = '00:00:00';
            $end = '04:21:00';
            
            $user_id = auth()->user()->id;
            if($time > $start && $time < $end){
                $user_id = auth()->user()->id;
                $tilawah = Karakter::where('user_id', $user_id)
                ->where('type', 'tahajud')
                ->whereDate('date', '=', $date)
                ->first();

                if($tilawah == null){
                    $tilawah = Karakter::create([
                        'type' => $request->type,
                        'laporan' => $request->laporan,
                        'user_id' => auth()->user()->id,
                        'poin' => 1,
                        'date' => $date,
                        'time' => $time,
                    ]);
                    
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => "Maaf hari ini kamu sudah laporan!",
                    ], 403);
                }

                $tilawah->save();
                $this->response['id'] = $tilawah->id;

                $this->sendWhatsAppMessage( "Assalamualaikum\nBerikut data Laporan Tahajud Tanggal *$date* pukul $time. \n\nNama : *".auth()->user()->name."* \nKantor : ".auth()->user()->office->name."\nLaporan : *$tilawah->laporan*\n\n_Semoga selalu di berikan keberkahan nggih!_\n\nTerimakasih\n\n*HR KSPPS BMT NU Ngasem*");


                return response()->json([
                        'success' => true,
                        'message' => 'Tahajud berhasil di kirim!',
                        'data' => $this->response
                ],201);
                
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Maaf sesuai SOP, Batas pengiriman Laporan tahajud mulai 00:00 sampai dengan 04:20!",
                ], 403);
            }
        }
    
    }

    private function sendWhatsAppMessage($message)
    {
        $token = "PFfgXmrsu2eodrArGx4yrL7kMRWPdKPrk1ttZAXTn8Y72o2iaQ";

        $response = Http::asForm()->post('https://app.ruangwa.id/api/send_message', [
            'token' => $token,
            'number' => '120363394633285712',
            // 'number' => '085155105056',
            'message' => $message,
        ]);

        return $response->json();
    }
}
