<?php

namespace backend\widgets\control;

use yii\bootstrap5\Widget;
use backend\widgets\control\DemoAsset;

/**
 * Class ControlSidebar
 * @package backend\themes\AdminLTE\widgets
 */
class ControlSidebar extends Widget
{
    /**
     * @var bool
     */
    public $status = true;

    /**
     * @var bool
     */
    public $demo = false;

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->status === true) {
            $this->registerAssets();
            echo $this->render('controlSidebar');
        }
    }

    /**
     * @inheritdoc
     */
    public function registerAssets()
    {
        if ($this->demo === true) {
            $view = $this->getView();
            DemoAsset::register($view);
        }
    }
}
