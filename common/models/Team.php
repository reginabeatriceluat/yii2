<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property string $id
 * @property string $team
 * @property int $event_type_id
 * @property int $team_status_id
 * @property string $champ_first_second
 * @property string $win_draw_loss
 * @property int $rating
 * @property string $since
 * @property string $last_played
 *
 * @property EventTeam[] $eventTeams
 * @property Player[] $players
 * @property EventType $eventType
 * @property TeamStatus $teamStatus
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team', 'event_type_id', 'team_status_id', 'champ_first_second', 'win_draw_loss', 'since'], 'required'],
            [['event_type_id', 'team_status_id', 'rating'], 'integer'],
            [['since', 'last_played'], 'safe'],
            [['team'], 'string', 'max' => 25],
            [['champ_first_second', 'win_draw_loss'], 'string', 'max' => 100],
            [['team'], 'unique'],
            [['event_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventType::className(), 'targetAttribute' => ['event_type_id' => 'id']],
            [['team_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeamStatus::className(), 'targetAttribute' => ['team_status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team' => 'Team',
            'event_type_id' => 'Event Type ID',
            'team_status_id' => 'Team Status ID',
            'champ_first_second' => 'Champ First Second',
            'win_draw_loss' => 'Win Draw Loss',
            'rating' => 'Rating',
            'since' => 'Since',
            'last_played' => 'Last Played',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTeams()
    {
        return $this->hasMany(EventTeam::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Player::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventType()
    {
        return $this->hasOne(EventType::className(), ['id' => 'event_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamStatus()
    {
        return $this->hasOne(TeamStatus::className(), ['id' => 'team_status_id']);
    }
}
