<?php

/**
 * User Roles Configuration
 */

return [
    'admin' => [
        'name' => 'Admin',
        'description' => 'Hallinnoi kaikkea',
        'permissions' => [
            'view_matrix',
            'manage_worksites',
            'manage_jobs',
            'manage_equipment',
            'manage_matrix',
            'manage_users',
            'manage_roles',
        ],
    ],
    'safety_manager' => [
        'name' => 'Turvallisuuspäällikkö',
        'description' => 'Päivittää matriisia',
        'permissions' => [
            'view_matrix',
            'manage_worksites',
            'manage_jobs',
            'manage_equipment',
            'manage_matrix',
        ],
    ],
    'site_supervisor' => [
        'name' => 'Työmaapäällikkö',
        'description' => 'Näkee matriisia',
        'permissions' => [
            'view_matrix',
        ],
    ],
    'user' => [
        'name' => 'Käyttäjä',
        'description' => 'Katselee ohjeita',
        'permissions' => [
            'view_matrix',
        ],
    ],
];
