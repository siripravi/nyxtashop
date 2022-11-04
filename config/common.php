<?php

use yii\mutex\MysqlMutex;
use yii\queue\db\Queue;

$params = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'version' => '0.1',
    'name' => 'Site',
    'basePath' => dirname(__DIR__),
    'language' => 'hi',
    'sourceLanguage' => 'en',
    'bootstrap' => ['log'],
    'aliases' => [
        '@admin' => '@app/admin',
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
		'@common' => '@app/common',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\admin\Module',
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'modules' => [
                'page' => [
                    'class' => '@common\modules\page\Module',
                ],
				 'language' => [
                    'class' => '@common\modules\language\Module',
                ],
                'block' => [
                    'class' => '@common\modules\block\Module',
                ],
                'products' => [
                    'class' => '@common\modules\products\Module',
                ],
				'modal' => [
                    'class' => '@common\modules\modal\Module',
                ],
				'modal' => [
                    'class' => '@common\modules\modal\Module',
                ],
                'cart' => [
                    'class' => '@common\modules\cart\Module',
                ],
				 'sortable' => [
                    'class' => '@common\modules\sortable\Module',
                ],
            ],
        ],
        'image' => [
            'class' => '@common\modules\image\Module',
        ],
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'mailer2' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
                'fs' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
                'page' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en',
                    'basePath' => '@common/modules/page/messages',
                ],
                'cart' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/modules/cart/messages',
                ],
            ],
        ],
        'queue' => [
            'class' => Queue::class,
            'db' => 'db',
            'tableName' => '{{%queue}}',
            'channel' => 'default',
            'mutex' => MysqlMutex::class,
        ],
    ],
    'params' => $params,
];