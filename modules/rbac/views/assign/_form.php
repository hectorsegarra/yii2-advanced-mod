<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use modules\rbac\models\Role;
use modules\rbac\Module;

/* @var $this yii\web\View */
/* @var $model Role */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rbac-assign-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'role')->listBox(Role::rolesArray(), [
                'size' => 8
            ]) ?>
        </div>
    </div>
    <div class="mb-3">
        <?= Html::submitButton(
            $model->isNewRecord ?
            '<span class="fas fa-plus" aria-hidden="true"></span> ' . Module::translate(
                'module',
                'Create'
            ) : '<span class="fas fa-check" aria-hidden="true"></span> ' . Module::translate(
                'module',
                'Save'
            ),
            [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
            ]
        ) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
