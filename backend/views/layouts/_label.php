<?php

use yii\bootstrap5\Html;

/** @var string|null $icon */
/** @var string $title */
/** @var bool|null $isRoot */

$defaultIcon = 'far fa-circle';
$isRoot = isset($isRoot) && $isRoot;
$iconClass = ($icon ?? $defaultIcon);
?>

<?= Html::tag('i', '', ['class' => 'nav-icon ' . $iconClass]) ?>
<?= Html::tag('p', Html::encode($title) . ($isRoot ? Html::tag('i', '', ['class' => 'fas fa-angle-left right']) : '')) ?>
