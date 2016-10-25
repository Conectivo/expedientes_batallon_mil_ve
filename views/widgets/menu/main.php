<?php

/* @var $this \yii\web\View */

// use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;

    NavBar::begin([
        // 'brandLabel' => 'Sistema de expedientes',
        'brandLabel' => \yii\helpers\Html::img('@web/images/ico/logoejercito.png', [
            'class'=>'img-responsive', 'width'=>'47', 'height'=>'49',
            'alt'=>'Sistema de expedientes - Cuartel Negro Primero'
        ]),
        'brandUrl' => Yii::$app->homeUrl,
        'brandOptions' => [
            'title' => 'Sistema de expedientes - Cuartel Negro Primero',
            'id' => 'ejercito-logo',
        ],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        // Enlace del Menú Inicio
        [
            'label' => '<span class="glyphicon glyphicon-home"></span> ' . 'Inicio',
            'url' => Yii::$app->user->isGuest ? ['/index.html'] : ['/site/index'],
        ],
    ];

    if (Yii::$app->user->isGuest) {
        // Enlace del Menú Entrar
        // $menuItems[] = ['label' => 'Entrar', 'url' => ['/user-management/auth/login'], 'visible' => Yii::$app->user->isGuest];
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-log-in"></span> ' . 'Entrar',
            'url' => ['/user-management/auth/login']
        ];

        // Enlace del Menú Contactos
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-envelope"></span> ' . 'Contactos', 'url' => ['/site/contact']
        ];

        // Enlace del Menú Acerca de
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-sunglasses"></span> ' . 'Acerca de', 'url' => ['/site/about']
        ];
    } else {
        // Enlace del Menú Registros Comunes
        // $menuItems[] = [
        //     'label' => 'Registros Comunes',
        //     'items' => [
        //         // Enlace del Submenú Unidad de Batallón
        //         [
        //             'label' => 'Unidad de Batallón',
        //             'url' => '#',
        //             'items' => [
        //                 // Listado de Unidad de Batallón
        //                 ['label' => 'Listado', 'url' => ['/unidad/index'], 'visible' => User::hasRole('ConsultarRegistros')],
        //                 // Crear Unidad de Batallón
        //                 ['label' => 'Crear', 'url' => ['/unidad/create'], 'visible' => User::hasRole('LlenarRegistros')],
        //             ],
        //             'visible' => User::hasRole('ConsultarRegistros'),
        //         ],
        //         '<li class="divider"></li>',
        //         // Enlace del Submenú Oficiales
        //         [
        //             'label' => 'Oficiales',
        //             'url' => '#',
        //             'items' => [
        //                 // Listado de Oficiales
        //                 ['label' => 'Listado', 'url' => ['/oficiales/index'], 'visible' => User::hasRole('ConsultarRegistros')],
        //                 // Crear Oficial
        //                 ['label' => 'Crear', 'url' => ['/oficiales/create'], 'visible' => User::hasRole('LlenarRegistros')],
        //             ],
        //             'visible' => User::hasRole('ConsultarRegistros'),
        //         ],
        //         '<li class="divider"></li>',
        //         // Enlace del Submenú Captadores
        //         [
        //             'label' => 'Captadores',
        //             'url' => '#',
        //             'items' => [
        //                 // Listado de Captadores
        //                 ['label' => 'Listado', 'url' => ['/captador/index'], 'visible' => User::hasRole('ConsultarRegistros')],
        //                 // Crear Captador
        //                 ['label' => 'Crear', 'url' => ['/captador/create'], 'visible' => User::hasRole('LlenarRegistros')],
        //             ],
        //             'visible' => User::hasRole('ConsultarRegistros'),
        //         ],
        //     ],
        // ];

        if (User::hasRole('ConsultarRegistros')) {

            // Enlace del Menú Expediente
            $menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-certificate"></span> ' . 'Expediente',
                'items' => [
                    // Enlace del Submenú Datos Básicos
                    [
                        'label' => '<span class="glyphicon glyphicon-user"></span> ' . 'Datos Básicos',
                        'url' => '#',
                        'items' => [
                            // Listado de Personal
                            ['label' => 'Listado', 'url' => ['/persona/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            // Crear Personal
                            ['label' => 'Crear', 'url' => ['/persona/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Datos Familiares
                    [
                        'label' => '<span class="glyphicon glyphicon-info-sign"></span> ' . 'Datos Familiares',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Listado', 'url' => ['/familiares/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            ['label' => 'Crear', 'url' => ['/familiares/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Datos Sociológicos
                    [
                        'label' => '<span class="glyphicon glyphicon-education"></span> ' . 'Datos Sociológicos',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Listado', 'url' => ['/sociologico/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            ['label' => 'Crear', 'url' => ['/sociologico/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Fisionomía del Personal
                    [
                        'label' => '<span class="glyphicon glyphicon-scale"></span> ' . 'Fisionomía del Personal',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Listado', 'url' => ['/fisionomia/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            ['label' => 'Crear', 'url' => ['/fisionomia/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Uniforme del Personal
                    [
                        'label' => '<span class="glyphicon glyphicon-briefcase"></span> ' . 'Uniforme del Personal',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Listado', 'url' => ['/uniforme/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            ['label' => 'Crear', 'url' => ['/uniforme/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                ],
            ];

            // Enlace del Menú Registros Comunes
            $menuItems[] = [
                'label' => '<span class="glyphicon glyphicon-send"></span> ' . 'Registros Comunes',
                'items' => [
                    // Enlace del Submenú Oficiales
                    [
                        'label' => '<span class="glyphicon glyphicon-user"></span> ' . 'Oficiales',
                        'url' => '/oficiales/index',
                        /* 'items' => [
                            // Listado de Oficiales
                            ['label' => 'Listado', 'url' => ['/oficiales/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            // Crear Oficial
                            ['label' => 'Crear', 'url' => ['/oficiales/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ], */
                        'visible' => User::hasRole('ConsultarRegistros'),
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Captadores
                    [
                        'label' => '<span class="fa fa-street-view"></span> ' . 'Captadores',
                        'url' => '/captador/index',
                        /* 'items' => [
                            // Listado de Captadores
                            ['label' => 'Listado', 'url' => ['/captador/list'], 'visible' => User::hasRole('ConsultarRegistros')],
                            // Crear Captador
                            ['label' => 'Crear', 'url' => ['/captador/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],*/
                        'visible' => User::hasRole('ConsultarRegistros'),
                    ],
                ],
            ];

            // Enlace del Menú Centro de Reporte
            $menuItems[] = [
                'label' => '<span class="fa fa-pie-chart"></span> ' . 'Reportes',
                'items' => [
                    // Enlace del Submenú Reporte de Información de Oficiales
                    [
                        'label' => '<span class="fa fa-area-chart"></span> ' . 'Reporte de Información de Oficiales',
                        'url' => '/reporte/oficiales/oficialesreport',
                        'visible' => User::hasRole('ConsultarRegistros'),
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Reporte de Información de Captadores
                    [
                        'label' => '<span class="fa fa-bar-chart"></span> ' . 'Reporte de Información de Captadores',
                        'url' => '#',
                        'visible' => User::hasRole('ConsultarRegistros'),
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Reporte de Información de Personal
                    [
                        'label' => '<span class="fa fa-line-chart"></span> ' . 'Reporte de Información de Personal',
                        'url' => '#',
                        'visible' => User::hasRole('ConsultarRegistros'),
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Historial de Inicio de Sesión
                    [
                        'label' => '<span class="glyphicon glyphicon-user"></span> ' . 'Historial de Inicio de Sesión',
                        'url' => '/user-management/user-visit-log/index',
                        'visible' => User::hasRole('HistorialInicioSesion'),
                    ],
                ],
            ];

            // Enlace del Menú Configuración del sistema
            $menuItems[] = [
                'label' => '<span class="fa fa-sliders"></span> ' . 'Configuraciones',
                'items' => [
                    // Enlace del Submenú Unidad de Batallón
                    [
                        'label' => '<span class="glyphicon glyphicon-home"></span> ' . 'Unidad de Batallón',
                        'url' => '/unidad/index',
                        /* 'items' => [
                            // Listado de Unidad de Batallón
                            ['label' => 'Listado', 'url' => ['/unidad/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            // Crear Unidad de Batallón
                            ['label' => 'Crear', 'url' => ['/unidad/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],*/
                        'visible' => User::hasRole('ConsultarRegistros'),
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Jerarquía
                    [
                        'label' => '<span class="glyphicon glyphicon-certificate"></span> ' . 'Jerarquía',
                        'url' => '/jerarquia/index',
                        /* 'items' => [
                            // Listado de Jerarquía
                            ['label' => 'Listado', 'url' => ['/jerarquia/list'], 'visible' => User::hasRole('ConsultarRegistros')],
                            // Crear Jerarquía
                            ['label' => 'Crear', 'url' => ['/jerarquia/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],*/
                        'visible' => User::hasRole('ConsultarRegistros'),
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Género
                    [
                        'label' => '<span class="fa fa-venus-mars"></span> ' . 'Género',
                        'url' => '/genero/index',
                        'visible' => User::hasRole('ConsultarRegistros'),
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Seguridad
                    [
                        'label' => '<span class="glyphicon glyphicon-cog"></span> ' . 'Seguridad',
                        'url' => '#',
                        'items' => array_merge(array_map(
                            function($item) {
                                    $item['encode'] = false;
                                    $item['visible'] = User::hasRole('Admin');
                                    return $item;
                                }, UserManagementModule::menuItems()
                            )
                        ),
                        'visible' => User::hasRole('Admin'),
                    ],
                ],
            ];

        }

        // if (User::hasRole('Admin')) {
        //     // Enlace del Menú Seguridad
        //     $menuItems[] = [
        //         'label' => '<span class="glyphicon glyphicon-cog"></span> ' . 'Seguridad',
        //         'items' => array_merge(array_map(
        //             function($item) {
        //                     $item['encode'] = false;
        //                     $item['visible'] = User::hasRole('Admin');
        //                     return $item;
        //                 }, UserManagementModule::menuItems()
        //             )
        //         ),
        //     ];
        // }

        // Enlace del Menú Contactos
        $menuItems[] = [
            'label' => 'Contactos',
            'url' => ['/site/contact'],
            'visible' => Yii::$app->user->isGuest,
        ];

        // Enlace del Menú Ayuda
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-book"></span> ' . 'Ayuda',
            'items' => [
                ['label' => '<span class="glyphicon glyphicon-envelope"></span> ' . 'Contactos', 'url' => ['/site/contact']],
                // Enlace del Submenú Acerca de sistema
                ['label' => '<span class="glyphicon glyphicon-sunglasses"></span> ' . 'Acerca de', 'url' => ['/site/about']],
            ],
        ];

        // Enlace del Menú Usuario
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-user"></span> ' . 'Usuario' . ' (' . Yii::$app->user->identity->username . ')',
            'items' => [
                // ['label' => 'Registro', 'url' => ['/user-management/auth/registration']],
                [
                    'label' => '<span class="glyphicon glyphicon-star-empty"></span> ' . 'Cambiar propia contraseña',
                    'url' => ['/user-management/auth/change-own-password']
                ],
                // ['label' => 'Recuperar contraseña', 'url' => ['/user-management/auth/password-recovery']],
                [
                    'label' => '<span class="glyphicon glyphicon-envelope"></span> ' . 'Correo de confirmación',
                    'url' => ['/user-management/auth/confirm-email']
                ],
                [
                    'label' => '<span class="glyphicon glyphicon-off"></span> ' . 'Salir',
                    // 'url' => ['/site/logout'],
                    'url' => ['/user-management/auth/logout'],
                    'linkOptions' => ['data-method' => 'post'],
                    'class' => ['glyphicon glyphicon-off']
                ],
            ],
        ];
    }

    echo Nav::widget([
        'encodeLabels' => false,
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ],
        'items' => $menuItems,
    ]);
    NavBar::end();

    // echo GhostMenu::widget([
    //     'encodeLabels' => false,
    //     'activateParents' => true,
    //     'options' => [
    //         'class' => 'navbar-nav navbar-right'
    //     ],
    //     'items' => $menuItems
    // ]);

/* 
    NavBar::begin([
        'brandLabel' => 'My Company (Logo)',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('menu.default', 'Главная'), 'url' => ['/main/home']],
        ['label' => Yii::t('menu.default', 'Каталог'), 'url' => ['/catalog/list']],
        ['label' => Yii::t('menu.default', 'Новости'), 'url' => ['/main/about-us']],
        ['label' => Yii::t('menu.default', 'О нас'), 'url' => ['/main/about-us']],
        ['label' => Yii::t('menu.default', 'Контакты'), 'url' => ['/main/contacts']],
    ];
    // if (Yii::$app->session->isActive) {
        $menuItems[] = ['label' => Yii::t('menu.default', 'Корзина'), 'url' => ['#']];
	// }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-user"></span> ' . Yii::t('menu.default', 'Войти'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                '<span class="glyphicon glyphicon-off"></span> ' . Yii::t('menu.default', 'Выйти') . ' (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
		'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
*/
