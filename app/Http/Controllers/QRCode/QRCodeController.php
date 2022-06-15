<?php

namespace App\Http\Controllers\QRCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    /**
     * Code to gerate simple QRcode
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return QrCode::size(200)->generate('My first QR Code');
    }
    public function colorQrCodeIndex()
    {
              return QrCode::size(100)
                     ->backgroundColor(255,255,10)
                     ->generate('Example of Colored QR code');
    }
    public function imageQr()
    {
        $image = QrCode::format('png')
                 ->merge('img/pngkb.png', 0.5, true)
                 ->size(200)->errorCorrection('H')
                 ->generate('Image QR code');
        return response($image)->header('Content-type','image/png');
    }

    // Note that, if you want to send qr code in mail, phone and text message in laravel app. So, you can add following method on controller file:

    public function emailQrCode()
    {
        return QrCode::size(500)
                ->email('example@gmail.com', 'Hii please scan the QR code', 'Holla');
    }
    public function qrCodePhone()
    {
            QrCode::phoneNumber('111-222-1234');
    }
    public function textQrCode()
    {
      QrCode::SMS('111-222-1234', 'message within body');
    }
}
