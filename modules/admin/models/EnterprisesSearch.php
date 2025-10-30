<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Enterprises;

/**
 * EnterprisesSearch represents the model behind the search form of `app\modules\admin\models\Enterprises`.
 */
class EnterprisesSearch extends Enterprises
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enterprise_id', 'city_id'], 'integer'],
            [['enterprise_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Enterprises::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'enterprise_id' => $this->enterprise_id,
            'city_id' => $this->city_id,
        ]);

        $query->andFilterWhere(['like', 'enterprise_name', $this->enterprise_name]);

        return $dataProvider;
    }
}
