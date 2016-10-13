<?php
return [
    // Modulo: gestión de usuarios
    'user-management' => [
        'class' => 'webvimark\modules\UserManagement\UserManagementModule',

        // Habilitar registro de usuarios
        // 'enableRegistration' => true,

        // Agregar una validación regexp para las contraseñas. El patrón por defecto no restringe el usuario y puede ingresar cualquier carácter.
        // El siguiente ejemplo le permite al usuario ingresar :
        // cualquier conjunto de caracteres
        // (?=\S{8,}): al menos de un tamaño de 8
        // (?=\S*[a-z]): conteniendo al menos un letra en minúscula
        // (?=\S*[A-Z]): y que al menos contenga una letra en mayúscula
        // (?=\S*[\d]): y que al menos contenga un numero
        // $: anclado a el final de la cadena

        //'passwordRegexp' => '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',

        // Aquí usted puede definir su handler para cambiar el layout para cualquier controlador o acción
        // Consejo: usted puede usar este evento en cualquier modulo
        'on beforeAction' => function(yii\base\ActionEvent $event) {
                if ( $event->action->uniqueId == 'user-management/auth/login' )
                {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
    ],
];
