<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        // Role Based Access Control (RBAC)
        // 'authManager' => [
        //     'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        //     // 'defaultRoles' => ['guest'],
        // ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => require(__DIR__ . '/i18n.php'),
    ],
];