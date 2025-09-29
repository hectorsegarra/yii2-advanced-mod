<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;
use modules\main\Module;
use modules\main\models\frontend\ContactForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap5\ActiveForm */
/* @var $model ContactForm */

$this->title = Module::translate('module', 'Contact');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main-frontend-default-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Module::translate('module', 'If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.') // phpcs:ignore ?>
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <?php if ($model->scenario === $model::SCENARIO_GUEST) : ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
            <?php endif; ?>
            <?= $form->field($model, 'subject') ?>
            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
            <?php if ($model->scenario === $model::SCENARIO_GUEST) : ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>', // phpcs:ignore
                    'captchaAction' => Url::to('/main/default/captcha'),
                    'imageOptions' => [
                        'style' => 'display:block; border:none; cursor: pointer',
                        'alt' => Module::translate('module', 'Code'),
                        'title' => Module::translate('module', 'Click on the picture to change the code.')
                    ],
                    'class' => 'form-control'
                ]) ?>
            <?php endif; ?>
            <div class="mb-3">
                <?= Html::submitButton('<span class="fas fa-paper-plane"></span> ' .
                    Module::translate('module', 'Submit'), [
                    'class' => 'btn btn-primary',
                    'name' => 'contact-button'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
