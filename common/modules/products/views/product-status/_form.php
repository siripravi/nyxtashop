<?php

use common\modules\language\models\Language;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\products\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-6">

    <?php $form = ActiveForm::begin(); ?>
<div class="card card-warning ">
        <div class="card-header d-flex p-2">        
        <div class="card-actions ml-auto p-0 text-right">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-flat btn-outline btn-primary' : 'btn btn-flat btn-outline btn-primary']) ?>
        </div>       
    </div>
    <div class="card-body">
        <?php foreach (Language::suffixList() as $suffix => $name) : ?>
            <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
        <?php endforeach; ?>

        <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'enabled')->checkbox() ?>

    </div>
</div>
    <?php ActiveForm::end(); ?>
 
        </div>
</div>