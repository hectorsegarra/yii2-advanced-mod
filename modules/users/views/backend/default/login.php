<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use modules\users\models\LoginForm;
use modules\users\Module;

/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap5\ActiveForm
 * @var $model LoginForm
 */

$this->title = Module::translate('module', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="text-center mb-4">
    <p class="text-body-secondary mb-0">
        <?= Module::translate('module', 'Login to the site to start the session') ?>
    </p>
</div>

<?php $form = ActiveForm::begin([
    'id' => 'login-form'
]); ?>

<?= $form->field($model, 'email', [
    'options' => ['class' => 'mb-3'],
])->textInput([
    'placeholder' => Module::translate('module', 'Email'),
    'class' => 'form-control form-control-lg'
])->label(false) ?>

<?= $form->field($model, 'password', [
    'options' => ['class' => 'mb-3'],
])->passwordInput([
    'placeholder' => Module::translate('module', 'Password'),
    'class' => 'form-control form-control-lg'
])->label(false) ?>

<div class="row align-items-center mb-3">
    <div class="col-7">
        <?= $form->field($model, 'rememberMe', [
            'options' => ['class' => 'form-check mb-0'],
            'template' => "{input}\n{label}\n{error}",
        ])->checkbox(['class' => 'form-check-input'], false)->label(Module::translate('module', 'Remember Me'), ['class' => 'form-check-label']) ?>
    </div>
    <div class="col-5 text-end">
        <?= Html::submitButton(Module::translate('module', 'Sign In'), [
            'class' => 'btn btn-primary w-100',
            'name' => 'login-button'
        ]) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
