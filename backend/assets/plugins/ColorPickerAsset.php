<?php

namespace backend\assets\plugins;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use backend\assets\BootstrapAsset;

/**
 * Class ColorPickerAsset
 * @package backend\assets\plugins
 */
class ColorPickerAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/bootstrap-colorpicker';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $min = YII_ENV_DEV ? '' : '.min';
        $this->css = [
            'css/bootstrap-colorpicker' . $min . '.css'
        ];
        $this->js = [
            'js/bootstrap-colorpicker' . $min . '.js'
        ];
    }

    /**
     * @var array
     */
    public $depends = [
        JqueryAsset::class,
        BootstrapAsset::class
    ];
}
