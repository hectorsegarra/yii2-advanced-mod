<form action="#" method="get" class="sidebar-search mb-3" role="search">
    <label for="sidebar-search-input" class="form-label visually-hidden">
        <?= Yii::t('app', 'Search') ?>
    </label>
    <div class="input-group input-group-sm">
        <input id="sidebar-search-input" type="search" name="q" class="form-control"
               placeholder="<?= Yii::t('app', 'Search') . '...' ?>" aria-label="<?= Yii::t('app', 'Search') ?>">
        <button type="submit" name="search" id="search-btn" class="btn btn-outline-secondary">
            <i class="fas fa-search"></i>
            <span class="visually-hidden"><?= Yii::t('app', 'Search') ?></span>
        </button>
    </div>
</form>
