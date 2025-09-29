<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\LoginAsset;
use common\widgets\Alert;
use yii\web\View;

/* @var $this View */
/* @var $content string */

LoginAsset::register($this);
$homeUrl = is_string(Yii::$app->homeUrl) ? Yii::$app->homeUrl : '/';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name . ' | ' . Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->head() ?>
</head>
<body class="login-page bg-body-tertiary" data-bs-theme="light">
<?php $this->beginBody() ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6">
            <?= Alert::widget([
                'options' => [
                    'class' => 'alert text-center'
                ]
            ]) ?>
            <div class="card">
                <div class="card-header text-center text-white py-5">
                    <a href="<?= $homeUrl ?>" class="d-inline-flex align-items-center justify-content-center text-decoration-none text-white mb-3">
                        <span class="brand-logo d-inline-flex align-items-center justify-content-center rounded-4 bg-white text-primary shadow-sm me-2">
                            <i class="fas fa-layers"></i>
                        </span>
                        <span class="fw-semibold text-uppercase tracking-wide">AdminLTE</span>
                    </a>
                    <div class="small text-white-50 text-uppercase">
                        <?= Html::encode(Yii::$app->name) ?>
                    </div>
                </div>
                <div class="card-body">
                    <?= $content ?>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= Url::to('/') ?>" class="text-decoration-none fw-semibold">
                        <?= Yii::t('app', 'Go to Frontend') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
