<?php
namespace backend\widgets\chart\sparkline\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Carga jQuery Sparkline desde bower-asset (compatible con AdminLTE v4 / BS5)
 */
class ChartAsset extends AssetBundle
{
    // Antes apuntaba a @vendor/almasaeed2010/adminlte/bower_components/...
    // Ahora al paquete instalado vía asset-packagist
    public $sourcePath = '@bower/jquery-sparkline';

    public $depends = [
        JqueryAsset::class,
    ];

    public function init()
    {
        parent::init();

        // Algunas distros lo traen en /dist, otras en la raíz. Intentamos detectar.
        // Nota: AssetBundle no puede "probar archivos" fácilmente, así que elegimos uno.
        // La mayoría de paquetes bower llevan el archivo en la raíz:
        //   jquery.sparkline.js  (y .min.js)
        // Si en tu vendor existe dist/, cambia la línea correspondiente.
        $min = YII_ENV_DEV ? '' : '.min';

        // Ruta por defecto (raíz del paquete)
        $this->js = [
            "jquery.sparkline{$min}.js",
        ];

        // Si tu paquete lo tiene bajo /dist, descomenta esta línea y comenta la anterior:
        // $this->js = ["dist/jquery.sparkline{$min}.js"];
    }
}
