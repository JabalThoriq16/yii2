<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string $isbn
 * @property int $year
 * @property int $author_id
 * @property int $publisher_id
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'isbn', 'year', 'author_id', 'publisher_id'], 'required'],
            [['year', 'author_id', 'publisher_id'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['isbn'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'title' => 'Title',
            'isbn' => 'Isbn',
            'year' => 'Year',
            'authors.name' => 'Author',
            'publishers.name' => 'Publisher',
        ];
    }
    public function getAuthors()
    {
        return $this->hasOne(Authors::class, ['id' => 'author_id']);
    }
    public function getPublishers()
    {
        return $this->hasOne(Publishers::class, ['id' => 'publisher_id']);
    }


}
