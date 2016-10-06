<?php

return [
    'bundles' => [
        // Bundle de archivos jQuery
        'yii\web\JqueryAsset' => [
            'js' => [
                YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
            ]
        ],
        // Bundle de archivos del selector de fecha DatePicker
        'yii\jui\DatePickerLanguageAsset' => [
            'js' => [
                YII_ENV_DEV ? 'jquery-ui.js' : 'jquery-ui.min.js',
                YII_ENV_DEV ? 'ui/i18n/datepicker-es.js' : 'ui/minified/i18n/datepicker-es.min.js'
            ],
            // 'css' => [
            //     YII_ENV_DEV ? 'themes/vader/jquery-ui.css' : 'themes/vader/jquery-ui.min.css',
            //     YII_ENV_DEV ? 'themes/vader/theme.css' : 'themes/vader/theme.css'
            // ]
        ],
    ],
    // La dirección URL de cada asset publicado aparecerá con su ultima
    // fecha de modificación. Por ejemplo, la dirección URL al archivo javascript yii.js
    // quizás luzca como esta /assets/5515a87c/yii.js?v=1423448645" ,
    'appendTimestamp' => true,
];
