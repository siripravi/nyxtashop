<?php
/* @var $model app\admin\models\UploadForm */
/* @var $success bool */

use app\components\ActiveForm;
use yii\bootstrap5\Alert;
use yii\helpers\Url;

$exportUrl = Url::to(['export']);
?>

<h2>Download price list</h2>

<a href="<?= $exportUrl ?>" class="btn btn-primary" onclick="$(this).hide();">Download price list</a>

<h2>Upload Prices</h2>
<?php if ($success): ?>
    <?= Alert::widget([
        'body' => Yii::t('app', 'Prices have been successfully updated!'),
        'options' => [
            'class' => 'alert-success',
        ],
        'closeButton' => false,
    ]) ?>
<?php else: ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput()->label(false) ?>

    <button type="submit" class="btn btn-primary" onclick="$(this).parent().hide();">Upload Prices</button>

    <?php ActiveForm::end() ?>
<?php endif; ?>
