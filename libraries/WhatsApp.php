<?php

namespace Modules\Ppdb\Libraries;

class WhatsApp 
{
    function sendNotifAfterRegistration($data)
    {
        $message = "_Assalamualaikum warahmatullahi wabarakatuh_

Terima kasih telah melakukan pemesanan formulir pendaftaran siswa al azhar.
Silakan lakukan pembayaran sebesar Rp. 350.000 ke Rekening BSI an TK Islam Al Azhar 67 Blitar 6767009190 
Lakukan konfirmasi pembayaran dengan mereplay WA ini.

_Wassalamualaikum Warahmatullahi Wabarakatuh_";

        $this->sendWa(62 . $data->phone, $message);
    }
    
    function sendNotifAfterPayment($data)
    {
        $message = "_Assalamualaikum warahmatullahi wabarakatuh_

Terima kasih telah melakukan pembayaran atas tagihan no : $data->bill_code
Berikut adalah PIN dan Link pengisian formulir :
Link : ".routeTo('ppdb/check')."
PIN : *".$data->PIN."*

_Wassalamualaikum Warahmatullahi Wabarakatuh_";

        $this->sendWa(62 . $data->phone, $message);
    }
    
    function sendNotifAfterFormSubmit($data)
    {
        $message = "_Assalamualaikum warahmatullahi wabarakatuh_

Data Bapak/Ibu telah terkirim ke sistem dan Petugas akan memverifikasi data formulir pendaftar.

_Wassalamualaikum Warahmatullahi Wabarakatuh_";

        $this->sendWa(62 . $data->phone, $message);
    }
    
    function sendNotifTestSchedule($data)
    {
        $message = "_Assalamualaikum warahmatullahi wabarakatuh_

Data Bapak/Ibu telah kami terima. Selanjutnya harap mengikuti Observasi yang dilaksanakan pada: ".env('TEST_SCHEDULE','')."

_Wassalamualaikum Warahmatullahi Wabarakatuh_";

        $this->sendWa(62 . $data->phone, $message);
    }
    
    function sendNotifAfterTest($data)
    {
        $message = "_Assalamualaikum warahmatullahi wabarakatuh_

Alhamdulillah Ananda: ".$data->formulir->name." telah mengikuti observasi. Saat ini sedang dalam penilaian tim kami. Hasil observasi akan diinformasikan kemudian.

_Wassalamualaikum Warahmatullahi Wabarakatuh_";

        $this->sendWa(62 . $data->phone, $message);
    }

    function sendNotifTestResult($data)
    {
        $message = "_Assalamualaikum warahmatullahi wabarakatuh_

Yth. Bapak/Ibu ".$data->name."
Alhamdulillah Selamat untuk ananda ".$data->formulir->name." dinyatakan DITERIMA menjadi murid KB-TK Islam Al Azhar 67 Blitar 

Silakan melakukan pembayaran biaya pendidikan melalui VA  

_Wassalamualaikum Warahmatullahi Wabarakatuh_";

        $this->sendWa(62 . $data->phone, $message);
    }

    function sendWa($to, $message)
    {
        try {
            $data = [
                'api_key' => env('WA_API_KEY'),
                'sender'  => env('WA_SENDER_NUMBER'),
                'number'  => $to,
                'message' => $message
            ];
            
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://wa.alazharblitar.sch.id/app/api/send-message",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data))
            );
            
            curl_exec($curl);
            
            curl_close($curl);
        } catch (\Throwable $th) {
            // throw $th;
        }
    }
}