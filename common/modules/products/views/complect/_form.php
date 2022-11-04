<?php

use common\modules\products\models\Product;
use common\modules\language\models\Language;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\products\models\Complect */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-8 feature-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="card card-secondary card-tabs">
            <div class="card-header ">
                <div class="card-title col-10">
                </div>
                <div class="card-actions ml-auto p-2 text-right">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-flat btn-outline btn-primary' : 'btn btn-flat btn-outline btn-primary']) ?>
                </div>    
            </div>

            <div class="card-body">
                <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                    <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
                <?php endforeach; ?>

                <?= $form->field($model, 'product_ids')->dropDownList(Product::getList(null), [
                    'multiple' => true,
                    'size' => 20,
                ]) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
