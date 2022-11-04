<?php

namespace common\modules\sortable\assets;

use yii\web\AssetBundle;

class SortableAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/sortable/assets';

    public $js = [
        'js/sortable.js',
    ];

    public $css = [
        'css/sortable.css',
    ];

    public $depends = [
        'common\modules\sortable\assets\RubaxaAsset',
    ];
}
