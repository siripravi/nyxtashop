<?php

return [
    'components' => [
        'request' => [
            'cookieValidationKey' => 'hD68_keLaNUjpTfnO8rlw7Af6_LJeYxP',
        ],
        'assetManager' => [
            'linkAssets' => true,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => 'your siteKey',
            'secret' => 'your secret key',
        ],
    ],
];
