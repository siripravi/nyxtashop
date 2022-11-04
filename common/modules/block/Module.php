<?php

namespace common\modules\admin\admin\block;

use Yii;

/**
 * Class Module
 *
 * @package common\modules\admin\admin\block
 */
class Module extends \yii\base\Module
{
    /**
     * @var string the namespace that controller classes are in
     */
    public $controllerNamespace = 'common\modules\block\controllers';

    public function init()
    {
        parent::init();

        Yii::$app->i18n->translations['block'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@common\modules\block/messages',
        ];
    }
}