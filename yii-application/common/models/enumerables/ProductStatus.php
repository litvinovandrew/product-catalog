<?php

namespace common\models\enumerables;

use Yii;

/**
 * User type class, for field type in UserModel.
 */
class ProductStatus extends Enumerable
{
    const DRAFT = 0;
    const PUBLISHED = 1;
    const DELETED = 2;


    /**
     * @var array
     */
    protected static function data(): array
    {
        return [
            self::DRAFT => 'Draft',
            self::PUBLISHED => 'Published',
            self::DELETED => 'Deleted',
        ];
    }



    public static function listDataCompliance($exclude = [])
    {
        return parent::listData($exclude);
    }
}
