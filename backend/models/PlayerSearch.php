<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Player;

/**
 * PlayerSearch represents the model behind the search form of `common\models\Player`.
 */
class PlayerSearch extends Player
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'gender_id', 'team_id'], 'safe'],
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
        $query = Player::find();

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

        $query->joinWith('gender');
        $query->joinWith('team');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'gender_id' => $this->gender_id,
            // 'team_id' => $this->team_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['=', 'gender.gender', $this->gender_id])
              ->andFilterWhere(['like', 'team.team', $this->team_id]);

        return $dataProvider;
    }
}
