<?php

namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap-material-design.min.css',
        'css/custom.css'
    ];
    public $js = [  
        'js/popper.min.js',
        'js/bootstrap-material-design.min.js',  
        'js/demo.js',  
       'js/admin.js',
       
    ];
    public $depends = [
        'yii\web\YiiAsset',
		//'yii\bootstrap5\BootstrapAsset'
    ];
}
