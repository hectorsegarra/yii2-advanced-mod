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
        <span class="badge bg-success navbar-badge">4</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
        <span class="dropdown-header">4 Messages</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <?= $image ?>
                </div>
                <div>
                    <h3 class="dropdown-item-title">
                        Support Team
                        <span class="float-end text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm mb-1">Why not buy a new awesome theme?</p>
                    <p class="text-sm text-muted mb-0"><i class="far fa-clock me-1"></i> 5 mins</p>
                </div>
            </div>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
    </div>
</li>
