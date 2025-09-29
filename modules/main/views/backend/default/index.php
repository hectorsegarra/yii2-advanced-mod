<?php

use modules\main\Module;
use backend\widgets\box\SmallBox;
use backend\widgets\chart\chartjs\Chart;
use backend\widgets\chart\flot\Chart as FlotChart;
use backend\widgets\map\jvector\Map;
use backend\widgets\chart\sparkline\Chart as SparklineChart;
use yii\helpers\Url;

/* @var $this yii\web\View */
/** @var $usersCount int */

$this->title = Module::translate('module', 'Home');
$this->params['title']['small'] = Module::translate('module', 'Dashboard');
?>

<div class="main-backend-default-index">
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <?= SmallBox::widget([
                'status' => true,
                'style' => SmallBox::BG_AQUA,
                'icon' => 'ion-bag',
                'header' => 150,
                'content' => 'New Orders',
                'link' => [
                    'label' => Yii::t('app', 'More info'),
                    'url' => ['#'],
                ],
            ]) ?>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <?= SmallBox::widget([
                'status' => true,
                'style' => SmallBox::BG_GREEN,
                'icon' => 'ion-stats-bars',
                'header' => '53<sup style="font-size: 20px">%</sup>',
                'content' => 'Bounce Rate',
                'link' => [
                    'label' => Yii::t('app', 'More info'),
                    'url' => ['#'],
                ],
            ]) ?>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <?= SmallBox::widget([
                'status' => true,
                'style' => SmallBox::BG_YELLOW,
                'icon' => 'ion-person-add',
                'header' => $usersCount,
                'content' => Yii::t('app', 'User Registrations'),
                'link' => [
                    'label' => Yii::t('app', 'More info'),
                    'url' => ['/users/default/index'],
                ],
            ]) ?>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <?= SmallBox::widget([
                'status' => true,
                'style' => SmallBox::BG_RED,
                'icon' => 'ion-pie-graph',
                'header' => 65,
                'content' => 'Unique Visitors',
                'link' => [
                    'label' => Yii::t('app', 'More info'),
                    'url' => ['#'],
                ],
            ]) ?>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-7 connectedSortable">
            <div class="card shadow-sm h-100">
                <div class="card-header border-0 pb-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-line text-primary me-2"></i>
                            <?= Yii::t('app', 'Sales dynamics') ?>
                        </h5>
                        <span class="text-body-secondary small">
                            <?= Yii::t('app', 'Switch between the most requested chart types') ?>
                        </span>
                    </div>
                    <ul class="nav nav-tabs card-header-tabs mt-4" id="dashboard-chart-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="area-chart-tab" data-bs-toggle="tab" href="#area-chart" role="tab" aria-controls="area-chart" aria-selected="true">
                                <?= Yii::t('app', 'Area') ?>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="doughnut-chart-tab" data-bs-toggle="tab" href="#doughnut-chart" role="tab" aria-controls="doughnut-chart" aria-selected="false">
                                <?= Yii::t('app', 'Doughnut') ?>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pie-chart-tab" data-bs-toggle="tab" href="#pie-chart" role="tab" aria-controls="pie-chart" aria-selected="false">
                                <?= Yii::t('app', 'Pie') ?>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="line-chart-tab" data-bs-toggle="tab" href="#line-chart" role="tab" aria-controls="line-chart" aria-selected="false">
                                <?= Yii::t('app', 'Line') ?>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="bar-chart-tab" data-bs-toggle="tab" href="#bar-chart" role="tab" aria-controls="bar-chart" aria-selected="false">
                                <?= Yii::t('app', 'Bar') ?>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="radar-chart-tab" data-bs-toggle="tab" href="#radar-chart" role="tab" aria-controls="radar-chart" aria-selected="false">
                                <?= Yii::t('app', 'Radar') ?>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="bubble-chart-tab" data-bs-toggle="tab" href="#bubble-chart" role="tab" aria-controls="bubble-chart" aria-selected="false">
                                <?= Yii::t('app', 'Bubble') ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="dashboard-chart-tabs-content">
                        <div class="tab-pane fade show active" id="area-chart" role="tabpanel" aria-labelledby="area-chart-tab">
                            <?= Chart::widget([
                                'status' => true,
                                'type' => Chart::TYPE_LINE,
                                'clientOptions' => [
                                    'responsive' => true,
                                    'title' => [
                                        'display' => true,
                                        'text' => 'Chart.js Area Chart',
                                    ],
                                    'scales' => [
                                        'xAxes' => [
                                            [
                                                'display' => true,
                                                'scaleLabel' => [
                                                    'display' => true,
                                                    'labelString' => 'Month',
                                                ],
                                            ],
                                        ],
                                        'yAxes' => [
                                            [
                                                'display' => true,
                                                'scaleLabel' => [
                                                    'display' => true,
                                                    'labelString' => 'Value',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'clientData' => [
                                    'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                    'datasets' => [
                                        [
                                            'label' => 'Electronics',
                                            'hidden' => false,
                                            'backgroundColor' => 'rgba(160, 208, 224, 0.5)',
                                            'borderColor' => 'rgba(160, 208, 224, 0.7)',
                                            'data' => [65, 59, 80, 81, 56, 55, 40],
                                        ],
                                        [
                                            'label' => 'Digital Goods',
                                            'hidden' => false,
                                            'backgroundColor' => 'rgba(60, 141, 188, 0.5)',
                                            'borderColor' => 'rgba(60, 141, 188, 0.7)',
                                            'data' => [28, 48, 40, 19, 86, 27, 90],
                                        ],
                                    ],
                                ],
                            ]) ?>
                        </div>
                        <div class="tab-pane fade" id="doughnut-chart" role="tabpanel" aria-labelledby="doughnut-chart-tab">
                            <?= Chart::widget([
                                'status' => true,
                                'type' => Chart::TYPE_DOUGHNUT,
                                'clientOptions' => [
                                    'responsive' => true,
                                    'legend' => [
                                        'position' => 'top',
                                    ],
                                    'title' => [
                                        'display' => true,
                                        'text' => 'Chart.js Doughnut Chart',
                                    ],
                                    'animation' => [
                                        'animateScale' => true,
                                        'animateRotate' => true,
                                    ],
                                ],
                                'clientData' => [
                                    'labels' => ['Download Sales', 'In-Store Sales', 'Mail-Order Sales'],
                                    'datasets' => [
                                        [
                                            'label' => 'Electronics',
                                            'backgroundColor' => [
                                                '#3c8dbc',
                                                '#f56954',
                                                '#00a65a',
                                            ],
                                            'data' => [12, 30, 20],
                                        ],
                                        [
                                            'label' => 'Digital Goods',
                                            'backgroundColor' => [
                                                '#3c8dbc',
                                                '#f56954',
                                                '#00a65a',
                                            ],
                                            'data' => [20, 18, 50],
                                        ],
                                    ],
                                ],
                            ]) ?>
                        </div>
                        <div class="tab-pane fade" id="pie-chart" role="tabpanel" aria-labelledby="pie-chart-tab">
                            <?= Chart::widget([
                                'status' => true,
                                'type' => Chart::TYPE_PIE,
                                'clientOptions' => [
                                    'responsive' => true,
                                    'legend' => [
                                        'position' => 'top',
                                    ],
                                    'title' => [
                                        'display' => true,
                                        'text' => 'Chart.js Pie Chart',
                                    ],
                                ],
                                'clientData' => [
                                    'labels' => ['Download Sales', 'In-Store Sales', 'Mail-Order Sales'],
                                    'datasets' => [
                                        [
                                            'label' => 'Electronics',
                                            'backgroundColor' => [
                                                '#3c8dbc',
                                                '#f56954',
                                                '#00a65a',
                                            ],
                                            'data' => [12, 30, 20],
                                        ],
                                        [
                                            'label' => 'Digital Goods',
                                            'backgroundColor' => [
                                                '#3c8dbc',
                                                '#f56954',
                                                '#00a65a',
                                            ],
                                            'data' => [20, 18, 50],
                                        ],
                                    ],
                                ],
                            ]) ?>
                        </div>
                        <div class="tab-pane fade" id="line-chart" role="tabpanel" aria-labelledby="line-chart-tab">
                            <?= Chart::widget([
                                'status' => true,
                                'type' => Chart::TYPE_LINE,
                                'clientOptions' => [
                                    'responsive' => true,
                                    'title' => [
                                        'display' => true,
                                        'text' => 'Chart.js Line Chart',
                                    ],
                                    'scales' => [
                                        'xAxes' => [
                                            [
                                                'display' => true,
                                                'scaleLabel' => [
                                                    'display' => true,
                                                    'labelString' => 'Month',
                                                ],
                                            ],
                                        ],
                                        'yAxes' => [
                                            [
                                                'display' => true,
                                                'scaleLabel' => [
                                                    'display' => true,
                                                    'labelString' => 'Value',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'clientData' => [
                                    'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                    'datasets' => [
                                        [
                                            'label' => 'Electronics',
                                            'hidden' => false,
                                            'fill' => false,
                                            'backgroundColor' => 'rgba(160, 208, 224, 0.5)',
                                            'borderColor' => 'rgba(160, 208, 224, 0.8)',
                                            'data' => [65, 59, 80, 81, 56, 55, 40],
                                        ],
                                        [
                                            'label' => 'Digital Goods',
                                            'hidden' => false,
                                            'fill' => false,
                                            'backgroundColor' => 'rgba(60, 141, 188, 0.9)',
                                            'borderColor' => 'rgba(60, 141, 188, 0.8)',
                                            'data' => [28, 48, 40, 19, 86, 27, 90],
                                        ],
                                    ],
                                ],
                            ]) ?>
                        </div>
                        <div class="tab-pane fade" id="bar-chart" role="tabpanel" aria-labelledby="bar-chart-tab">
                            <?= Chart::widget([
                                'status' => true,
                                'type' => Chart::TYPE_BAR,
                                'clientOptions' => [
                                    'responsive' => true,
                                    'title' => [
                                        'display' => true,
                                        'text' => 'Chart.js Bar Chart',
                                    ],
                                    'scales' => [
                                        'xAxes' => [
                                            [
                                                'display' => true,
                                                'scaleLabel' => [
                                                    'display' => true,
                                                    'labelString' => 'Month',
                                                ],
                                            ],
                                        ],
                                        'yAxes' => [
                                            [
                                                'display' => true,
                                                'scaleLabel' => [
                                                    'display' => true,
                                                    'labelString' => 'Value',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'clientData' => [
                                    'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                    'datasets' => [
                                        [
                                            'label' => 'Electronics',
                                            'backgroundColor' => 'rgba(160, 208, 224, 0.5)',
                                            'data' => [65, 59, 80, 81, 56, 55, 40],
                                        ],
                                        [
                                            'label' => 'Digital Goods',
                                            'backgroundColor' => 'rgba(60, 141, 188, 0.9)',
                                            'data' => [28, 48, 40, 19, 86, 27, 90],
                                        ],
                                    ],
                                ],
                            ]) ?>
                        </div>
                        <div class="tab-pane fade" id="radar-chart" role="tabpanel" aria-labelledby="radar-chart-tab">
                            <?= Chart::widget([
                                'status' => true,
                                'type' => Chart::TYPE_RADAR,
                                'clientOptions' => [
                                    'responsive' => true,
                                    'title' => [
                                        'display' => true,
                                        'text' => 'Chart.js Radar Chart',
                                    ],
                                ],
                                'clientData' => [
                                    'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                    'datasets' => [
                                        [
                                            'label' => 'Electronics',
                                            'backgroundColor' => 'rgba(160, 208, 224, 0.5)',
                                            'data' => [65, 59, 80, 81, 56, 55, 40],
                                        ],
                                        [
                                            'label' => 'Digital Goods',
                                            'backgroundColor' => 'rgba(60, 141, 188, 0.9)',
                                            'data' => [28, 48, 40, 19, 86, 27, 90],
                                        ],
                                    ],
                                ],
                            ]) ?>
                        </div>
                        <div class="tab-pane fade" id="bubble-chart" role="tabpanel" aria-labelledby="bubble-chart-tab">
                            <?= Chart::widget([
                                'status' => true,
                                'type' => Chart::TYPE_BUBBLE,
                                'clientOptions' => [
                                    'responsive' => true,
                                    'title' => [
                                        'display' => true,
                                        'text' => 'Chart.js Bubble Chart',
                                    ],
                                    'tooltips' => [
                                        'mode' => 'point',
                                    ],
                                ],
                                'clientData' => [
                                    'animation' => [
                                        'duration' => 10000,
                                    ],
                                    'datasets' => [
                                        [
                                            'label' => 'Electronics',
                                            'backgroundColor' => 'rgba(255, 0, 0, 0.5)',
                                            'borderColor' => 'rgba(255, 0, 0, 0.9)',
                                            'borderWidth' => 1,
                                            'data' => [
                                                ['x' => 30, 'y' => 40, 'r' => 20],
                                                ['x' => 18, 'y' => 12, 'r' => 10],
                                                ['x' => 60, 'y' => -35, 'r' => 5],
                                                ['x' => 48, 'y' => 40, 'r' => 10],
                                            ],
                                        ],
                                        [
                                            'label' => 'Digital Goods',
                                            'backgroundColor' => 'rgba(0, 255, 0, 0.5)',
                                            'borderColor' => 'rgba(0, 255, 0, 0.9)',
                                            'borderWidth' => 1,
                                            'data' => [
                                                ['x' => 10, 'y' => 25, 'r' => 17],
                                                ['x' => 25, 'y' => -10, 'r' => 25],
                                                ['x' => 40, 'y' => 55, 'r' => 30],
                                                ['x' => 35, 'y' => 20, 'r' => 16],
                                            ],
                                        ],
                                    ],
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5 connectedSortable">
            <div class="card shadow-sm h-100">
                <div class="card-header border-0 pb-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-wave-square text-primary me-2"></i>
                            <?= Yii::t('app', 'Realtime traffic') ?>
                        </h5>
                        <div class="card-toolbar">
                            <span class="text-uppercase small fw-semibold text-body-secondary">
                                <?= Yii::t('app', 'Realtime') ?>
                            </span>
                            <div class="btn-group btn-group-sm" id="realtime" role="group" aria-label="<?= Yii::t('app', 'Realtime toggle') ?>">
                                <button type="button" class="btn btn-outline-secondary" data-toggle="on">
                                    <?= Yii::t('app', 'On') ?>
                                </button>
                                <button type="button" class="btn btn-outline-secondary active" data-toggle="off">
                                    <?= Yii::t('app', 'Off') ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= FlotChart::widget([
                        'status' => true,
                        'containerOptions' => [
                            'style' => 'height:300px;',
                        ],
                        'realtime' => [
                            'on' => true,
                            'dataUrl' => Url::to(['/main/default/get-demo-data']),
                            'btnGroupId' => 'realtime',
                            'btnDefault' => FlotChart::REALTIME_OFF,
                            'updateInterval' => 1000,
                        ],
                        'clientData' => [
                            backend\components\Demo::getRandomData(),
                        ],
                        'clientOptions' => [
                            'grid' => [
                                'borderColor' => '#f3f3f3',
                                'borderWidth' => 1,
                                'tickColor' => '#f3f3f3',
                            ],
                            'series' => [
                                'shadowSize' => 0,
                                'color' => '#3c8dbc',
                            ],
                            'lines' => [
                                'fill' => false,
                                'color' => '#3c8dbc',
                            ],
                            'yaxis' => [
                                'min' => 0,
                                'max' => 100,
                                'show' => true,
                            ],
                            'xaxis' => [
                                'show' => true,
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5 connectedSortable">
            <div class="card shadow-sm h-100 border-0 overflow-hidden text-white" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 45%, #2563eb 70%, #22d3ee 100%);">
                <div class="card-header border-0 bg-transparent">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <h5 class="card-title mb-0 text-white">
                            <i class="fas fa-earth-americas me-2"></i>
                            <?= Yii::t('app', 'Visitors map') ?>
                        </h5>
                        <span class="text-white-50 small">
                            <?= Yii::t('app', 'Live audience overview') ?>
                        </span>
                    </div>
                </div>
                <div class="card-body bg-transparent">
                    <?= Map::widget([
                        'status' => true,
                        'containerOptions' => [
                            'style' => 'height: 250px; width:100%;',
                        ],
                        'maps' => [
                            'world_mill_en' => 'world-mill-en',
                            'world_mill' => 'world-mill',
                        ],
                        'clientOptions' => [
                            'map' => 'world_mill_en',
                            'backgroundColor' => 'transparent',
                            'regionStyle' => [
                                'initial' => [
                                    'fill' => 'rgba(255, 255, 255, 0.12)',
                                    'fill-opacity' => 1,
                                    'stroke' => 'none',
                                    'stroke-width' => 0,
                                    'stroke-opacity' => 1,
                                ],
                            ],
                            'series' => [
                                'regions' => [
                                    [
                                        'values' => backend\components\Demo::getVisitorsData(),
                                        'scale' => ['#a5f3fc', '#f8fafc'],
                                        'normalizeFunction' => 'polynomial',
                                    ],
                                ],
                            ],
                            'onRegionTipShow' => new yii\web\JsExpression("function (e, el, code) {
                                let regions = $(this).data().mapObject.params.series.regions,
                                    visitorsData = regions[0].values;
                                if (typeof visitorsData[code] !== 'undefined') {
                                    el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
                                }
                            }"),
                        ],
                    ]) ?>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <div class="row g-0 text-center text-white-75">
                        <div class="col-12 col-md-4 py-3 border-end border-white border-opacity-25">
                            <?= SparklineChart::widget([
                                'status' => true,
                                'clientData' => [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
                                'clientOptions' => [
                                    'type' => 'line',
                                    'lineColor' => '#ffffff',
                                    'fillColor' => 'rgba(255, 255, 255, 0.25)',
                                    'height' => '50',
                                    'width' => '80',
                                ],
                            ]) ?>
                            <div class="fw-semibold text-white mt-2">Visitors</div>
                        </div>
                        <div class="col-12 col-md-4 py-3 border-end border-white border-opacity-25">
                            <?= SparklineChart::widget([
                                'status' => true,
                                'clientData' => [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
                                'clientOptions' => [
                                    'type' => 'line',
                                    'lineColor' => '#ffffff',
                                    'fillColor' => 'rgba(255, 255, 255, 0.25)',
                                    'height' => '50',
                                    'width' => '80',
                                ],
                            ]) ?>
                            <div class="fw-semibold text-white mt-2">Online</div>
                        </div>
                        <div class="col-12 col-md-4 py-3">
                            <?= SparklineChart::widget([
                                'status' => true,
                                'clientData' => [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
                                'clientOptions' => [
                                    'type' => 'line',
                                    'lineColor' => '#ffffff',
                                    'fillColor' => 'rgba(255, 255, 255, 0.25)',
                                    'height' => '50',
                                    'width' => '80',
                                ],
                            ]) ?>
                            <div class="fw-semibold text-white mt-2">Exits</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
