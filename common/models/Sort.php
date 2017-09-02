<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sort".
 *
 * @property int $id
 * @property string $sort
 * @property string $description
 * @property int $order_id
 *
 * @property Event[] $events
 * @property Order $order
 */
class Sort extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sort';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort', 'order_id'], 'required'],
            [['order_id'], 'integer'],
            [['sort'], 'string', 'max' => 25],
            [['description'], 'string', 'max' => 250],
            [['sort'], 'unique'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sort' => 'Sort',
            'description' => 'Description',
            'order_id' => 'Order ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['sort_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
