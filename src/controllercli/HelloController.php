<?php

namespace allowing\yunliwang\controllercli;

use yii\console\Controller;

class HelloController extends Controller
{
    public function actionIndex()
    {
        $this->stdout(__FILE__ . 'on line ' . __LINE__ . "\nHello, Console!");
    }
}
