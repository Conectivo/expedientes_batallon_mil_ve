<?php

return [
    // requerido por la extension yiisoft/yii2-swiftmailer
    'class' => 'yii\swiftmailer\Mailer',
    'viewPath' => '@app/mail',
    // enviar todos los correos a un archivo por defecto para propositos de pruebas,
    // usted necesita habilitar eso Si 'useFileTransport' es habilitado, todos los 
    // email no seran enviando y los contenidos del email se hara una copia dentro
    // de la carpeta 'runtime/mail' en su proyecto yii2.
    // Usted tiene que definir 'useFileTransport' a false y configurar
    // la seccion 'transport' para el componente 'mailer' envie realmente emails.
    'useFileTransport' => true,
    // 'transport' => [
    //     'class' => 'Swift_SmtpTransport',
    //     'host' => 'smtp.gmail.com',
    //     'username' => 'CUENTA_GMAIL_AQUI@gmail.com',
    //     'password' => 'CONTRASENA_GMAIL_AQUI',
    //     'port' => '587',
    //     'encryption' => 'tls',
    // ]
];
