<?php

use Yii;
use yii\helpers\Html;
use yii\mail\MessageInterface;
use yii\web\View;

/* @var $this View view component instance */
/* @var $message MessageInterface the message being composed */
/* @var $content string main view render result */

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title ?? Yii::$app->name) ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-rc.4/dist/css/adminlte.min.css" integrity="sha384-S5Q3sdZHR/gmxSsnYJltXLjHRzA3x4l62kg3U58OfZHLFxgGVsukl0mWipYeygVS" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Source Sans Pro', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .email-wrapper {
            max-width: 720px;
        }

        .email-card {
            border: none;
            border-radius: .75rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
        }

        .email-card .card-header {
            border-top-left-radius: .75rem;
            border-top-right-radius: .75rem;
        }

        .email-footer {
            font-size: .875rem;
        }
    </style>
    <?php $this->head() ?>
</head>
<body class="hold-transition bg-body-tertiary">
<?php $this->beginBody() ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 email-wrapper">
            <div class="card email-card">
                <div class="card-header bg-primary text-white">
                    <h1 class="h4 mb-0">
                        <?= Html::encode($this->title ?? Yii::$app->name) ?>
                    </h1>
                </div>
                <div class="card-body">
                    <?= $content ?>
                </div>
                <div class="card-footer text-center text-secondary email-footer">
                    &copy; <?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
