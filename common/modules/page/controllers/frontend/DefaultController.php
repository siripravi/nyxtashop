<?php
/**
 * Project: yii2-blog for internal using
 * Author: common\modules
 * Copyright (c) 2018.
 */

namespace common\modules\page\controllers\frontend;

use common\modules\page\models\PageCategory;
use common\modules\page\models\PageComment;
use common\modules\page\models\PageCommentSearch;
use common\modules\page\models\Page;
use common\modules\page\models\PageSearch;
use common\modules\page\Module;
use common\modules\page\traits\IActiveStatus;
use common\modules\page\traits\ModuleTrait;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    use ModuleTrait;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'lesha724\MathCaptcha\MathCaptchaAction',
				'imageLibrary' => 'gd'
            ],
        ];
    }

    public function actionIndex()
    {
               
        $searchModel = new PageSearch();
        $searchModel->scenario = PageSearch::SCENARIO_USER;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $categories = PageCategory::find()->where(['status' => IActiveStatus::STATUS_ACTIVE, 'is_nav' => PageCategory::IS_NAV_YES])
            ->orderBy(['sort_order' => SORT_ASC])->all();

        $cat_items = ArrayHelper::toArray($categories, [
            '\common\modules\page\models\PageCategory' => [
                'label' => 'title',
                'url' => function ($cat) {
                    return ['default/index', 'category_id' => $cat->id, 'slug' => $cat->slug];
                },
            ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cat_items' => $cat_items
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $post = Page::find()->where(['status' => IActiveStatus::STATUS_ACTIVE, 'id' => $id])->one();
        if ($post === null) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $post->updateCounters(['click' => 1]);

        $searchModel = new PageCommentSearch();
        $searchModel->scenario = PageComment::SCENARIO_USER;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);


        $comment = new PageComment();
        $comment->scenario = PageComment::SCENARIO_USER;

        if ($comment->load(Yii::$app->request->post()) && $post->addComment($comment)) {
            Yii::$app->session->setFlash('success', Yii::t('Page', 'A comment has been added and is awaiting validation'));
            return $this->redirect(['view', 'id' => $post->id, '#' => $comment->id]);
        }

        return $this->render('view', [
            'post' => $post,
            'dataProvider' => $dataProvider,
            'comment' => $comment,
        ]);
    }
}
