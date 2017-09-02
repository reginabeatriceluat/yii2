<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "venue".
 *
 * @property string $id
 * @property string $venue
 * @property string $description
 * @property int $location_id
 *
 * @property LocationVenue[] $locationVenues
 * @property Location $location
 */
class Venue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['venue', 'location_id'], 'required'],
            [['location_id'], 'integer'],
            [['venue'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'venue' => 'Venue',
            'description' => 'Description',
            'location_id' => 'Location ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationVenues()
    {
        return $this->hasMany(LocationVenue::className(), ['venue_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }
}
