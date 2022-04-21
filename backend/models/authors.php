<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $authors_id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property int $phone_number
 */
class authors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
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
            'authors_id' => 'Authors ID',
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
        ];
    }
}
