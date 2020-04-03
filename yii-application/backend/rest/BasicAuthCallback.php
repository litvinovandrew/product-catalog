<?php
namespace backend\rest;

use common\models\LoginForm;
use Yii;

class BasicAuthCallback
{
    public static function callback($username, $password)
    {
        $model = new LoginForm();
        if ($model->load(['LoginForm' => ['username' => $username,'password' => $password]], null)
        && $model->login()) {
            return Yii::$app->user;
        } else {
            return null;
        }
    }
}
