<?php

namespace common\modules\products\traits;

use common\modules\products\Module;

trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return \Yii::$app->getModule('products');
    }

}
