<?php

namespace common\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * Class SoftDeleteBehavior
 * Friendly class must contains field with boolean type
 * @package common\models
 * @property ActiveRecord $owner
 * @property string $param
 * @property string $table
 */
class SoftDeleteBehavior extends Behavior
{
    const DELETED = 1;
    const NOT_DELETED = 0;

    public $param;
    public $table;

    /**
     * @param ActiveRecord $row
     * @return bool
     * @throws Exception
     */
    public function softDelete(): bool
    {

        if ($this->isDeleted()) {
            throw new Exception('Row deleted already');
        }

        $owner = $this->owner;

        $command = $owner::getDb()->createCommand();

        $command->update($this->table, [$this->param => self::DELETED], ['id' => $owner->id]);

        if (!$command->execute()) {
            throw new Exception('Row not deleted');
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->owner->{$this->param};
    }

    /**
     * @param ActiveRecord $row
     * @return bool
     * @throws Exception
     */
    public function restore(): bool
    {
        if (!$this->isDeleted()) {
            throw new Exception('Row restored already');
        }

        $owner = $this->owner;

        $command = $owner::getDb()->createCommand();

        $command->update($this->table, [$this->param => self::NOT_DELETED], ['id' => $owner->id]);

        if (!$command->execute()) {
            throw new Exception('Row not restored');
        }

        return true;
    }
}
