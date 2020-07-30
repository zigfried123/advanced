<?php

namespace common\modules\service\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property float|null $price
 * @property string|null $description
 * @property int|null $status
 * @property int|null $term
 * @property string|null $city
 */
class Service extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['status', 'term'], 'integer'],
            [['name', 'code'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['city'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'price' => 'Price',
            'description' => 'Description',
            'status' => 'Status',
            'term' => 'Term',
            'city' => 'City',
        ];
    }
}
