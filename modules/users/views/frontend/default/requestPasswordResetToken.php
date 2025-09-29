<?php

use modules\users\models\PasswordResetRequestForm;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use modules\users\Module;

/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap5\ActiveForm
 * @var $model PasswordResetRequestForm
 */

$this->title = Module::translate('module', 'Password Reset Form');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="users-frontend-default-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Module::translate('module', 'Enter your email address'); ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

            <?= $form->field($model, 'email')->textInput([
                'placeholder' => true,
            ]) ?>

            <div class="mb-3">
                <?= Html::submitButton(
                    '<span class="fas fa-paper-plane"></span> ' . Module::translate(
                        'module',
                        'Send'
                    ),
                    [
                        'class' => 'btn btn-primary'
                    ]
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
