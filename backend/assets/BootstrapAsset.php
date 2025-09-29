<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\bootstrap5\BootstrapAsset as YiiBootstrapAsset;
use yii\bootstrap5\BootstrapPluginAsset as YiiBootstrapPluginAsset;
use yii\web\YiiAsset;

/**
 * Class BootstrapAsset
 * @package backend\assets
 */
class BootstrapAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $depends = [
        YiiBootstrapAsset::class,
        YiiBootstrapPluginAsset::class,
        YiiAsset::class
    ];
}
