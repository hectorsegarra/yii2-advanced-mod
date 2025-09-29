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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name . ' | ' . Html::encode($this->title) ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= $homeUrl ?>"><b>Admin</b>LTE</a><br>
        <?= Html::encode(Yii::$app->name) ?>
    </div>
    <div class="card shadow-sm">
        <div class="card-body login-card-body">
            <?= Alert::widget([
                'options' => [
                    'class' => 'text-center mb-3'
                ],
                'closeButton' => false
            ]) ?>
            <?= $content ?>
        </div>
        <div class="card-footer text-center">
            <a href="<?= Url::to('/') ?>"><?= Yii::t('app', 'Go to Frontend') ?></a>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
