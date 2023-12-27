<?php

use Core\Database;
use Core\Page;
use Core\Request;
use Core\Validation;
use Modules\Ppdb\Libraries\WhatsApp;

$success_msg = get_flash_msg('success');
$error_msg   = get_flash_msg('error');
$old         = get_flash_msg('old');

if(Request::isMethod('POST'))
{
    // validation
    Validation::run([
        'name' => [
            'required'
        ],
        'phone' => [
            'required','unique:registrations',
        ],
        'email' => [
            'required','unique:registrations'
        ],
    ], $_POST);

    // save registration data to database
    $bill_code = strtoupper(substr(md5(strtotime('now')), 0, 8));
    $db = new Database;
    $data = $db->insert('registrations', [
        'name'  => $_POST['name'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'status' => 'MENUNGGU PEMBAYARAN',
        'bill_code' => $bill_code,
    ]);

    // notification for payment instructions
    (new WhatsApp)->sendNotifAfterRegistration($data);

    // redirect back with success message
    set_flash_msg(['success'=>"Registrasi berhasil. Silahkan cek whatsapp anda mendapatkan instruksi lebih lanjut."]);

    header('location:'.routeTo('/'));
    die();
}

Page::set_title('Pendaftaran PPDB');

return view('ppdb/views/index',compact('success_msg','error_msg','old'));