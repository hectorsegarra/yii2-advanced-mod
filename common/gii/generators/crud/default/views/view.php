<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
    <div class="card card-primary card-outline shadow-sm">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title mb-0"><?= "<?= " ?>Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <div class="float-end">
                <p>
                    <?= "<?= " ?>Html::a(
                        '<span class="fas fa-pen" aria-hidden="true"></span> ' .
                        <?= $generator->generateString('Update') ?>,
                        ['update', <?= $urlParams ?>],
                        ['class' => 'btn btn-primary']
                    ) ?>
                    <?= "<?= " ?>Html::a(
                        '<span class="fas fa-trash" aria-hidden="true"></span> ' .
                        <?= $generator->generateString('Delete') ?>,
                        ['delete', <?= $urlParams ?>],
                        [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                                'method' => 'post',
                            ],
                        ]
                    ) ?>
                </p>
            </div>
            <?= "<?= " ?>DetailView::widget([
                'model' => $model,
                'options' => [
                    'class' => 'table table-bordered table-hover detail-view align-middle',
                ],
                'attributes' => [
                <?php if (($tableSchema = $generator->getTableSchema()) === false) {
                    echo "\r";
                    foreach ($generator->getColumnNames() as $name) {
                        echo "                    '" . $name . "',\n";
                    }
                } else {
                    echo "\r";
                    foreach ($generator->getTableSchema()->columns as $column) {
                        $format = $generator->generateColumnFormat($column);
                        echo "                    '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                    }
                } ?>
                ],
            ]) ?>
        </div>
    </div>
</div>
