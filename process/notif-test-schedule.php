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

(new WhatsApp)->sendNotifTestSchedule($data);

set_flash_msg(['success'=>"Jadwal observasi telah terkirim"]);

header('location:'.routeTo('crud/index',['table' => 'formulirs', 'filter' => ['status' => 'send']]));
die();