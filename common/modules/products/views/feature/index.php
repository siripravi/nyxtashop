<?php

use common\modules\products\models\Feature;
use common\modules\products\models\Category;
use common\modules\sortable\grid\SortableColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\products\models\FeatureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Features');
$this->params['breadcrumbs'][] = $this->title;

if (!Yii::$app->request->get('all') && $dataProvider->totalCount > $dataProvider->count) {
    $showAll = Html::a(Yii::t('app', 'Show all'), Url::current(['all' => 1]));
} else {
    $showAll = '';
}
?>
<div class="card card-info feature-index">
        <div class="card-header">              
                <div class="card-actions">
                <?= Html::a("<i class='fas fa-plus'></i>&nbsp;" .Yii::t('app', 'Add Feature'), ['create'], ['class' => 'btn btn-block bg-gradient-secondary btn-sm',
                  'title' => 'click to add new feature']) ?>
                </div>
        </div>
        <div class="card-body table-responsive p-0">
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
        'columns' => [
            [
                'class' => SortableColumn::class,
            ],
            [
                'attribute' => 'name',
                'content' => function($model, $key, $index, $column){
                    return Html::a($model->name, ['value/index', 'ValueSearch[feature_id]' => $model->id]);
                },
            ],
            [
                'attribute' => 'category_id',
                'value' => function ($model, $key, $index, $column) {
                    $result = [];
                    foreach ($model->categories as $category) {
                        $result[] = $category->name;
                    }
                    return implode(', ', $result);
                },
                'filter' => Category::getList(null),
                'label' => Yii::t('app', 'Categories'),
            ],
            'after',
            'enabled',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
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
</div>
