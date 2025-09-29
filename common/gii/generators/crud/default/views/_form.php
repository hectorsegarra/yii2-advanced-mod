<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin([
        'fieldConfig' => [
            'options' => ['class' => 'mb-3'],
        ],
    ]); ?>
    <div class="card card-primary card-outline shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><?= "<?= " ?>Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "            <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
        </div>
        <div class="card-footer text-end">
            <?= "<?= " ?>Html::submitButton('<span class="fas fa-save"></span> '.<?= $generator->generateString('Save') ?>, ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
