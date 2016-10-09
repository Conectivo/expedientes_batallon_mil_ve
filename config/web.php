<?php

$params = array_merge(
   require(__DIR__ . '/common.php'),
   require(__DIR__ . '/params.php')
);

$config = [
    'id' => 'expedientes',
    'basePath' => dirname(__DIR__),
    // Define el idioma destino a mostrar los mensajes del sistema, en este caso Español
    // @see http://www.yiiframework.com/doc-2.0/yii-base-application.html#$language-detail
    'language' => 'es',
    // Define el idioma de origen con el cual se mostrara los mensajes del sistema, en este caso Ingles
    // @see http://www.yiiframework.com/doc-2.0/yii-base-application.html#$sourceLanguage-detail
    'sourceLanguage' => 'en-US',
    'bootstrap' => ['log'],
    'components' => [
        // Configuraciones del componente Asset Manager
        'assetManager' => require(__DIR__ . '/assets.php'),
        // Configuraciones del componente Request
        'request' => [
            'cookieValidationKey' => 'GKBLgGjWxtyx3f7_4vWU-JxNdvuA5o4P',
        ],
        // Configuraciones del componente Cache
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // Configuraciones del componente User
        'user' => [
            'class' => 'webvimark\modules\UserManagement\components\UserConfig',

            // Comente esto si usted no quiere registrar el inicio de sesion de los usuarios
            'on afterLogin' => function($event) {
                    \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
                }
        ],
        // 'user' => [
        //     'identityClass' => 'app\models\User',
        //     'enableAutoLogin' => true,
        // ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // Configuraciones del componente Mailer
        'mailer' => require(__DIR__ . '/mailer.php'),
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        // Configuraciones sobre conexiones de Base de datos
        'db' => require(__DIR__ . '/db.php'),
        // Configuraciones del componente URL Manager
        'urlManager' => [
            // here is your Index URL manager config
            'class' => 'yii\web\UrlManager',
            // 'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        // Configuraciones del componente Formatter
        'formatter' => [
            // Zona horaria para el componente Formatter http://yii2.randomgemz.com/timezone-for-formatter/
            'timeZone' => 'America/Caracas',
            // Formato numerico
            'thousandSeparator' => '.',
            'decimalSeparator' => ',',
            // 'dateFormat' => 'php:Y-d-m',
            // 'datetimeFormat' => 'php:Y-d-m H:i:s',
            // 'timeFormat' => 'php:H:i:s',
        ],
    ],
    // Configuraciones de los Modulos 
    'modules' => require(__DIR__ . '/modules.php'),
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
