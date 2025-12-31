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
                ],
                [
                    'url' => '/admin/register-interest',
                    'title' => 'Registered Interest',
                    'route-name' => 'register-interest.index'
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
                [
                    'url' => '/admin/press-releases',
                    'title' => 'Press Releases',
                    'route-name' => 'admin.press-releases.index'
                ]
                ,[
                    'url' => '/admin/awards',
                    'title' => 'Award Management',
                    'route-name' => 'admin.awards.index'
                ]
                    ,[
                        'url' => '/admin/news',
                        'title' => 'News Management',
                        'route-name' => 'admin.news.index',
                        'icon' => 'fa fa-newspaper',
                    ],
                    [
                        'url' => '/admin/green_initiatives',
                        'title' => 'Green Initiatives',
                        'route-name' => 'admin.green_initiatives.index',
                        'icon' => 'fa fa-leaf',
                    ],
                    [
                        'url' => '/admin/community_impacts',
                        'title' => 'Community Impact',
                        'route-name' => 'admin.community_impacts.index',
                        'icon' => 'fa fa-users',
                    ],
                    [
                        'url' => '/admin/employee_engagements',
                        'title' => 'Employee Engagement',
                        'route-name' => 'admin.employee_engagements.index',
                        'icon' => 'fa fa-handshake-o',
                    ],
                    [
                        'url' => '/admin/documents',
                        'title' => 'Document Management',
                        'route-name' => 'admin.documents.index',
                        'icon' => 'fa fa-file',
                    ],
                    [
                        'url' => '/admin/performance-highlights',
                        'title' => 'Performance Highlights',
                        'route-name' => 'admin.performance-highlights.index',
                        'icon' => 'fa fa-trophy',
                    ],
                    [
                        'url' => '/admin/sustainability-overviews',
                        'title' => 'Sustainability Overview',
                        'route-name' => 'admin.sustainability-overviews.index',
                        'icon' => 'fa fa-globe',
                    ],
                    [
                        'url' => '/admin/sustainability-goals',
                        'title' => 'Sustainability Goals',
                        'route-name' => 'admin.sustainability-goals.index',
                        'icon' => 'fa fa-bullseye',
                    ],
                    [
                        'url' => '/admin/sustainability-governances',
                        'title' => 'Sustainability Governance',
                        'route-name' => 'admin.sustainability-governances.index',
                        'icon' => 'fa fa-gavel',
                    ],
                    [
                        'url' => '/admin/our-commitments',
                        'title' => 'Our Commitments',
                        'route-name' => 'admin.our-commitments.index',
                        'icon' => 'fa fa-handshake',
                    ],
                    [
                        'url' => '/admin/sustainability-reports',
                        'title' => 'Sustainability Reports',
                        'route-name' => 'admin.sustainability-reports.index',
                        'icon' => 'fa fa-file-pdf-o',
                    ]
            ]
        ]
    ]
];
