<?php

/* @var $this \yii\web\View */

// use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;

    NavBar::begin([
        'brandLabel' => 'Sistema de expedientes',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        // Enlace del Menú Inicio
        // ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Inicio', 'url' => ['/index.html']],
    ];

    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Entrar', 'url' => ['/site/login']];
        // $menuItems[] = ['label' => 'Entrar', 'url' => ['/user-management/auth/login'], 'visible' => Yii::$app->user->isGuest];
        $menuItems[] = ['label' => 'Entrar', 'url' => ['/user-management/auth/login']];
    } else {
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
                        ['label' => 'Listado', 'url' => ['/unidad/']],
                        // Crear Unidad de Batallón
                        ['label' => 'Crear', 'url' => ['/unidad/create']],
                    ],
                ],
                '<li class="divider"></li>',
                // Enlace del Submenú Oficiales
                [
                    'label' => 'Oficiales',
                    'url' => '#',
                    'items' => [
                        // Listado de Oficiales
                        ['label' => 'Listado', 'url' => ['/oficiales/']],
                        // Crear Oficial
                        ['label' => 'Crear', 'url' => ['/oficiales/create']],
                    ],
                ],
                '<li class="divider"></li>',
                // Enlace del Submenú Captadores
                [
                    'label' => 'Captadores',
                    'url' => '#',
                    'items' => [
                        // Listado de Captadores
                        ['label' => 'Listado', 'url' => ['/captador/']],
                        // Crear Captador
                        ['label' => 'Crear', 'url' => ['/captador/create']],
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
                        ['label' => 'Listado', 'url' => ['/persona/']],
                        // Crear Personal
                        ['label' => 'Crear', 'url' => ['/persona/create']],
                    ],
                ],
                '<li class="divider"></li>',
                // Enlace del Submenú Datos Familiares
                // ['label' => 'Datos Familiares', 'url' => ['/familiares/']],
                [
                    'label' => 'Datos Familiares',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Listado', 'url' => ['/familiares/']],
                        ['label' => 'Crear', 'url' => ['/familiares/create']],
                    ],
                ],
                '<li class="divider"></li>',
                // Enlace del Submenú Datos Sociológicos
                // ['label' => 'Datos Sociológicos', 'url' => ['/sociologico']],
                [
                    'label' => 'Datos Sociológicos',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Listado', 'url' => ['/sociologico/']],
                        ['label' => 'Crear', 'url' => ['/sociologico/create']],
                    ],
                ],
                '<li class="divider"></li>',
                // Enlace del Submenú Fisionomía del Personal
                // ['label' => 'Fisionomía del Personal', 'url' => ['/fisionomia']],
                [
                    'label' => 'Fisionomía del Personal',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Listado', 'url' => ['/fisionomia/']],
                        ['label' => 'Crear', 'url' => ['/fisionomia/create']],
                    ],
                ],
                '<li class="divider"></li>',
                // Enlace del Submenú Uniforme del Personal
                // ['label' => 'Uniforme del Personal', 'url' => ['/uniforme']],
                [
                    'label' => 'Uniforme del Personal',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Listado', 'url' => ['/uniforme/']],
                        ['label' => 'Crear', 'url' => ['/uniforme/create']],
                    ],
                ],
            ],
        ];

        // Enlace del Menú Seguridad
        $menuItems[] = [
            'label' => 'Seguridad',
            'items' => array_merge(array_map(
                function($item) {
                        $item['encode'] = false;
                        $item['visible'] = webvimark\modules\UserManagement\models\User::hasRole('Admin');
                        return $item;
                    }, UserManagementModule::menuItems()
                )),
                // [
                //     ['label' => 'Events', 'url' => ['/events'], 'visible' => webvimark\modules\UserManagement\models\User::hasRole('Admin')],
                //     ['label' => 'Notifications on events', 'url' => ['/notifications-on-event'], 'visible' => webvimark\modules\UserManagement\models\User::hasRole('Admin')],
                //     ['label' => 'Send message', 'url' => ['/site/send-message'], 'visible' => webvimark\modules\UserManagement\models\User::hasRole('Admin')],
                //     ['label' => 'Add news', 'url' => ['/news/create'], 'visible' => webvimark\modules\UserManagement\models\User::hasPermission('addNews')],
                //     ['label' => 'Profile', 'url' => ['/user/profile']],
                // ],
                // ['<li class="divider"></li>'],
                // [
                //     ['label' => 'Logout', 'url' => ['/user-management/auth/logout']]
                // ]
        ];

        // Enlace del Menú Contactos
        $menuItems[] = [
            'label' => 'Contactos',
            'url' => ['/site/contact'],

        ];

        // Enlace del Menú Usuario
        $menuItems[] = [
            'label' => 'Usuario' . ' (' . Yii::$app->user->identity->username . ')',
            // 'url' => ['/site/logout'],
            // 'url' => ['/user-management/auth/logout'],
            // 'linkOptions' => ['data-method' => 'post'],
            'items'=>[
                // ['label'=>'Entrar', 'url'=>['/user-management/auth/login']],
                // ['label'=>'Registro', 'url'=>['/user-management/auth/registration']],
                ['label'=>'Cambiar propia contraseña', 'url'=>['/user-management/auth/change-own-password']],
                // ['label'=>'Recuperar contraseña', 'url'=>['/user-management/auth/password-recovery']],
                ['label'=>'Correo de confirmación', 'url'=>['/user-management/auth/confirm-email']],
                [
                    'label'=>'Salir',
                    'url'=>['/user-management/auth/logout'],
                    'linkOptions' => ['data-method' => 'post'],
                ],
            ],
        ];
    }

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
            'items'=>[
                ['label'=>'Login', 'url'=>['/user-management/auth/login']],
                ['label'=>'Logout', 'url'=>['/user-management/auth/logout']],
                ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
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
