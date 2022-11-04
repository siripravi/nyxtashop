<?php

return [
    'address_en' => 'Hyderabad, India',
    'address_hi' => 'है।अभी सभिसमज ढांचामात्रुभाषा ७०है करता। जाने ब्रौशर मुश्किल ',
    'map_link' => '',
     'icon-framework' => 'fa',
    //'fromEmail' => 'admin@nyxta.in',
    //'toEmail' => 'provdigi@gmail.com',
	'fromEmail' => 'purnachandra.valluri@gmail.com',
    'toEmail' => 'provdigi@gmail.com',
    'phone1' => '(+91)12345 12345',
	'phone1f' => '(+91)12345 12345',
    'phone2' => '(+91)12345 12345',
    'phone3' => '(+91)12345 12345',
    'googleMapsApiKey' => '',
    'order_secret' => 'siripravi',
    'currency_id' => 1,
    'bsVersion' => '5.x', 
    'liqpay' => [
        'public_key' => 'i#',
        'private_key' => '',
        'status_awaiting' => [2],
        'sandbox' => true,
    ],
	'page'=>[
		'imgFilePath' => '\\web\\image\\blog\\',
		'imgFileUrl' => '\\web\\image\\blog\\',
					'userModel' => app\models\User::class,
					'userPK' => 'id', //default primary key for {{%user}} table
					'userName' => 'username',  'urlManager' => 'urlManager',
					'pagePostPageCount' => 10,
					'pageCommentPageCount' => 20,
					'userModel' => app\models\User::class,
					'userPk' => 'id', 'userName' => 'username',
					'enableComments' => true
	],
    'file' => [
        'extensions' => 'png, jpg, jpeg, pdf, zip, rar, doc, docx, xls, xlsx',
        'maxSize' => 100*1024*1024,
        'maxFiles' => 50,
        'path' => dirname(__DIR__) . '/files',
    ],

    'image' => [
        'extensions' => 'png, jpg, jpeg',
        'path' => 'image',
        'jpeg_quality' => 85,
        'convert' => true,
        'watermark' => [
            'enabled' => true,
            'absolute' => false,
            'file' => '@webroot/images/watermark.png',
            'x' => 50,
            'y' => 70,
        ],
        'none' => '@webroot/images/photo-default.png',
        'size' => [
            'page' => [
                'width' => 600,
                'height' => 450,
                'method' => 'clip',
            ],
            'cover' => [
                'width' => 200,
                'height' => 200,
                'method' => 'crop',
                'watermark' => [
                    'enabled' => false,
                ],
            ],
            'fill' => [
                'width' => 400,
                'height' => 400,
                'method' => 'fill',
                'watermark' => [
                    'enabled' => false,
                ],
            ],
            'category' => [
                'width' => 340,
                'height' => 260,
                'method' => 'fill',
                'bg' => '#FFFFFF',
                'watermark' => [
                    'width' => 102,
                ],
                'none' => '@webroot/image/site/category-default.png',
            ],
            'big' => [
                'width' => 1000,
                'height' => 1000,
                'method' => 'fill',
                'bg' => '#FFFFFF',
            ],
            'normal' => [
                'width' => 450,
                'height' => 450,
                'method' => 'fill',
                'bg' => '#FFFFFF',
                'watermark' => [
                    'width' => 130,
                ],
            ],
            'rss' => [
                'width' => 450,
                'height' => 450,
                'method' => 'fill',
                'bg' => '#FFFFFF',
                'watermark' => false,
            ],
            'small' => [
                'width' => 240,
                'height' => 240,
                'method' => 'fill',
                'bg' => '#FFFFFF',
                'watermark' => [
                    'width' => 72,
                ],
            ],
            'micro' => [
                'width' => 135,
                'height' => 135,
                'method' => 'fill',
                'bg' => '#FFFFFF',
                'watermark' => [
                    'width' => 35,
                ],
            ],
        ],
    ],

    'podbor' => [
        'horizontalLabelClass' => 'col-sm-5',
        'horizontalInputClass' => 'col-sm-7',
    ],
];
