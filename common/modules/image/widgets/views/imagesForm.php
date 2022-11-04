<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 25.03.17
 * Time: 20:44
 *
 * @var $images dench\image\models\Image[]
 * @var string $size
 * @var string $modelInputName
 * @var string $fileInputName
 * @var string $label
 * @var integer $image_id
 * @var string $col
 * @var array $imageEnabled
 */

use common\modules\image\widgets\assets\ImageUploadAsset;
use common\modules\image\widgets\ImagesItem;
use kartik\widgets\FileInput;
use yii\helpers\Url;
ImageUploadAsset::register($this);


?>

<div class="form-group field-page-image">
    <?php if ($label) : ?>
        <label class="control-label" for="page-text"><?= $label ?></label>
    <?php endif; ?>
    <?php
    $initialPreview = [];
    $initialPreviewConfig = [];
    foreach ($images as $key => $image) {
        $initialPreview[] = ImagesItem::widget([
            'image' => $image,
            'modelInputName' => $modelInputName,
            'size' => $size,
            'key' => $image->id,
            'cover' => ($image_id == $image->id) ? 1 : 0,
            'enabled' => @$imageEnabled[$image->id],
        ]);
        $initialPreviewConfig[] = [
            'url' => Url::to(['/image/ajax/image-hide']),
            'key' => $image->file_id,
        ];
    }
    echo FileInput::widget([
        'id' => $fileInputName,
        'name' => $fileInputName . '[]',
        'options' => [
            'multiple' => true,
            'accept' => 'image/jpeg'
        ],
        'language' => Yii::$app->language,
        'pluginOptions' => [
            'initialPreview' => $initialPreview,
            'initialPreviewConfig' => $initialPreviewConfig,
            'overwriteInitial' => false,
            'fileActionSettings' => [
                'showZoom' => false,
                'dragClass' => 'btn btn-xs btn-default',
                'dragSettings' => [
                    'sort' => true,
                    'draggable' => '.file-sortable',
                    'handle' => '.file-move',
                ],
            ],
            'previewFileType' => 'image',
            'uploadUrl' => Url::to(['/image/ajax/images-upload']),
            'uploadExtraData' => [
                'modelInputName' => $modelInputName,
                'fileInputName' => $fileInputName,
                'size' => $size,
            ],
            'uploadAsync' => false,
            'showUpload' => false,
            'showRemove' => false,
            'showBrowse' => true,
            'showCaption' => false,
            'showClose' => false,
            'showPreview' => true,
            'dropZoneEnabled' => false,
            'removeIcon' => '<i class="fas fa-trash"></i> ',
            'layoutTemplates' => [
                'modalMain' => '',
                'modal' => '',
                'footer' => '<div class="card-actions">{actions}</div>',
                'actions' => '{delete}&nbsp;&nbsp;&nbsp;',
                'progress' => '',
            ],
            'previewTemplates' => [
                'generic' => '
<div class="file-preview-frame kv-preview-thumb drag-handle-init file-sortable ' . $col . '" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">
<div class="kv-file-content">
    {content}
</div>
{footer}
</div>',
                'image' => '
<div class="' . $col . '">
<div class="file-preview-frame kv-preview-thumb" id="{previewId}" data-fileindex="{fileindex}" data-template="{template}">
<div class="kv-file-content">
    <img src="{data}" class="kv-preview-data file-preview-image" title="{caption}" alt="{caption}" width="100%">
</div>
{footer}
</div>
</div>',
            ],
        ],
        'pluginEvents' => [
            'filebatchselected' => 'function(event, files) { $("#' . $fileInputName . '").fileinput("upload"); }',
        ],
    ]);
    ?>
</div>
