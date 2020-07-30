<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "test_soft_delete".
 *
 * @property int $id
 * @property int|null $is_deleted
 */
class TestSoftDelete extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_soft_delete';
    }

    public function behaviors()
    {
        return [
            'soft_delete' => [
                'class' => SoftDeleteBehavior::className(),
                'param' => 'is_deleted',
                'table' => self::tableName()
            ]
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_deleted'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
