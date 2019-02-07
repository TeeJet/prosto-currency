<?php

namespace app\controllers;

use app\models\Currency;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class CurrencyController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['class'] = HttpBearerAuth::class;
        return $behaviors;
    }

    public $modelClass = Currency::class;
}