<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 28.06.17
 * Time: 11:25
 *
 * @var $image dench\image\models\Image
 * @var $size string
 * @var $modelInputName string
 * @var $key integer
 * @var $cover boolean
 * @var $enabled boolean
 */

use common\modules\image\helpers\ImageHelper;
use yii\helpers\Html;

?>
<div class="row col-sm">
 <div class="col-sm">
 <div class="form-group">
    
<img src="<?= ImageHelper::thumb($image->id, $size) ?>" alt="" width="100%"><input type="hidden" name="<?= $modelInputName ?>[image_ids][<?= $key ?>]" value="<?= $image->id ?>">
</div>
</div>
 <div class="col-sm pull-right">
<div class="form-group">
    <?= Html::activeTextInput($image, '[' . $key . ']alt', ['class' => 'form-control input-sm', 'placeholder' => 'Alt']) ?>
    <span class="input-group-addon">
        <?= Html::radio($modelInputName . '[image_id]', ($cover) ? true : false, ['value' => $image->id]) ?>
        <!--?= Html::checkbox($modelInputName . '[imageEnabled][' . $key . ']', ($enabled) ? true : false, ['value' => $image->id]) ?-->
    </span>
</div>
 
<div class="form-group">
    <?= Html::activeTextInput($image, '[' . $key . ']name', ['class' => 'form-control input-sm']) ?>
    <span class="input-group-addon"><?= $image->file->extension ?></span>
</div>
</div>

</div>
