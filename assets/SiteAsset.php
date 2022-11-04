<?php

namespace app\assets;

use yii\web\AssetBundle;

class SiteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets';
    public $css = [      
	    '//unicons.iconscout.com/release/v4.0.0/css/line.css',         
		'build/app.css',
        'all.min.css',
        // 'style.css'
		
    ];
    public $js = [
	    '//code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js',	  
        '//unpkg.com/popper.js@1.12.6/dist/umd/popper.js',
	    'build/app.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
		'yii\bootstrap4\BootstrapAsset'
    ];
}
