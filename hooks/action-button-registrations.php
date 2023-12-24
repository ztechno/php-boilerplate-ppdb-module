<?php

$button = "";

if($data->status == 'MENUNGGU PEMBAYARAN')
{
    $button .= '<a href="'.routeTo('ppdb/confirm', ['id' => $data->id]).'" class="btn btn-sm btn-primary" onclick="if(confirm(\'Apakah anda yakin mengkonfirmasi pembayaran ?\')){return true}else{return false}"><i class="fas fa-check"></i> Konfirmasi</a> ';
}

$button .= '<a href="'.routeTo('ppdb/resend', ['id' => $data->id]).'" class="btn btn-sm btn-secondary" onclick="if(confirm(\'Apakah anda yakin mengirim ulang notifikasi ?\')){return true}else{return false}"><i class="fas fa-bell"></i> Resend</a> ';

return $button;