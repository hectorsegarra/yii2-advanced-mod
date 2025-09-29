<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use common\assets\FontAwesomeAsset;
use backend\assets\BootstrapAsset;

/**
 * Class LoginAdminLteAsset
 * @package backend\assets
 */
class LoginAdminLteAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->css = ['css/adminlte.css'];
    }

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        FontAwesomeAsset::class,
    ];
}
