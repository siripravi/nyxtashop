<?php

use common\modules\sortable\grid\SortableColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\products\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;

if (!Yii::$app->request->get('all') && $dataProvider->totalCount > $dataProvider->count) {
    $showAll = Html::a(Yii::t('app', 'Show all'), Url::current(['all' => 1]));
} else {
    $showAll = '';
}
?>
<div class="card card-outline card-primary">
  <div class="card-header">
    <h3 class="card-title">All Categories</h3>
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <?= Html::a("<i class='fas fa-plus'></i>&nbsp;" .Yii::t('app', 'Add New Category'), ['create'], ['class' => 'btn btn-md btn-info',
                  'title' => 'click to add new review']) ?>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  <?= GridView::widget([
            'tableOptions' => ['class' => 'table table-hover text-nowrap'],
            'filterPosition' => 'header',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions' => function ($model, $key, $index, $grid) {
                return [
                    'data-position' => $model->position,
                ];
            },
            'layout' => "{summary}\n{$showAll}\n{items}\n{pager}",
            'options' => ['class' => 'table table-bordered'],
            'columns' => [
                [
                    'class' => SortableColumn::class,
                ],
                [
                    'attribute' => 'name',
                    'content' => function($model, $key, $index, $column){
                        return Html::a($model->name, ['/admin/products/default/index', 'ProductSearch[category_id]' => $model->id]);
                    },
                ],
                'slug',
                'created_at:date',
                'enabled',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}&nbsp;|&nbsp; {delete}',
                ],
            ],
            'options' => [
                'data' => [
                    'sortable' => 1,
                    'sortable-url' => Url::to(['sorting']),
                ]
            ],
        ]); ?>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    The footer of the card
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->
