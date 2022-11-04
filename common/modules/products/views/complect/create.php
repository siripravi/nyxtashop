<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\products\models\Complect */

$this->title = Yii::t('app', 'Create Complect');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Complects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
