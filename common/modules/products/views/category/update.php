<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\products\models\Category */
/* @var $images common\modules\image\models\Image[] */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Category',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-update">
 
    <?= $this->render('_form', [
        'model' => $model,
        'images' => $images,
    ]) ?>

</div>
