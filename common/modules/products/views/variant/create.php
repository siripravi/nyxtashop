<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\products\models\Variant */
/* @var $features common\modules\products\models\Feature */
/* @var $images common\modules\image\models\Image[] */

$this->title = Yii::t('app', 'Create Variant');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Variants'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'features' => $features,
        'images' => $images,
    ]) ?>

</div>
