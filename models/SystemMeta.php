<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property string $key
 * @property string|null $value
 */
class SystemMeta extends ActiveRecord
{
    public const KEY_PAPERS_LIMIT = 'papers_limit';

    public static function tableName()
    {
        return 'system_meta';
    }

    public static function getMeta(string $key, ?string $default = null): self
    {
        $meta = self::findOne(['key' => $key]);

        if ($meta) {
            return $meta;
        }

        $meta = new self();
        $meta->key = $key;
        $meta->value = $default;

        return $meta;
    }
}