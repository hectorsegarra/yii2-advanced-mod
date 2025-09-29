<?php

namespace backend\widgets\chart\flot\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Flot assets desde bower-asset/flot (compatible con AdminLTE v4 / BS5)
 */
class FlotAsset extends AssetBundle
{
    /** Ruta al paquete flot instalado por asset-packagist */
    public $sourcePath = '@bower/flot';

    /** Archivos JS de Flot que usas (sin .min: el paquete ya viene sin minificar) */
    public $js = [
        'jquery.flot.js',
        'jquery.flot.pie.js',
        'jquery.flot.categories.js',
        'jquery.flot.resize.js',
        // añade los que necesites:
        // 'jquery.flot.time.js',
        // 'jquery.colorhelpers.js',
        // 'jquery.flot.stack.js',
        // 'jquery.flot.crosshair.js',
        // 'jquery.flot.selection.js',
    ];

    public $depends = [
        JqueryAsset::class,
    ];
}
