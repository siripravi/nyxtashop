<?php

use common\modules\products\models\Currency;
use common\modules\sortable\grid\SortableColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\modules\products\models\Category;
use common\modules\products\models\Brand;
use common\modules\products\models\Status;
use yii\bootstrap5\Toast;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\products\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;

if (!Yii::$app->request->get('all') && $dataProvider->totalCount > $dataProvider->count) {
    $showAll = Html::a(Yii::t('app', 'Show all'), Url::current(['all' => 1]));
} else {
    $showAll = '';
}

$currencyDef = Currency::findOne(Yii::$app->params['currency_id']);
?>
<!--?php
 Toast::begin([
     'title' => 'Hello world!',
     'dateTime' => 'now'
 ]);

 echo 'Say hello...';

 Toast::end();
?-->

<div class="card card-secondary product-update">
 <div class="card-header">
        <h3>  </h3>
        <div class="card-tools">
        <?= Html::a(Yii::t('app', 'Create {0}', Yii::t('app', 'Product')), ['create'], ['class' => 'btn btn-warning btn-flat']) ?>
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
                    return Html::a($model->name, ['variant/index', 'VariantSearch[product_id]' => $model->id]);
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
            [
                'attribute' => 'brand_id',
                'value' => 'brand.name',
                'filter' => Brand::getList(null),
            ],
            [
                'attribute' => 'price',
                'value' => function($model){
                    if($model->currency)
                    return $model->currency->before . $model->price . $model->currency->after;
                },
            ],
            [
                'attribute' => 'priceDef',
                'label' => Yii::t('app', 'Price') . ', ' . $currencyDef->before . $currencyDef->after,
            ],
            [
                'attribute' => 'status_id',
                'value' => function ($model, $key, $index, $column) {
                    $result = [];
                    foreach ($model->statuses as $status) {
                        $result[] = $status->name;
                    }
                    return implode(', ', $result);
                },
                'filter' => Status::getList(null),
                'label' => Yii::t('app', 'Status'),
            ],
            [
                'attribute' => 'enabled',
                'filter' => [
                    Yii::t('app', 'Disabled'),
                    Yii::t('app', 'Enabled'),
                ],
                'content' => function($model, $key, $index, $column){
                    if ($model->enabled) {
                        $class = 'fas fa-check';
                    } else {
                        $class = '';
                    }
                    return Html::tag('i', '', ['class' => $class]);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {copy} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="fas fa-eye-open"></span>', ['/product/index', 'slug' => $model->slug], [
                            'target' => '_blank',
                        ]);
                    },
                    'copy' => function ($url, $model, $key) {
                        return Html::a('<span class="fas fa-duplicate"></span>', ['/admin/products/default/create', 'id' => $model->id]);
                    },
                ],
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

