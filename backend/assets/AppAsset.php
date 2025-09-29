<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\jui\JuiAsset;
use common\assets\FontAwesomeAsset;

/**
 * Class AppAsset
 * @package backend\assets
 */
class AppAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';

    /**
     * @var string
     */
    public $baseUrl = '@web';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->css[] = 'css/site.css';
        $this->js[] = 'js/dashboard.js';
    }

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapFixAsset::class,
        JuiAsset::class,
        FontAwesomeAsset::class,
        AdminLteAsset::class
    ];
}
