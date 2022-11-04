<?php

/** @var array $params */

$params = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/params.php'),[]
  
);
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'app',
	'name' => 'Nyxta.in',
	'language' => 'en',	
	'basePath' => dirname(__DIR__),
    //'defaultRoute' => 'site/index',
    'defaultRoute' => 'main/default/index',
	'aliases' => [      
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
		'@common' => '@app/common',
        '@admin'  => '@app/modules/admin'
    ],
   
	'modules'  =>  [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'modules' => [
                /*'import' => [
                    'class' => 'app\modules\admin\modules\import\Module',
                ],*/
                'page' => [
                    'class' => 'common\modules\page\Module',
                    'controllerNamespace' => 'common\modules\page\controllers\backend',
                    'userModel' => app\modules\user\models\User::class,
                ],
                'language' => [
                            'class' => 'common\modules\language\Module',
                        ],
                'block' => [
                            'class' => 'common\modules\block\Module',
                ],
                'products' => [
                            'class' => 'common\modules\products\Module',
                ],
                'modal' => [
                            'class' => 'common\modules\modal\Module',
                ],
               
                'sortable' => [
                            'class' => 'common\modules\sortable\Module',
                ],	
            
                'image' => [
                    'class' => 'common\modules\image\Module',
                ],
                'slider' => [
                    'class' => 'siripravi\slideradmin\Module',
                ],
                'cart' => [
                    'class' => 'common\modules\cart\Module',
                ],
                
            ],
        ],
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        
        'slider' => [
            'class' => 'siripravi\slideradmin\Module',
        ],
        'image' => [
            'class' => 'common\modules\image\Module',
        ],
        'cart' => [
            'class' => 'common\modules\cart\Module',
        ],
        'page' => [
            'class' => 'common\modules\page\Module',
            'controllerNamespace' => 'common\modules\page\controllers\frontend',
            'userModel' => app\modules\user\models\User::class,
        ],
    ],
    'components' => [
        'assetManager' => [
            'linkAssets' => false
        ],
       
        /*'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views',
                   // '@app/views' => '@vendor/ricar2ce/yii2-material-theme/view'
                   // '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],*/
       /*'zuser' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/default/login'],
        ],*/
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/default/login'],
        ],
		'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail',
			'transport' => [	
               'class' => 'Swift_SmtpTransport',			
              'host'  => 'smtp.gmail.com',
              'username' => 'provdigi@gmail.com',
            'password' => 'eewyhkpdieonvtfn',			  
			  'encryption' => 'tls',
			  'port' => 587,
			  'localDomain' => '[127.0.0.1]',
			],
        ],
        'mailer2' => [
            'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail',
			'transport' => [	
               'class' => 'Swift_SmtpTransport',			
              'host'  => 'smtp.gmail.com',
              'username' => 'provdigi@gmail.com',
            'password' => 'eewyhkpdieonvtfn',			  
			  'encryption' => 'tls',
			  'port' => 587,
			  'localDomain' => '[127.0.0.1]',
			],
        ],
        'errorHandler' => [
            'errorAction' => 'main/default/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
         
			'cookieValidationKey' =>'Gtwerwe34dvh90FArwre'
        ],
		'cache' => [
		         'class' => 'yii\caching\DummyCache'
		],
		 'db' => $db,
		'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
                'fs' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],                
                'cart' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/modules/cart/messages',
                ],
                
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',            
            'enablePrettyUrl' => true,
            'showScriptName' => false,
           // 'suffix' => '/',
            'rules' => ['' => 'main/default/index',    
                'image/<size:[0-9a-z\-]+>/<name>.<extension:[a-z]+>' => 'image/default/index',
                'file/<name>.<extension:[a-z]+>' => 'image/default/file',     
               // 'products/<slug:[0-9a-z\-]+>/page-<page:[0-9]+>' => 'category/view',
               // 'products/<slug:[0-9a-z\-]+>' => 'category/view',   

                 //EXPERIMENTAL 
                  /*'<module:admin>/<submodule:(slider)>/<controller>/<id:[0-9]+>' => '<module>/<submodule>/<controller>/index',
                '<module:admin>/<submodule:(import|default|page|slider)>' => '<module>/<submodule>/default/index',
                '<module:admin>/<submodule:(import|default)>/<controller>' => '<module>/<submodule>/<controller>/index',
                '<module:(articles|catalog)>/<slug:[\w_-]+>' => '<module>/default/index',
                '<module:(admin|articles|catalog)>' => '<module>/default/index',
                '<module:admin>/<controller>' => '<module>/<controller>/index',
               */
                //FRONTEND URLS
                
                
                '<controller:cart|podbor|info>' => '<controller>/index',
                'thankyou' => 'cart/index',
                '<action:(how|contacts|questions|reviews)>' => 'site/<action>',
                'image/<size:[0-9a-z\-]+>/<name>.<extension:[a-z]+>' => 'image/default/index',
                'file/<name>.<extension:[a-z]+>' => 'image/default/file',
                'catalog/page-<page:[0-9]+>' => 'category/index',
                'catalog' => 'category/index',
                'catalog/<slug:[0-9a-z\-]+>/page-<page:[0-9]+>' => 'category/pod',
                'catalog/<slug:[0-9a-z\-]+>' => 'category/pod',
                'products/<slug:[0-9a-z\-]+>/page-<page:[0-9]+>' => 'category/view',
                'products/<slug:[0-9a-z\-]+>' => 'category/view',
                'product/<slug:[0-9a-z\-]+>' => 'product/index',
                'info/<slug:[0-9a-z\-]+>' => 'info/view',
                'popcron' => 'cron/finance',
                'sitemap.xml' => 'sitemap/index',
                'sitemap_en.xml' => 'sitemap/en',
                'sitemap_hi.xml' => 'sitemap/hi',
                '<slug:[0-9a-z\-]+>.html' => 'site/page',
				
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

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;