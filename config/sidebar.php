<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */
    'menu' => [
        [
            'icon' => 'fa fa-star',
            'title' => 'Main',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/admin/users',
                    'title' => 'Users',
                    'route-name' => 'users.index'
                ],
                [
                    'url' => '/admin/slides',
                    'title' => 'Hompage Slides',
                    'route-name' => 'slides.index'
                ]
            ]
        ],
        [
            'icon' => 'fa fa-list-ol',
            'title' => 'Admin',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/admin/blogs',
                    'title' => 'Blog Management',
                    'route-name' => 'admin.blogs.index'
                ],
                [
                    'url' => '/admin/projects',
                    'title' => 'Project Management',
                    'route-name' => 'admin.projects.index'
                ],
            ]
        ]
    ]
];
