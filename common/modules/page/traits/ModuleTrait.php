<?php

namespace common\modules\page\traits;
use yii;
use common\modules\page\Module;

trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return \Yii::$app->getModule('page');
    }

}
