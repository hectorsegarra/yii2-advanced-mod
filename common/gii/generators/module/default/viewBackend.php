<?php
/* @var $this yii\web\View */
/* @var $generator common\gii\generators\module\Generator */

require __DIR__ . '/base.php';

echo "<?php\n";
?>

use yii\bootstrap5\Html;
use <?= $ns ?>\<?= $className ?>;

$this->title = <?= $className ?>::translate('module', '<?= ucfirst($moduleName) ?>');
$this->params['breadcrumbs'][] = $this->title;
<?= '?>' ?>

<div class="<?= $moduleName ?>-backend-default-index">
    <div class="card card-primary card-outline">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title mb-0"><?= '<?= Html::encode($this->title) ?>' ?></h3>

            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <p>
                This is the module <?= $moduleName ?> backend page.
                You may modify the following file to customize its content:
            </p>
            <code><?= '<?= __FILE__ ?>' ?></code>
        </div>
    </div>
</div>
