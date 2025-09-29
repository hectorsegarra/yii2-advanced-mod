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

<p class="login-box-msg"><?= Module::translate('module', 'Login to the site to start the session') ?></p>

<?php $form = ActiveForm::begin([
    'id' => 'login-form'
]); ?>

<?= $form->field($model, 'email')->textInput([
    'placeholder' => Module::translate('module', 'Email')
])->label(false) ?>

<?= $form->field($model, 'password')->passwordInput([
    'placeholder' => Module::translate('module', 'Password')
])->label(false) ?>

<div class="row align-items-center">
    <div class="col-8">
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </div>
    <div class="col-4">
        <?= Html::submitButton(Module::translate('module', 'Sign In'), [
            'class' => 'btn btn-primary w-100',
            'name' => 'login-button'
        ]) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
