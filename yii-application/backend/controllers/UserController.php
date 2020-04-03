<?php

namespace backend\controllers;

use backend\rest\BasicAuthCallback;
use yii\filters\auth\CompositeAuth;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                [
//                    'class' => HttpBasicAuth::className(),
//                    'auth' => [
//                          BasicAuthCallback::class,
//                          'callback'
//                    ],
//                ],
//                HttpBearerAuth::className(),
//            ],
//        ];
        return $behaviors;
    }
}
