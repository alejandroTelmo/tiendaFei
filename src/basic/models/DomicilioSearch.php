<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Domicilio;

/**
 * DomicilioSearch represents the model behind the search form of `app\models\Domicilio`.
 */
class DomicilioSearch extends Domicilio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'numero'], 'integer'],
            [['calle', 'ciudad', 'provincia', 'codPostal'], 'safe'],
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
        $query = Domicilio::find();

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
            'id' => $this->id,
            'numero' => $this->numero,
        ]);

        $query->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad])
            ->andFilterWhere(['like', 'provincia', $this->provincia])
            ->andFilterWhere(['like', 'codPostal', $this->codPostal]);

        return $dataProvider;
    }
}
