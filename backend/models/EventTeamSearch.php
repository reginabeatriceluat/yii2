<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EventTeam;

/**
 * EventTeamSearch represents the model behind the search form of `common\models\EventTeam`.
 */
class EventTeamSearch extends EventTeam
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'event_id', 'team_event_id', 'event_team_status_id', 'team_order', 'total_wins', 'total_draws', 'total_loss'], 'integer'],
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
        $query = EventTeam::find();

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
            'event_id' => $this->event_id,
            'team_event_id' => $this->team_event_id,
            'event_team_status_id' => $this->event_team_status_id,
            'team_order' => $this->team_order,
            'total_wins' => $this->total_wins,
            'total_draws' => $this->total_draws,
            'total_loss' => $this->total_loss,
        ]);

        return $dataProvider;
    }
}
