<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use modules\users\Module;

/**
 * @var $this yii\web\View
 * @var $model modules\users\models\UserDeleteForm
 */

$this->title = Module::translate('module', 'Confirm deleting profile');
$this->params['breadcrumbs'][] = ['label' => Module::translate('module', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-frontend-profile-delete">

    <?php $form = ActiveForm::begin([
        'validationUrl' => ['ajax-validate-password-delete-form'],
    ]); ?>

    <?= $form->field($model, 'currentPassword', ['enableAjaxValidation' => true])->passwordInput([
        'maxlength' => true,
        'placeholder' => true,
    ]) ?>

    <div class="mb-3">
        <?= Html::submitButton('<span class="fas fa-trash"></span> ' . Module::translate(
            'module',
            'Delete'
        ), [
            'class' => 'btn btn-danger',
            'name' => 'submit-button',
        ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
