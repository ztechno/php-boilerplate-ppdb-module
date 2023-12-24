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
    'status' => 'DITERIMA',
], [
    'id' => $id
]);

(new WhatsApp)->sendNotifTestResult($data);

set_flash_msg(['success'=>"Calon peserta didik berhasil di terima"]);

header('location:'.routeTo('crud/index',['table' => 'formulirs', 'filter' => ['status' => 'send']]));
die();