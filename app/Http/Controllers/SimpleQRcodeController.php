<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRcodeController extends Controller
{
        // L'action "generate" de la route "simple-qrcode" (GET)
        public function generate ($id) {

            $qrcode = QrCode::size(200)->generate("http://localhost:8080/planning/".$id);

            $details = [
                'qrcode' => $qrcode,
                'title'  => "Le lien de votre planning",
                'body' => 'This is for testing email using smtp'
            ];

            Mail::to('contact@planning.fr')->send(new \App\Mail\Contact($details));

            dd("Email is Sent.");
        }
}
