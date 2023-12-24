<?php

$button = "";

$button .= '<a href="'.routeTo('ppdb/detail', ['id' => $data->id]).'" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat</a> ';

return $button;