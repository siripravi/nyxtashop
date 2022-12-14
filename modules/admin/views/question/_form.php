<?php

use app\modules\admin\models\Question;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="card card-primary review-form">
    <div class="card-header">
        <div class="card-title ">                
        </div>
        <div class="card-tools">
            <?= Html::submitButton(($model->isNewRecord) ? "<i class='fas fa-save'></i> Create" : "<i class='fas fa-save'></i> Update", ['class' => 'btn btn-lg btn-flat btn-warning']) ?>
        </div>    
    </div>
    <div class="card-body">    
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'status')->dropDownList(Question::statusList()) ?>
            </div>
        </div>
       
            <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'answer')->widget(CKEditor::className(), [
                        'preset' => 'full',
                        'clientOptions' => [
                            'customConfig' => '/js/ckeditor.js',
                            'language' => Yii::$app->language,
                            'allowedContent' => true,
                        ]
                    ]) ?>                    
                    <!--?= $form->field($model, 'created_at')->textInput()->label('Создан (unixtime)') ?-->                           
       
    </div>
</div>           
<?php ActiveForm::end(); ?>


