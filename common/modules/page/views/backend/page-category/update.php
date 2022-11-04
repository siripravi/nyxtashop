<?php
/**
 * Project: yii2-page for internal using
 * Author: common\modules
 * Copyright (c) 2018.
 */

use common\modules\page\Module;

/* @var $this yii\web\View */
/* @var $model common\modules\page\models\pageCategory */

$this->title = Yii::t('page', 'Update ') . Yii::t('page', 'page Category') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'page Categorys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('page', 'Update');
?>
<div class="page-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
