<?php

namespace logs12\callback;

use yii\web\AssetBundle;

class CallbackAssets extends AssetBundle
{
    public $sourcePath = '@logs12/callback/assets';
    public $css = [
        'css/callbackPopup.css'
    ];

    public $js = [
        'js/callbackPopup.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}