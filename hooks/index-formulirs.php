<?php

if($filter)
{
    $filter_query = [];
    foreach($filter as $f_key => $f_value)
    {
        $filter_query[] = "$f_key = '$f_value'";
    }

    $filter_query = implode(' AND ', $filter_query);

    $where = (empty($where) || $where == "" ? 'WHERE ' : ' AND ') . $filter_query;
}

$this->db->query = "SELECT * FROM $this->table $where ORDER BY id DESC LIMIT $start,$length";
$data  = $this->db->exec('all');

$total = $this->db->exists($this->table,$where,[
    $col_order => $order[0]['dir']
]);

return compact('data', 'total');