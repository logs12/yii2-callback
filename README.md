# Callback Module for Yii2 Framework

## Installation

Install with composer:

```bash
composer require logs12/yii2-callback
```

or add

```bash
"logs12/yii2-callback": "*"
```
to the require section of your `composer.json` file.

for add widjet with simple form

```bash
<?php echo app\modules\callback\widgets\Callback::widget(['typeView' => 'simpleForm']);?>
```
for add widjet with popup

```bash
<button class="btn btn-success callback"
        entity="Заявка с кнопки обратного звонка в шапке">
    Заказать звонок
</button>
<?php echo app\modules\callback\widgets\Callback::widget(['typeView' => 'popupForm']);?>
```

