<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

namespace common\modules\page\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BlogCategorySearch represents the model behind the search form about `akiraz2\blog\models\BlogCategory`.
 */
class PageCategorySearch extends PageCategory
{
	
	public $parent_id = null;

    public $all;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'is_nav', 'sort_order', 'page_size', 'status'], 'integer'],
            [['title', 'slug', 'banner', 'template', 'redirect_url', 'create_time', 'update_time'], 'safe'],
        ];
    }
	
	
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PageCategory::find();
        //$query->joinWith('translation');
		
        $query->orderBy(['sort_order' => SORT_ASC, 'created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'is_nav' => $this->is_nav,
            'sort_order' => $this->sort_order,
            'page_size' => $this->page_size,
            'status' => $this->status,
           // 'create_time' => $this->create_time,
           // 'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'banner', $this->banner])
            ->andFilterWhere(['like', 'template', $this->template])
            ->andFilterWhere(['like', 'redirect_url', $this->redirect_url]);

        return $dataProvider;
    }
}
