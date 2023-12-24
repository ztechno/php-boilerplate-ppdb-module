<?php

use Core\Database;
use Modules\Ppdb\Libraries\WhatsApp;

$db = new Database;
$id = $_GET['id'];

$data = $db->single('registrations', [
    'id' => $id
]);

$data->formulir = $db->single('formulirs', [
    'registration_id' => $id
]);

$db->update('registrations',[
    'status' => 'HASIL TES DALAM VERIFIKASI',
], [
    'id' => $id
]);

(new WhatsApp)->sendNotifAfterTest($data);

set_flash_msg(['success'=>"Data peserta didik berhasil di verifikasi"]);

header('location:'.routeTo('crud/index',['table' => 'formulirs', 'filter' => ['status' => 'send']]));
die();