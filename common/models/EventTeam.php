<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_team".
 *
 * @property string $id
 * @property string $event_id
 * @property string $team_id
 * @property int $event_team_status_id
 * @property int $team_order
 * @property int $total_wins
 * @property int $total_draws
 * @property int $total_loss
 *
 * @property Team $team
 * @property Event $event
 * @property EventTeamStatus $eventTeamStatus
 * @property EventTeamRound[] $eventTeamRounds
 */
class EventTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'team_id', 'event_team_status_id', 'team_order', 'total_wins', 'total_draws', 'total_loss'], 'required'],
            [['event_id', 'team_id', 'event_team_status_id', 'team_order', 'total_wins', 'total_draws', 'total_loss'], 'integer'],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_id' => 'id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['event_team_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventTeamStatus::className(), 'targetAttribute' => ['event_team_status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'team_id' => 'Team ID',
            'event_team_status_id' => 'Event Team Status ID',
            'team_order' => 'Team Order',
            'total_wins' => 'Total Wins',
            'total_draws' => 'Total Draws',
            'total_loss' => 'Total Loss',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeamStatus()
    {
        return $this->hasOne(EventTeamStatus::className(), ['id' => 'event_team_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeamRounds()
    {
        return $this->hasMany(EventTeamRound::className(), ['event_team_id' => 'id']);
    }
}
