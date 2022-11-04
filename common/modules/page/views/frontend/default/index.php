<?php
/**
 * Project: yii2-blog for internal using
 * Author: common\modules
 * Copyright (c) 2018.
 */

use common\modules\blog\Module;
use yii\widgets\ListView;

\app\assets\SiteAsset::register($this);

$this->title = Yii::t('page', 'Blog');
Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => Yii::$app->name . ' ' . Yii::t('page', 'Blog')
]);
Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => Yii::$app->name . ', ' . Yii::t('page', 'Blog')
]);

if (Yii::$app->get('opengraph', false)) {
    Yii::$app->opengraph->set([
        'title' => $this->title,
        'description' => Yii::t('page', 'Blog'),
        //'image' => '',
    ]);
}
//$this->params['breadcrumbs'][] = '文章';

/*$this->breadcrumbs=[
    //$post->category->title => Yii::app()->createUrl('post/category', array('id'=>$post->category->id, 'slug'=>$post->category->slug)),
    '文章',
];*/

?>
<section class="hero blog-hero">
            <div class="container-fluid">
                <div class="row">
                    <h2>#ora-ks_blog</h2>
                    <p>Read all case about our products!</p>
                </div>
            </div>
</section>

    <div class="blog-index__header">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="title title--1"><?= Yii::t('page', 'Blog'); ?></h1>
                </div>
                <div class="col-md-5">
                    <div class="blog-index__search">
                        <?= \yii\widgets\Menu::widget([
                            'items' => $cat_items,
                            'options' => [
                                'class' => 'blog-index__cat'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    
    <section class="py-5">
        <div class="container px-5">
           
                <?php
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_brief',
                    'options' => [
                        'class' => 'row gx-5'
                    ],
					'pager'=>[
					 'linkOptions' => ['class'=>'pagination justify-content-center']],
					'itemOptions' => [
                'class' => 'col-lg-4 mb-5'
            ],
                    'layout' => '{items}{pager}{summary}'
                ]);
                ?>
             
        </div>
    </section>



