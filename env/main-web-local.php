<?php

return [
    'components' => [
        'urlManager' => [
            'suffix' => '',
        ],
        'request' => [
            'cookieValidationKey' => '654ad6sg879^&*(()rgd8&%^3409',
        ],
    ],
    'modules' => [
        'gii' => [
            'class' => \yii\gii\Module::class,
        ],
        'debug' => [
            'class' => \yii\debug\Module::class,
        ],
    ],
    'bootstrap' => ['gii', 'debug'],
];
