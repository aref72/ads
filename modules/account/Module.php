<?php

namespace app\modules\account;

use Yii;


class Module extends yii\base\Module
{
    public $controllerNamespace = 'app\modules\account\controllers';

    public $defaultRoute = 'user';

    public function init()
    {
        parent::init();

        // custom initialization code goes here

    }
}
