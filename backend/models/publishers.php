<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "publishers".
 *
 * @property int $publisher_id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property int $phone_number
 */
class publishers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publishers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'phone_number'], 'required'],
            [['address'], 'string'],
            [['phone_number'], 'integer'],
            [['name'], 'string', 'max' => 24],
            [['email'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publisher_id' => 'Publisher ID',
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
        ];
    }
}
