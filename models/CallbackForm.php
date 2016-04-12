<?php
/**
 * Callback.php
 * @author: work
 */

namespace logs12\callback\models;

use Yii;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%callback}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $entity
 * @property integer $created_at
 * @property integer $updated_at
 */

class CallbackForm extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'callback';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'phone', 'email'], 'filter', 'filter' => 'trim'],
            [['name', 'email'], 'string', 'max' => 255],
            [['phone'], 'integer'],
            ['email', 'email'],
            ['entity', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя *',
            'phone' => 'Номер телефона *',
            'email' => 'Email',
            'entity' => 'Entity',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($emailTo,
                              $emailFrom,
                              $bodyMail,
                              $nameTo = 'Заявка на обратный звонок',
                              $nameFrom = 'Заявка на обратный звонок',
                              $subject = 'Заявка на обратный звонок'
    )
    {
        return Yii::$app->mail->compose()
            ->setFrom([$emailFrom => $nameTo])
            ->setTo([$emailTo => $nameFrom])
            ->setSubject($subject)
            ->setHtmlBody($bodyMail)
            ->send();
    }

}