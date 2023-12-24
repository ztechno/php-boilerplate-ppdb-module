<?php

use Core\Database;
use Modules\Ppdb\Libraries\WhatsApp;

$db = new Database;
$id = $_GET['id'];

$db->update('registrations',[
    'status' => 'PEMBAYARAN FORMULIR DITERIMA',
    'PIN' => strtoupper(substr(md5($_GET['id']), 0, 8))
], [
    'id' => $id
]);

$data = $db->single('registrations', [
    'id' => $id
]);

(new WhatsApp)->sendNotifAfterPayment($data);

set_flash_msg(['success'=>"Pembayaran Formulir berhasil dikonfirmasi"]);

header('location:'.routeTo('crud/index',['table' => 'registrations']));
die();