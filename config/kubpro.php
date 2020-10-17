
<?php
return [
    'permission' => [
        'role_structure' => [
            'administrator' => [
                'setting'   => 'c,u',
                'user'      => 'c,r,u,d',
                'role'      => 'c,r,u,d',
                'customer'  => 'c,r,u,d',

            ],
            'moderator' => [
                'user'      => 'c,r',
                'role'      => 'r',
                'customer'  => 'c,r,u,d',
            ]
        ],
        'permissions_map' => [
            'c' => 'create',
            'r' => 'read',
            'u' => 'update',
            'd' => 'delete',
            'e' => 'export',
            's' => 'show'
        ]
    ]
];
