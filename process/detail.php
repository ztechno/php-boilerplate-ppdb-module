<?php

use Core\Database;
use Core\Page;

Page::set_title('Detail Formulir PPDB');

$db = new Database;
$id = $_GET['id'];
$data = $db->single('registrations',[
    'id' => $id
]);

$data->formulir = $db->single('formulirs',[
    'registration_id' => $data->id
]);

$data->formulir->metadata = json_decode($data->formulir->metadata);

return view('ppdb/views/detail', compact('data'));