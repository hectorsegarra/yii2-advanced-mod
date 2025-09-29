<?php

use yii\web\View;

/**
 * @var $this View
 * @var $image string User Avatar
 */

?>
<li class="nav-item dropdown">
    <a href="#" class="nav-link" data-bs-toggle="dropdown" role="button" aria-expanded="false">
        <i class="far fa-envelope"></i>
        <span class="badge text-bg-success ms-1">4</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
        <div class="dropdown-header text-center py-3">
            <strong><?= Yii::t('app', 'You have {count} messages', ['count' => 4]) ?></strong>
        </div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action d-flex align-items-start">
                <div class="me-3 flex-shrink-0">
                    <?= $image ?>
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-1">Support Team</h6>
                        <small class="text-body-secondary"><i class="far fa-clock"></i> 5 mins</small>
                    </div>
                    <p class="mb-0 small">Why not buy a new awesome theme?</p>
                </div>
            </a>
        </div>
        <div class="dropdown-footer text-center py-2">
            <a href="#" class="text-decoration-none"><?= Yii::t('app', 'See All Messages') ?></a>
        </div>
    </div>
</li>
