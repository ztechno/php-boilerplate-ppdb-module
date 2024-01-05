<?php

use Core\Database;
use Core\Page;

Page::set_title('Detail Formulir PPDB');

$db = new Database;
$id = $_GET['id'];
$formulir = $db->single('formulirs',[
    'id' => $id
]);
$data = $db->single('registrations',[
    'id' => $formulir->registration_id
]);

$data->formulir = $formulir;

$data->formulir->metadata = json_decode($data->formulir->metadata);

return view('ppdb/views/detail', compact('data'));