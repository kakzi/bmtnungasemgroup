<?php

namespace App\Http\Controllers\Admin;


use App\Models\Surveyor;
use App\Models\Agreement;
use Illuminate\Http\Request;
use BaconQrCode\Encoder\QrCode;
use App\Http\Controllers\Controller;
use BaconQrCode\Renderer\Image\PngRenderer;
use BaconQrCode\Writer;

class AgreementController extends Controller
{
    public function akad_rahn($id){

        $agreement = Agreement::with('permohonan')->find($id);
        $surveyor = Surveyor::find($agreement->permohonan_id);
        // dd($surveyor);
        return view('akad.akad_rahn', compact('agreement', 'surveyor'));
    }
}
