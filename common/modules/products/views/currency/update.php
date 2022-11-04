<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\products\models\Currency */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Currency',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Currencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="card card-primary card-outline category-update">
<div class="card-header">
<p class="card-title pull-right">
Fill the information
</p>
</div>
<div class="card-body">   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>