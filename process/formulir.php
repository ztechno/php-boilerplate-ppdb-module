<?php

use Core\Database;
use Core\Page;
use Core\Request;
use Core\Validation;
use Modules\Ppdb\Libraries\WhatsApp;

if(!isset($_SESSION['PIN']))
{
    header('location:'.routeTo('ppdb/check'));
    die();
}

Page::set_title('Formulir PPDB');

$db = new Database;
$success_msg = get_flash_msg('success');
$error_msg   = get_flash_msg('error');

$PIN = $_SESSION['PIN'];
$data = $db->single('registrations',[
    'PIN' => $PIN
]);

$data->formulir = $db->single('formulirs',[
    'registration_id' => $data->id
]);

if($data->formulir)
{
    $data->formulir->metadata = json_decode($data->formulir->metadata);
}

if(Request::isMethod('POST'))
{
    $formulir = $_POST['formulir'];
    $formulir['registration_id'] = $data->id;
    $formulir['metadata'] = json_encode($_POST['metadata']);
    $formulir['status']   = $_POST['submit'];

    if(!$data->formulir)
    {
        Validation::run([
            'NIK' => [
                'required','unique:formulirs'
            ]
        ], $_POST['formulir']);
    
        
        $db->insert('formulirs', $formulir);
    }
    else
    {
        // Validation::run([
        //     'NIK' => [
        //         'required','unique:formulirs,NIK,'.$data->formulir->NIK
        //     ]
        // ], $_POST['formulir']);

        $formulir['updated_at'] = date('Y-m-d H:i:s');
        $db->update('formulirs', $formulir, [
            'registration_id' => $data->id
        ]);
    }

    // redirect back with success message
    $message = $_POST['submit'] == 'save' ? 'disimpan' : 'dikirim';
    set_flash_msg(['success'=>"Formulir berhasil $message."]);

    if($message == 'dikirim')
    {
        (new WhatsApp)->sendNotifAfterFormSubmit($data);
    }

    header('location:'.routeTo('ppdb/formulir'));
    die();
}



return view('ppdb/views/formulir', compact('data', 'success_msg', 'error_msg'));