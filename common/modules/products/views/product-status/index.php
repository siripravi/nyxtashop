<?php

use common\modules\sortable\grid\SortableColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Statuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-6">
        <div class="card card-secondary product-update">
            <div class="card-header d-flex p-2">
            <div class="card-actions ml-auto p-0 text-right">
                    <?= Html::a(Yii::t('app', 'Create {0}', Yii::t('app', 'Status')), ['create'], ['class' => 'btn btn-flat btn-outline btn-info']) ?>
            </div>
            </div>
            <div class="card-body">   
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'rowOptions' => function ($model, $key, $index, $grid) {
                        return [
                            'data-position' => $model->position,
                        ];
                    },
                    'columns' => [
                        [
                            'class' => SortableColumn::class,
                        ],
                        'name',
                        'color',
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
    </div>
</div>