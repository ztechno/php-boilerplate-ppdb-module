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
        'PIN' => [
            'required','exists:registrations'
        ],
    ], $_POST);

    $_SESSION['PIN'] = $_POST['PIN'];

    header('location:'.routeTo('ppdb/formulir'));
    die();
}

Page::set_title('Pendaftaran PPDB');

return view('ppdb/views/check',compact('success_msg','error_msg','old'));