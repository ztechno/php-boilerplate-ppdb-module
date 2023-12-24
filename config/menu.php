<?php return [
    'registrations' => [
        'label' => 'ppdb.menu.registrations',
        'icon'  => 'fa-fw fa-xl me-2 fa-solid fa-users',
        'route' => routeTo('crud/index',['table'=>'registrations']),
        'activeState' => 'ppdb.registrations'
    ],
    'formulirs' => [
        'label' => 'ppdb.menu.formulirs',
        'icon'  => 'fa-fw fa-xl me-2 fa-solid fa-file',
        'route' => routeTo('crud/index',['table'=>'formulirs', 'filter' => ['status' => 'send']]),
        'activeState' => 'ppdb.formulirs'
    ]
];