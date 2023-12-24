<?php return [
    'registrations' => [
        'name' => [
            'label' => 'Nama',
            'type' => 'text',
        ],
        'phone' => [
            'label' => 'No. WA',
            'type' => 'tel',
        ],
        'email' => [
            'label' => 'Email',
            'type' => 'email',
        ],
        'PIN' => [
            'label' => 'PIN',
            'type' => 'text',
        ],
        'status' => [
            'label' => 'Status',
            'type' => 'options:MENUNGGU PEMBAYARAN|PEMBAYARAN FORMULIR DITERIMA|MENUNGGU PENGIRIMAN DATA FORMULIR|HASIL TES DALAM VERIFIKASI|DITERIMA|GAGAL DITERIMA',
        ],
    ],
    'formulirs' => [
        'NIK',
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'gender' => [
            'label' => 'Jenis Kelamin',
            'type'  => 'text'
        ],
        'address' => [
            'label' => 'Alamat',
            'type'  => 'text'
        ],
    ]
];