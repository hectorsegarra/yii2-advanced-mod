<?php
/** @var string $icon */
/** @var string $title */
/** @var bool $isRoot */

$defaultIcon = 'fa fa-link';
$isRoot = isset($isRoot);
?>

<i class="<?= isset($icon) ? $icon : $defaultIcon ?>"></i>
<span><?= $title ?></span>
<?php if ($isRoot) { ?>
    <span class="float-end-container"><i class="fa fa-angle-left float-end"></i></span>
<?php } ?>
