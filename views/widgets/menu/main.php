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
        // ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Inicio', 'url' => Yii::$app->user->isGuest ? ['/index.html'] : ['/site/index'],],
    ];

    if (Yii::$app->user->isGuest) {
        // Enlace del Menú Entrar
        // $menuItems[] = ['label' => 'Entrar', 'url' => ['/site/login']];
        // $menuItems[] = ['label' => 'Entrar', 'url' => ['/user-management/auth/login'], 'visible' => Yii::$app->user->isGuest];
        $menuItems[] = ['label' => 'Entrar', 'url' => ['/user-management/auth/login']];

        // Enlace del Menú Contactos
        $menuItems[] = ['label' => 'Contactos', 'url' => ['/site/contact']];

        // Enlace del Menú Acerca de
        $menuItems[] = ['label' => 'Acerca de', 'url' => ['/site/about']];
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
            // Enlace del Menú Registros Comunes
            $menuItems[] = [
                'label' => 'Registros Comunes',
                'items' => [
                    // Enlace del Submenú Unidad de Batallón
                    [
                        'label' => 'Unidad de Batallón',
                        'url' => '#',
                        'items' => [
                            // Listado de Unidad de Batallón
                            ['label' => 'Listado', 'url' => ['/unidad/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            // Crear Unidad de Batallón
                            ['label' => 'Crear', 'url' => ['/unidad/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                        // 'visible' => User::hasRole('ConsultarRegistros'),
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Oficiales
                    [
                        'label' => 'Oficiales',
                        'url' => '#',
                        'items' => [
                            // Listado de Oficiales
                            ['label' => 'Listado', 'url' => ['/oficiales/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            // Crear Oficial
                            ['label' => 'Crear', 'url' => ['/oficiales/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Captadores
                    [
                        'label' => 'Captadores',
                        'url' => '#',
                        'items' => [
                            // Listado de Captadores
                            ['label' => 'Listado', 'url' => ['/captador/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            // Crear Captador
                            ['label' => 'Crear', 'url' => ['/captador/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                ],
            ];

            // Enlace del Menú Expediente
            $menuItems[] = [
                'label' => 'Expediente',
                'items' => [
                    // Enlace del Submenú Datos Básicos
                    [
                        'label' => 'Datos Básicos',
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
                        'label' => 'Datos Familiares',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Listado', 'url' => ['/familiares/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            ['label' => 'Crear', 'url' => ['/familiares/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Datos Sociológicos
                    [
                        'label' => 'Datos Sociológicos',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Listado', 'url' => ['/sociologico/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            ['label' => 'Crear', 'url' => ['/sociologico/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Fisionomía del Personal
                    [
                        'label' => 'Fisionomía del Personal',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Listado', 'url' => ['/fisionomia/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            ['label' => 'Crear', 'url' => ['/fisionomia/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                    '<li class="divider"></li>',
                    // Enlace del Submenú Uniforme del Personal
                    [
                        'label' => 'Uniforme del Personal',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Listado', 'url' => ['/uniforme/index'], 'visible' => User::hasRole('ConsultarRegistros')],
                            ['label' => 'Crear', 'url' => ['/uniforme/create'], 'visible' => User::hasRole('LlenarRegistros')],
                        ],
                    ],
                ],
            ];

        }
        // Enlace del Menú Expediente
        // $menuItems[] = [
        //     'label' => 'Expediente',
        //     'items' => [
        //         // Enlace del Submenú Datos Básicos
        //         [
        //             'label' => 'Datos Básicos',
        //             'url' => '#',
        //             'items' => [
        //                 // Listado de Personal
        //                 ['label' => 'Listado', 'url' => ['/persona/index'], 'visible' => User::hasRole('ConsultarRegistros')],
        //                 // Crear Personal
        //                 ['label' => 'Crear', 'url' => ['/persona/create'], 'visible' => User::hasRole('LlenarRegistros')],
        //             ],
        //         ],
        //         '<li class="divider"></li>',
        //         // Enlace del Submenú Datos Familiares
        //         // ['label' => 'Datos Familiares', 'url' => ['/familiares/index'], 'visible' => User::hasRole('ConsultarRegistros')],
        //         [
        //             'label' => 'Datos Familiares',
        //             'url' => '#',
        //             'items' => [
        //                 ['label' => 'Listado', 'url' => ['/familiares/index'], 'visible' => User::hasRole('ConsultarRegistros')],
        //                 ['label' => 'Crear', 'url' => ['/familiares/create'], 'visible' => User::hasRole('LlenarRegistros')],
        //             ],
        //         ],
        //         '<li class="divider"></li>',
        //         // Enlace del Submenú Datos Sociológicos
        //         [
        //             'label' => 'Datos Sociológicos',
        //             'url' => '#',
        //             'items' => [
        //                 ['label' => 'Listado', 'url' => ['/sociologico/index'], 'visible' => User::hasRole('ConsultarRegistros')],
        //                 ['label' => 'Crear', 'url' => ['/sociologico/create'], 'visible' => User::hasRole('LlenarRegistros')],
        //             ],
        //         ],
        //         '<li class="divider"></li>',
        //         // Enlace del Submenú Fisionomía del Personal
        //         [
        //             'label' => 'Fisionomía del Personal',
        //             'url' => '#',
        //             'items' => [
        //                 ['label' => 'Listado', 'url' => ['/fisionomia/index'], 'visible' => User::hasRole('ConsultarRegistros')],
        //                 ['label' => 'Crear', 'url' => ['/fisionomia/create'], 'visible' => User::hasRole('LlenarRegistros')],
        //             ],
        //         ],
        //         '<li class="divider"></li>',
        //         // Enlace del Submenú Uniforme del Personal
        //         [
        //             'label' => 'Uniforme del Personal',
        //             'url' => '#',
        //             'items' => [
        //                 ['label' => 'Listado', 'url' => ['/uniforme/index'], 'visible' => User::hasRole('ConsultarRegistros')],
        //                 ['label' => 'Crear', 'url' => ['/uniforme/create'], 'visible' => User::hasRole('LlenarRegistros')],
        //             ],
        //             'visible' => User::hasRole('listarCaptadores'),
        //         ],
        //     ],
        // ];

        if (User::hasRole('Admin')) {
            // Enlace del Menú Seguridad
            $menuItems[] = [
                'label' => 'Seguridad',
                'items' => array_merge(array_map(
                    function($item) {
                            $item['encode'] = false;
                            $item['visible'] = User::hasRole('Admin');
                            return $item;
                        }, UserManagementModule::menuItems()
                    )
                ),
            ];
        }

        // Enlace del Menú Contactos
        $menuItems[] = [
            'label' => 'Contactos',
            'url' => ['/site/contact'],
            'visible' => Yii::$app->user->isGuest,
        ];
        // Enlace del Menú Ayuda
        $menuItems[] = [
            'label' => 'Ayuda',
            'items' => [
                ['label' => 'Contactos', 'url' => ['/site/contact']],
                // Enlace del Submenú Acerca de sistema
                ['label' => 'Acerca de', 'url' => ['/site/about']],
            ],
        ];

        // Enlace del Menú Usuario
        $menuItems[] = [
            'label' => 'Usuario' . ' (' . Yii::$app->user->identity->username . ')',
            'items' => [
                // ['label' => 'Registro', 'url' => ['/user-management/auth/registration']],
                ['label' => 'Cambiar propia contraseña', 'url' => ['/user-management/auth/change-own-password']],
                // ['label' => 'Recuperar contraseña', 'url' => ['/user-management/auth/password-recovery']],
                ['label' => 'Correo de confirmación', 'url' => ['/user-management/auth/confirm-email']],
                [
                    'label' => 'Salir',
                    // 'url' => ['/site/logout'],
                    'url' => ['/user-management/auth/logout'],
                    'linkOptions' => ['data-method' => 'post'],
                    'class' => ['glyphicon glyphicon-off']
                ],
            ],
        ];
    }

    // echo GhostMenu::widget([
    //     'encodeLabels' => false,
    //     'activateParents' => true,
    //     'items' => $menuItems
    // ]);
/*
    echo GhostMenu::widget([
        'encodeLabels'=>false,
        'activateParents'=>true,
        'items' => [
            [
                'label' => 'Backend routes',
                'items' => UserManagementModule::menuItems()
            ],
            [
                'label' => 'Frontend routes',
                'items' => [
                    ['label' => 'Login', 'url' => ['/user-management/auth/login']],
                    ['label' => 'Logout', 'url' => ['/user-management/auth/logout']],
                    ['label' => 'Registration', 'url' => ['/user-management/auth/registration']],
                    ['label' => 'Change own password', 'url' => ['/user-management/auth/change-own-password']],
                    ['label' => 'Password recovery', 'url' => ['/user-management/auth/password-recovery']],
                    ['label' => 'E-mail confirmation', 'url' => ['/user-management/auth/confirm-email']],
                ],
            ],
        ],
    ]);
*/

    echo Nav::widget([
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ],
        'items' => $menuItems,
    ]);
    NavBar::end();

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
