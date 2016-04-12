<?php

namespace logs12\callback;


class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\callback\controllers';

    public function init()
    {
        parent::init();

        $this->setLayoutPath('@frontend/views/layouts');

        // custom initialization code goes here
    }
}
