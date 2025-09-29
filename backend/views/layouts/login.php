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
<body class="login-page bg-body-tertiary">
<?php $this->beginBody() ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6">
            <?= Alert::widget([
                'options' => [
                    'class' => 'alert text-center'
                ]
            ]) ?>
            <div class="card shadow-sm border-0">
                <div class="card-header text-center bg-primary text-white py-4">
                    <a href="<?= $homeUrl ?>" class="d-block text-decoration-none text-white mb-2 fw-semibold">
                        <span>AdminLTE</span>
                    </a>
                    <div class="small text-white-50">
                        <?= Html::encode(Yii::$app->name) ?>
                    </div>
                </div>
                <div class="card-body p-4">
                    <?= $content ?>
                </div>
                <div class="card-footer text-center bg-body-tertiary">
                    <a href="<?= Url::to('/') ?>" class="text-decoration-none">
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
