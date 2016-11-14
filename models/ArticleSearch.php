<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * ArticleSearch represents the model behind the search form about `allowing\yunliwang\model\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cat_id'], 'integer'],
            [['title', 'seo_title', 'description'], 'safe'],
        ];
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
        $query = Article::find()->with('cat');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($this->cat_id) {
            $childCatIdList = Cat::find()
                ->select(['id'])
                ->where(['pid' => $this->cat_id])
                ->asArray()
                ->all();
            $childCatIdList = ArrayHelper::getColumn($childCatIdList, 'id');
            $query->andFilterWhere(['in', 'cat_id', $childCatIdList]);
            $query->orFilterWhere(['cat_id' => $this->cat_id]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
