<?php
/**
 * Callback.php
 * @author: work
 */

namespace logs12\callback\widgets;

use yii\bootstrap\Widget;
use logs12\callback\models\CallbackForm;

class Callback extends Widget
{

    public $typeView;

    public function init(){}

    public function run(){

        $model = new CallbackForm();

        if ($this->typeView == 'popupForm')
            return $this->render('popupForm',
                ['model'=>$model]
            );
        elseif ($this->typeView == 'simpleForm')
            return $this->render('simpleForm',
                ['model'=>$model]
            );
    }
}