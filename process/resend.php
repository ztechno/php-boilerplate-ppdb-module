<?php

use Core\Database;
use Modules\Ppdb\Libraries\WhatsApp;

$db = new Database;
$id = $_GET['id'];

$data = $db->single('registrations', [
    'id' => $id
]);

$whatsapp = new WhatsApp;
if($data->status == 'MENUNGGU PEMBAYARAN')
{
    $whatsapp->sendNotifAfterRegistration($data);
}

if($data->status == 'PEMBAYARAN FORMULIR DITERIMA')
{
    $whatsapp->sendNotifAfterPayment($data);
}

if($data->status == 'HASIL TES DALAM VERIFIKASI')
{
    $data->formulir = $db->single('formulirs', [
        'registration_id' => $data->id
    ]);
    
    $whatsapp->sendNotifAfterTest($data);
}

if($data->status == 'DITERIMA')
{
    $data->formulir = $db->single('formulirs', [
        'registration_id' => $data->id
    ]);

    $whatsapp->sendNotifTestResult($data);
}

set_flash_msg(['success'=>"Notifikasi berhasil dikirim"]);

header('location:'.routeTo('crud/index',['table' => 'registrations']));
die();