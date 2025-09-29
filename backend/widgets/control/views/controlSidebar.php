<div class="offcanvas offcanvas-end" tabindex="-1" id="app-control-sidebar" aria-labelledby="app-control-sidebar-label">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="app-control-sidebar-label"><?= Yii::t('app', 'Settings') ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?= Yii::t('app', 'Close') ?>"></button>
    </div>
    <div class="offcanvas-body">
        <section class="mb-4">
            <h6 class="text-uppercase text-body-secondary small mb-3"><?= Yii::t('app', 'Recent Activity') ?></h6>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-start">
                    <span class="badge rounded-pill text-bg-danger me-3"><i class="fas fa-birthday-cake"></i></span>
                    <div>
                        <h6 class="mb-1">Langdon's Birthday</h6>
                        <p class="mb-0 small text-body-secondary">Will be 23 on April 24th</p>
                    </div>
                </a>
            </div>
        </section>

        <section class="mb-4">
            <h6 class="text-uppercase text-body-secondary small mb-3"><?= Yii::t('app', 'Tasks Progress') ?></h6>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Custom Template Design</span>
                        <span class="badge text-bg-danger">70%</span>
                    </div>
                    <div class="progress mt-2" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: 70%"></div>
                    </div>
                </a>
            </div>
        </section>

        <section>
            <h6 class="text-uppercase text-body-secondary small mb-3"><?= Yii::t('app', 'General Settings') ?></h6>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="report-panel" checked>
                <label class="form-check-label" for="report-panel">
                    <?= Yii::t('app', 'Report panel usage') ?>
                </label>
                <p class="small text-body-secondary mb-0">
                    <?= Yii::t('app', 'Some information about this general settings option') ?>
                </p>
            </div>
        </section>
    </div>
</div>
