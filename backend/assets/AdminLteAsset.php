<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Class AdminLteAsset
 * @package backend\assets
 */
class AdminLteAsset extends AssetBundle
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
        $this->css = [
            'css/adminlte.css',
        ];
        $this->js = [
            'js/adminlte.js',
        ];
    }
}
