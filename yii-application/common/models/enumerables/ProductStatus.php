<?php

namespace common\models\enumerables;

use Role;
use Yii;
use yiicod\base\models\enumerables\base\Enumerable;

/**
 * User type class, for field type in UserModel.
 */
class BadgeUserRole extends Enumerable
{
    /**
     * @var Role PiggyBankGirl
     */
    const ROLE_MEMBER_AND_PREMIUM_MEMBER = 1;

    /**
     * @var Role member
     */
    const ROLE_PREMIUM_MEMBER = 2;

    /**
     * @var array
     */
    protected static function data(): array
    {
        return [
            self::ROLE_MEMBER_AND_PREMIUM_MEMBER => Yii::t('models_enumerables', 'members and premium members'),
            self::ROLE_PREMIUM_MEMBER => Yii::t('models_enumerables', 'premium members'),
        ];
    }

    /**
     * @var array
     */
    private static function dataCompliance()
    {
        return [
            self::ROLE_MEMBER_AND_PREMIUM_MEMBER => UserType::memberList(),
            self::ROLE_PREMIUM_MEMBER => UserType::premiumList(),
        ];
    }

    /**
     * @static
     *
     * @param $value
     *
     * @return mixed
     */
    public static function getCompliance($value)
    {
        $list = self::dataCompliance();

        return isset($list[$value]) ? $list[$value] : $value;
    }

    public static function listDataCompliance($exclude = [])
    {
        return parent::listData($exclude);
    }
}
