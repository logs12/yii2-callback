<?php
$form = \yii\bootstrap\ActiveForm::begin([
    'options' => ['class' => 'callback-form'],
    'enableAjaxValidation' => false,
    'action' => 'callback\callback\callback'
    //'validationUrl' => \yii\helpers\Url::to(['/validate/index']),
]);

$fieldOptionsName = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "<span class='glyphicon glyphicon-user form-control-feedback'></span>{input}"
];

$fieldOptionsPhone = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "<span class='glyphicon glyphicon-phone form-control-feedback'></span>{input}"
];
$fieldOptionsEmail = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "<span class='glyphicon glyphicon-envelope form-control-feedback'></span>{input}"
];
?>


<?=$form->field($model,'name',$fieldOptionsName)
        ->label(false)
        ->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>
<?=$form->field($model,'phone',$fieldOptionsPhone)
        ->label(false)
        ->textInput(['placeholder' => $model->getAttributeLabel('phone')])?>
<?=$form->field($model,'email',$fieldOptionsEmail)->input('email')
        ->label(false)
        ->textInput(['placeholder' => $model->getAttributeLabel('email')])?>
<?=$form->field($model,'entity')->hiddenInput()->label(false) ?>

<?=\yii\helpers\Html::submitButton('Отправить',
    [
        'id' => 'loading-callback-btn',
        'class' => 'btn btn-success btn-block',
        'data-loading-text' => 'Отправка..'
    ])
?>

<? \yii\bootstrap\ActiveForm::end(); ?>
