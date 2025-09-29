<?php

namespace backend\assets\plugins;

use yii\web\AssetBundle;
use backend\assets\BootstrapAsset;

/**
 * Class ICheckAsset
 * @package backend\assets\plugins
 */
class ICheckAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/icheck-bootstrap';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $min = YII_ENV_DEV ? '' : '.min';
        $this->css = [
            'icheck-bootstrap' . $min . '.css'
        ];
    }

    /**
     * @var array
     */
    public $depends = [
        BootstrapAsset::class
    ];
}
