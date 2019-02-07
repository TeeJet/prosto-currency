<?php

namespace app\commands;

use app\services\CurrencyService;
use yii\console\Controller;

class CurrencyController extends Controller
{
    public function actionUpdate()
    {
        (new CurrencyService())->update();
        echo "Update completed" . PHP_EOL;
    }
}
