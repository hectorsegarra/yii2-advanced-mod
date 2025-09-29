<?php
/** @var string $icon */
/** @var string $title */
/** @var bool $isRoot */

$defaultIcon = 'fas fa-link';
$isRoot = isset($isRoot);
$iconClass = isset($icon) ? $icon : $defaultIcon;
if (strpos($iconClass, 'nav-icon') === false) {
    $iconClass = 'nav-icon ' . $iconClass;
}
?>

<i class="<?= $iconClass ?>"></i>
<p class="mb-0">
    <?= $title ?>
    <?php if ($isRoot) { ?>
        <i class="fas fa-angle-left end"></i>
    <?php } ?>
</p>
