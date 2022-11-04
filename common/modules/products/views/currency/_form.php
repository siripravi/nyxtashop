<?php

use common\modules\language\models\Language;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\products\models\Currency */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="card">
<div class="card-header d-flex p-1">
<div class="card-title p-3">Tabs </div>
    <ul class="nav nav-pills  ml-auto p-2">
        <?php foreach (Language::suffixList() as $suffix => $name) : ?>
            <li class="nav-item"><a href="#lang<?= $suffix ?>" class="nav-link <?= empty($suffix) ? ' active': '' ?>" data-toggle="tab"><?= $name ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="card-body">
    <div class="tab-content">
        <?php foreach (Language::suffixList() as $suffix => $name) : ?>
            <div class="tab-pane fade<?php if (empty($suffix)) echo ' show active'; ?>" id="lang<?= $suffix ?>">
                <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'before' )->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'after' )->textInput(['maxlength' => true]) ?>
            </div>
        <?php endforeach; ?>

        <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'enabled')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
</div>
</div>
    <?php ActiveForm::end(); ?>

