<?php

use yii\web\View;

/**
 * @var $this View
 */
?>
<li class="nav-item dropdown">
    <a href="#" class="nav-link" data-bs-toggle="dropdown" role="button" aria-expanded="false">
        <i class="far fa-flag"></i>
        <span class="badge text-bg-danger ms-1">9</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
        <div class="dropdown-header text-center py-3">
            <strong><?= Yii::t('app', 'You have {count} tasks', ['count' => 9]) ?></strong>
        </div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <h6 class="mb-1">Design some buttons</h6>
                    <small class="text-body-secondary">20%</small>
                </div>
                <div class="progress mt-2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-info" style="width: 20%"></div>
                </div>
            </a>
        </div>
        <div class="dropdown-footer text-center py-2">
            <a href="#" class="text-decoration-none"><?= Yii::t('app', 'View all tasks') ?></a>
        </div>
    </div>
</li>
