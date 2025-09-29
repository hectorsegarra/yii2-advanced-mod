<?php

use yii\web\View;

/**
 * @var $this View
 */
?>
<li class="nav-item dropdown">
    <a href="#" class="nav-link" data-bs-toggle="dropdown" role="button" aria-expanded="false">
        <i class="far fa-bell"></i>
        <span class="badge text-bg-warning ms-1">10</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
        <div class="dropdown-header text-center py-3">
            <strong><?= Yii::t('app', 'You have {count} notifications', ['count' => 10]) ?></strong>
        </div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="fa fa-users text-primary me-3"></i>
                <span class="small">5 new members joined today</span>
            </a>
        </div>
        <div class="dropdown-footer text-center py-2">
            <a href="#" class="text-decoration-none"><?= Yii::t('app', 'View all') ?></a>
        </div>
    </div>
</li>
