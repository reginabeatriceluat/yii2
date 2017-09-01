<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Team;

/**
 * TeamSearch represents the model behind the search form of `common\models\Team`.
 */
class TeamSearch extends Team
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'event_type_id', 'team_status_id', 'rating'], 'integer'],
            [['team', 'champ_first_second', 'win_draw_loss', 'since', 'last_played'], 'safe'],
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
        $query = Team::find();

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
            'event_type_id' => $this->event_type_id,
            'team_status_id' => $this->team_status_id,
            'rating' => $this->rating,
            'since' => $this->since,
            'last_played' => $this->last_played,
        ]);

        $query->andFilterWhere(['like', 'team', $this->team])
            ->andFilterWhere(['like', 'champ_first_second', $this->champ_first_second])
            ->andFilterWhere(['like', 'win_draw_loss', $this->win_draw_loss]);

        return $dataProvider;
    }
}
