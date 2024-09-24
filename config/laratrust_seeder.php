<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super-admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'doctors' => 'c,r,u,d',
            'offers' => 'c,r,u,d',
            'subscriptions' => 'r,u,d',
            'employment_applications' => 'c,r,u,d',
            'activities' => 'c,r,u,d',
            'positions' => 'c,r,u,d',
            'activityimages' => 'c,r,u,d',
            'blogs' => 'c,r,u,d',
            'contacts' => 'r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',

        ]
    ],

    'roles_translations' => [
        'super-admin' => [
            'en' => 'Super Admin',
            'ar' => 'مشرف عام'
        ],
        'admin' => [
            'en' => 'Admin',
            'ar' => 'مشرف'
        ]
    ],

    'roles_settings' => [
        'super-admin' => [
            'is_editable' => false,
            'is_deletable' => false,
            'has_additional_data' => false
        ],
        'admin' => [
            'is_editable' => true,
            'is_deletable' => false,
            'has_additional_data' => false
        ]
    ],


    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
