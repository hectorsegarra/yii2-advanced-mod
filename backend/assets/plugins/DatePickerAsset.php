<?php

namespace backend\assets\plugins;

use Yii;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use backend\assets\BootstrapAsset;



class DatePickerAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap-datepicker';

    /** Idioma a cargar (p. ej. 'es', 'fr'...). Lo setéas desde la vista. */
    public static $language = null;

    public $css = [
        'dist/css/bootstrap-datepicker3.min.css',
    ];

    public $js = [
        'dist/js/bootstrap-datepicker.min.js',
        // el locale se añade dinámicamente en init()
    ];

    public $depends = [
        JqueryAsset::class,
        BootstrapAsset::class,
    ];

    public function init()
    {
        parent::init();
        if (!empty(static::$language)) {
            $this->js[] = "dist/locales/bootstrap-datepicker." . static::$language . ".min.js";
        }
    }
}
