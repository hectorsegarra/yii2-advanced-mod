<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use backend\widgets\control\ControlSidebar;
use backend\widgets\navbar\MessagesWidget;
use backend\widgets\navbar\NotificationsWidget;
use backend\widgets\navbar\TasksWidget;
use backend\widgets\search\SearchSidebar;
use modules\rbac\models\Permission;
use modules\users\models\User;
use dominus77\noty\NotyWidget;
use modules\users\widgets\AvatarWidget;
use modules\main\Module as MainModule;
use modules\users\Module as UserModule;
use modules\rbac\Module as RbacModule;

/* @var $this View */
/* @var $content string */

AppAsset::register($this);

NotyWidget::widget([
    'typeOptions' => [
        NotyWidget::TYPE_SUCCESS => ['timeout' => 3000],
        NotyWidget::TYPE_INFO => ['timeout' => 3000],
        NotyWidget::TYPE_ALERT => ['timeout' => 3000],
        NotyWidget::TYPE_ERROR => ['timeout' => 5000],
        NotyWidget::TYPE_WARNING => ['timeout' => 3000]
    ],
    'options' => [
        'progressBar' => true,
        'timeout' => false,
        'layout' => NotyWidget::LAYOUT_TOP_CENTER,
        'dismissQueue' => true,
        'theme' => NotyWidget::THEME_SUNSET
    ],
]);

/** @var yii\web\User $user */
$user = Yii::$app->user;
/* @var User $identity */
$identity = $user->identity;
$fullUserName = ($identity !== null) ? $identity->getUserFullName() : Yii::t('app', 'No Authorize');
$assetManager = Yii::$app->assetManager;
/** @var false|string $publishedUrl */
$publishedUrl = $assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
$formatter = Yii::$app->formatter;
$homeUrl = is_string(Yii::$app->homeUrl) ? Yii::$app->homeUrl : '/';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name . ' | ' . Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->head() ?>
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-mini bg-body-tertiary">
<?php $this->beginBody() ?>

<div class="app-wrapper">
    <nav class="app-header navbar navbar-expand bg-body border-bottom shadow-sm">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-lte-toggle="sidebar" role="button" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <a href="<?= $homeUrl ?>" class="navbar-brand ms-3 d-none d-md-inline-flex align-items-center">
                <span class="fw-semibold">Admin</span><span class="fw-light ms-1">LTE</span>
            </a>
            <ul class="navbar-nav ms-auto align-items-center">
                <?= MessagesWidget::widget([
                    'status' => true,
                    'image' => $publishedUrl ? Html::img($publishedUrl . '/img/user2-160x160.jpg', [
                        'class' => 'img-fluid rounded-circle me-2',
                        'alt' => 'User Image'
                    ]) : ''
                ]) ?>
                <?= NotificationsWidget::widget(['status' => true]) ?>
                <?= TasksWidget::widget(['status' => true]) ?>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= AvatarWidget::widget([
                            'user_id' => $user->id,
                            'imageOptions' => [
                                'class' => 'rounded-circle me-2 user-image'
                            ]
                        ]) ?>
                        <span class="d-none d-md-inline fw-semibold"><?= $fullUserName ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0">
                        <div class="bg-primary text-white text-center p-3">
                            <?= AvatarWidget::widget([
                                'user_id' => $user->id,
                                'imageOptions' => [
                                    'class' => 'rounded-circle mb-2'
                                ]
                            ]) ?>
                            <p class="mb-0 fw-semibold"><?= $fullUserName ?></p>
                            <small class="text-white-50">
                                <?= UserModule::translate('module', 'Member since') . ' ' . $formatter->asDatetime($identity->created_at, 'LLL yyyy') // phpcs:ignore ?>
                            </small>
                        </div>
                        <div class="px-3 py-2 border-bottom">
                            <div class="d-flex justify-content-around text-center">
                                <a href="#" class="text-decoration-none small">
                                    <?= Yii::t('app', 'Followers') ?>
                                </a>
                                <a href="#" class="text-decoration-none small">
                                    <?= Yii::t('app', 'Sales') ?>
                                </a>
                                <a href="#" class="text-decoration-none small">
                                    <?= Yii::t('app', 'Friends') ?>
                                </a>
                            </div>
                        </div>
                        <div class="px-3 py-3">
                            <div class="d-flex justify-content-between gap-2">
                                <a href="<?= Url::to(['/users/profile/index']) ?>" class="btn btn-outline-primary flex-fill">
                                    <?= UserModule::translate('module', 'Profile') ?>
                                </a>
                                <?= Html::beginForm(['/users/default/logout'], 'post', ['class' => 'flex-fill']) ?>
                                <?= Html::submitButton(UserModule::translate('module', 'Sign Out'), [
                                    'class' => 'btn btn-outline-danger w-100 logout'
                                ]) ?>
                                <?= Html::endForm() ?>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-link nav-link" data-bs-toggle="offcanvas" data-bs-target="#app-control-sidebar" aria-controls="app-control-sidebar">
                        <i class="fas fa-sliders-h"></i>
                        <span class="visually-hidden"><?= Yii::t('app', 'Toggle settings panel') ?></span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>

    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="app-sidebar-header d-flex align-items-center justify-content-between px-3 py-2">
            <a href="<?= $homeUrl ?>" class="app-sidebar-brand text-decoration-none text-white fw-semibold">
                <span>AdminLTE</span>
            </a>
            <button class="btn btn-link text-white" data-lte-toggle="sidebar" aria-label="Close sidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="app-sidebar-body px-3 pb-3">
            <div class="d-flex align-items-center mb-3">
                <div class="me-2">
                    <?= AvatarWidget::widget([
                        'user_id' => $user->id,
                        'imageOptions' => [
                            'class' => 'rounded-circle sidebar-user-image'
                        ]
                    ]) ?>
                </div>
                <div>
                    <p class="mb-0 fw-semibold text-white"><?= $fullUserName ?></p>
                    <span class="text-success small"><i class="fas fa-circle me-1"></i><?= Yii::t('app', 'Online') ?></span>
                </div>
            </div>

            <?= SearchSidebar::widget(['status' => true]) ?>

            <?php
            $items = [
                [
                    'label' => Yii::t('app', 'HEADER'),
                    'options' => ['class' => 'nav-header text-uppercase text-muted small']
                ],
                [
                    'label' => $this->render('_label', [
                        'icon' => 'fas fa-tachometer-alt',
                        'title' => MainModule::translate('module', 'Home')
                    ]),
                    'url' => ['/main/default/index']
                ],
                [
                    'label' => $this->render('_label', [
                        'icon' => 'fas fa-users',
                        'title' => UserModule::translate('module', 'Users')
                    ]),
                    'url' => ['/users/default/index'],
                    'visible' => $user->can(Permission::PERMISSION_MANAGER_USERS)
                ],
                [
                    'label' => $this->render('_label', [
                        'isRoot' => true,
                        'icon' => 'fas fa-unlock',
                        'title' => RbacModule::translate('module', 'RBAC')
                    ]),
                    'url' => ['/rbac/default/index'],
                    'visible' => $user->can(Permission::PERMISSION_MANAGER_RBAC),
                    'items' => [
                        [
                            'label' => $this->render('_label', [
                                'icon' => 'far fa-circle',
                                'title' => RbacModule::translate('module', 'Permissions')
                            ]),
                            'url' => ['/rbac/permissions/index']
                        ],
                        [
                            'label' => $this->render('_label', [
                                'icon' => 'far fa-circle',
                                'title' => RbacModule::translate('module', 'Roles')
                            ]),
                            'url' => ['/rbac/roles/index']
                        ],
                        [
                            'label' => $this->render('_label', [
                                'icon' => 'far fa-circle',
                                'title' => RbacModule::translate('module', 'Assign')
                            ]),
                            'url' => ['/rbac/assign/index']
                        ]
                    ]
                ],
                [
                    'label' => $this->render('_label', [
                        'icon' => 'fas fa-wrench',
                        'title' => Yii::t('app', 'Mode site')
                    ]),
                    'url' => ['/maintenance/index'],
                    'visible' => $user->can(Permission::PERMISSION_MANAGER_MAINTENANCE)
                ],
                [
                    'label' => $this->render('_label', [
                        'title' => Yii::t('app', 'Another Link')
                    ]),
                    'url' => ['#']
                ],
                [
                    'label' => $this->render('_label', [
                        'isRoot' => true,
                        'title' => Yii::t('app', 'Multilevel')
                    ]),
                    'url' => ['#'],
                    'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        [
                            'label' => $this->render('_label', [
                                'icon' => 'far fa-circle',
                                'title' => Yii::t('app', 'Link in level 2')
                            ]),
                            'url' => ['#']
                        ],
                        [
                            'label' => $this->render('_label', [
                                'isRoot' => true,
                                'icon' => 'far fa-circle',
                                'title' => Yii::t('app', 'Link in level 2')
                            ]),
                            'url' => ['#'],
                            'items' => [
                                [
                                    'label' => Yii::t('app', 'Link in level 3'),
                                    'url' => ['#'],
                                ]
                            ]
                        ]
                    ]
                ]
            ];
            echo Menu::widget([
                'options' => [
                    'class' => 'nav nav-pills nav-sidebar flex-column',
                    'data-lte-toggle' => 'treeview',
                    'role' => 'menu',
                    'data-accordion' => 'false'
                ],
                'itemOptions' => ['class' => 'nav-item'],
                'encodeLabels' => false,
                'submenuTemplate' => "\n<ul class=\"nav nav-treeview\">\n{items}\n</ul>\n",
                'activateParents' => true,
                'openCssClass' => 'menu-open',
                'items' => $items
            ]);
            ?>
        </div>
    </aside>

    <main class="app-main">
        <div class="app-content-header border-bottom">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <?php
                        $small = $this->params['title']['small'] ?? null;
                        ?>
                        <h1 class="app-page-title mb-0">
                            <?= Html::encode($this->title) ?>
                            <?php if ($small !== null) { ?>
                                <small class="text-body-secondary ms-2"><?= Html::encode($small) ?></small>
                            <?php } ?>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <?= Breadcrumbs::widget([
                            'homeLink' => [
                                'label' => '<i class="fas fa-home"></i> ' . MainModule::translate('module', 'Home'),
                                'url' => Url::to(['/main/default/index'])
                            ],
                            'links' => $this->params['breadcrumbs'] ?? [],
                            'encodeLabels' => false,
                            'options' => ['class' => 'breadcrumb float-sm-end mb-0'],
                            'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
                            'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n",
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content py-3">
            <div class="container-fluid">
                <?= $content ?>
            </div>
        </div>
    </main>

    <footer class="app-footer border-top py-3 mt-auto">
        <div class="container-fluid">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                <div class="text-muted small">&copy; <?= date('Y') ?> <a href="#" class="text-decoration-none"><?= Yii::$app->name ?></a></div>
                <div class="text-muted small"><?= Yii::t('app', 'All rights reserved.') ?></div>
            </div>
        </div>
    </footer>

    <?= ControlSidebar::widget([
        'status' => true,
        'demo' => false
    ]) ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
