<?php

namespace backend\assets\plugins;

use Yii;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use backend\assets\BootstrapAsset;

/**
 * Class DatePickerAsset
 * @package backend\assets\plugins
 */
class DatePickerAsset extends AssetBundle
{
    /**
     * @var string
     */
    public static $language;

    /**
     * @var string
     */
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/bootstrap-datepicker';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $min = YII_ENV_DEV ? '' : '.min';
        $language = self::$language ?: substr(Yii::$app->language, 0, 2);
        $this->css = [
            'css/bootstrap-datepicker' . $min . '.css'
        ];
        $this->js = [
            'js/bootstrap-datepicker' . $min . '.js',
        ];
        $localeFile = 'locales/bootstrap-datepicker.' . $language . '.min.js';
        if (is_file(Yii::getAlias($this->sourcePath . '/' . $localeFile))) {
            $this->js[] = $localeFile;
        }
    }

    /**
     * @var array
     */
    public $depends = [
        JqueryAsset::class,
        BootstrapAsset::class
    ];
}
