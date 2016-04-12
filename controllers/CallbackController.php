<?php
/**
 * CalbackController.php
 * @author: work
 */

namespace logs12\callback\controllers;

use yii;
use yii\web\Controller;
use logs12\callback\models\CallbackForm;

class CallbackController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetForm(){
        $model = new CallbackForm();

        return $this->renderAjax('form',[
            'model' => $model
        ]);
    }

    public function actionCallback()
    {
        $model = new CallbackForm();
        if ($model->load(\Yii::$app->request->post()) && $model->save())
        {
            $bodyMail = "
                <p>Имя : $model->name</p>
                <p>Телефон : $model->phone</p>
                <p>Почтовый ящик : $model->email</p>
            ";
            //var_dump(Yii::$app->params['adminEmail']);
            //$model->sendEmail(Yii::$app->params['adminEmail'],Yii::$app->params['adminEmail'],$bodyMail);
            $success=true;
            return json_encode($success);

        }
        else{
            return $this->renderAjax('form',[
                'model' => $model
            ]);
        }

    }


}
