<?php
use common\modules\language\models\Language;

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

use yii\bootstrap5\Tabs;
/* @var $this yii\web\View */
/* @var $model common\modules\products\models\Product */
/* @var $modelsVariant common\modules\products\models\Variant[] */
/* @var $variantImages common\modules\image\models\Image[] */
/* @var $form yii\widgets\ActiveForm */

$js = '';

foreach (Language::suffixList() as $suffix => $name) {

    $js .= "
var name" . $suffix . " = '';
$('#product-name" . $suffix . "').focus(function(){
    name" . $suffix . " = $(this).val();
}).blur(function(){
    var h1 = $('#product-h1" . $suffix . "');
    if (h1.val() == name" . $suffix . ") {
        h1.val($(this).val());
    }
    var title = $('#product-title" . $suffix . "');
    if (title.val() == name" . $suffix . ") {
        title.val($(this).val());
    }
});";

}

$var = "Variant";

$js .= "
$('.variantsWrapper').on('afterInsert', function(e, item) {
    reloadPjaxImages();
    reloadPjaxFeature();
});
$('.variantsWrapper').on('afterDelete', function(e, item) {
    reloadPjaxImages();
    reloadPjaxFeature();
});
$('.variantsWrapper').on('beforeDelete', function(e, item) {
    var key = item.firstElementChild.id.split('-')[1];
    $('.variants-images').find('input[name^=\"".$var."['+key+'][image_id]\"]').parents('.variant-images').remove();
    $('.variants-images').find('input[name^=\"".$var."\"]').each(function(){
        var name_old = $(this).attr('name');
        var k = parseInt(name_old.replace('".$var."[', '').split(']')[0]);
        if (k > key) {
            var name_new = name_old.replace('".$var."['+k+']', '".$var."['+(k-1)+']');
            $(this).attr('name', name_new);
        }
    });
});
function reloadPjaxImages() {
    $.pjax.reload({
        container: '#images-pjax', 
        timeout: 2000,
        url: '',
        type: 'POST',
        data: $('#product-form').serialize(),
        async: false,
    });
}
function reloadPjaxFeature() {
    $.pjax.reload({
        container: '#feature-pjax', 
        timeout: 2000,
        url: '',
        type: 'POST',
        data: $('#product-form').serialize(),
        async: false,
    });
}
$('#product-category_ids').change(function(){
    reloadPjaxFeature();
});
";

$this->registerJs($js);
?>

<div id="w33"></div>
<div id="w34"></div>
<div id="w35"></div>
<?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
        'validateOnChange' => true,
        'validateOnBlur' => false,
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'product-form',
        ]
    ]); ?>
    <?php  
        $lsList = Language::suffixList();
       // echo '<pre>';
        //print_r($lsList); die;
        foreach ( $lsList as $suffix => $name){
        $items[] = [
                'label' => $name,
                'content' => $this->render("_tab".$suffix,['model'=>$model,'suffix'=>$suffix,'form'=>$form]),
                'active' => empty($suffix)
            ];
        }
        $items[] = [
                'label' => 'Main',
                'content' => $this->render("_tab_main",['model'=>$model,'form'=>$form]),
                
            ];
        $items[] = [
                'label' => 'Variants',
                'content' => $this->render("_tab_variants",['model'=>$model,'form'=>$form,'lsList' =>$lsList,'modelsVariant' =>$modelsVariant]),
                //'headerOptions'=>['class'=>'col-4']
            ];
        $items[] = [
                'label' => 'Files',
                'content' => $this->render("_tab_files",['model'=>$model,'form'=>$form,'files'=>$files]),
                
            ];		
        $items[] = [
                'label' => 'Images',
                'content' => $this->render("_tab_v_images",['model'=>$model,'form'=>$form,'variantImages'=>$variantImages]),
                
            ];
        $items[] = [
                'label' => 'Features',
                'content' => $this->render("_tab_features",['model'=>$model,'form'=>$form]),
                
            ];
        $items[] = [
                'label' => 'Group',
                'content' => $this->render("_tab_comp",['model'=>$model,'form'=>$form]),
                
            ];
            $items[] = [
                'label' => 'Options',
                'content' => $this->render("_tab_options",['model'=>$model,'form'=>$form]),
                
            ];        
        ?> 
<div class="card card-outline card-success">
  <div class="card-header">
    <h2 class="card-title"><?= $model->isNewRecord ? "Add New Product": $model->title;?></h2>
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg btn-secondary' : 'btn btn-lg btn-secondary']) ?>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  <?php
            echo Tabs::widget([
               // 'navType' => 'nav-tabs card-header full-width-tabs',
                'navType' => 'nav-pills card-header full-width-tabs',
                'items' =>      $items,
                'tabContentOptions' =>['class'=>'card-body p-4'],
                'itemOptions' => ['class'=>'card-body'],
                'headerOptions' => ['class'=>'use-max-space']
                
            ]);  
        ?>   
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    Please fill the form and click save button.
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->
<?php ActiveForm::end(); ?>

