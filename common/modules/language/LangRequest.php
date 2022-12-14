<?php
namespace common\modules\language;

use common\modules\language\models\Language;
use Yii;
use yii\helpers\Url;
use yii\web\Request;

class LangRequest extends Request
{
    public function resolve()
    {
        $lang_id = @$this->get()['lang'];

        Language::setCurrent($lang_id);

        Yii::$app->homeUrl = Url::to(['/']);

        return parent::resolve();
    }
}