<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use backend\assets\plugins\ICheckAsset;
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

ICheckAsset::register($this);
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name . ' | ' . Html::encode($this->title) ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php $this->beginBody() ?>
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= $homeUrl ?>" class="nav-link"><?= MainModule::translate('module', 'Home') ?></a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">

            <?= MessagesWidget::widget([
                'status' => true,
                'image' => $publishedUrl ? Html::img($publishedUrl . '/img/user2-160x160.jpg', [
                    'class' => 'img-circle elevation-2',
                    'alt' => 'User Image'
                ]) : ''
            ]) ?>

            <?= NotificationsWidget::widget(['status' => true]) ?>

            <?= TasksWidget::widget(['status' => true]) ?>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                    <?= AvatarWidget::widget([
                        'user_id' => $user->id,
                        'imageOptions' => [
                            'class' => 'user-image img-circle elevation-2',
                            'alt' => 'User Image'
                        ]
                    ]) ?>
                    <span class="d-none d-md-inline">&nbsp;<?= $fullUserName ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header bg-primary text-white text-center">
                        <?= AvatarWidget::widget([
                            'user_id' => $user->id,
                            'imageOptions' => [
                                'class' => 'img-circle elevation-2',
                                'alt' => 'User Image'
                            ]
                        ]) ?>
                        <p class="mt-2 mb-0">
                            <?= $fullUserName ?>
                            <small>
                                <?= UserModule::translate('module', 'Member since') . ' ' . $formatter->asDatetime($identity->created_at, 'LLL yyyy') // phpcs:ignore ?>
                            </small>
                        </p>
                    </li>
                    <li class="user-footer d-flex justify-content-between">
                        <a href="<?= Url::to(['/users/profile/index']) ?>"
                           class="btn btn-default btn-flat">
                            <?= UserModule::translate('module', 'Profile') ?>
                        </a>
                        <?= Html::beginForm(['/users/default/logout'])
                        . Html::submitButton(UserModule::translate('module', 'Sign Out'), [
                            'class' => 'btn btn-default btn-flat logout'
                        ]) . Html::endForm() ?>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-cogs"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="<?= $homeUrl ?>" class="brand-link">
            <?php if ($publishedUrl) : ?>
                <img src="<?= $publishedUrl ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <?php endif; ?>
            <span class="brand-text font-weight-light"><?= Html::encode(Yii::$app->name) ?></span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <?= AvatarWidget::widget([
                        'user_id' => $user->id,
                        'imageOptions' => [
                            'class' => 'img-circle elevation-2',
                            'alt' => 'User Avatar'
                        ]
                    ]) ?>
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $fullUserName ?></a>
                    <span class="text-success small"><i class="fas fa-circle me-1"></i><?= Yii::t('app', 'Online') ?></span>
                </div>
            </div>

            <?= SearchSidebar::widget(['status' => true]) ?>

            <?php
            $items = [
                [
                    'label' => Yii::t('app', 'HEADER'),
                    'options' => ['class' => 'nav-header text-uppercase']
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
                        'icon' => 'fa fa-users',
                        'title' => UserModule::translate('module', 'Users')
                    ]),
                    'url' => ['/users/default/index'],
                    'visible' => $user->can(Permission::PERMISSION_MANAGER_USERS)
                ],
                [
                    'label' => $this->render('_label', [
                        'isRoot' => true,
                        'icon' => 'fa fa-unlock',
                        'title' => RbacModule::translate('module', 'RBAC')
                    ]),
                    'url' => '#',
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
                    ],
                    'visible' => $user->can(Permission::PERMISSION_MANAGER_RBAC)
                ],
                [
                    'label' => $this->render('_label', [
                        'icon' => 'fa fa-wrench',
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
                    'url' => '#',
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
                            'url' => '#',
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
                    'data-widget' => 'treeview',
                    'role' => 'menu',
                    'data-accordion' => 'false'
                ],
                'itemOptions' => ['class' => 'nav-item'],
                'encodeLabels' => false,
                'linkTemplate' => '<a href="{url}" class="nav-link">{label}</a>',
                'submenuTemplate' => "\n<ul class=\"nav nav-treeview\">\n{items}\n</ul>\n",
                'activateParents' => true,
                'items' => $items
            ]);
            ?>
        </div>
    </aside>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <?php
                        $small = isset($this->params['title']['small']) ?
                            ' ' . Html::tag('small', Html::encode($this->params['title']['small']), ['class' => 'text-muted fs-6']) : '';
                        echo Html::tag('h1', Html::encode($this->title) . $small, ['class' => 'm-0']);
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <?= Breadcrumbs::widget([
                            'homeLink' => [
                                'label' => '<i class="fas fa-tachometer-alt"></i> ' . MainModule::translate('module', 'Home'),
                                'url' => Url::to(['/main/default/index'])
                            ],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'encodeLabels' => false,
                            'options' => ['class' => 'breadcrumb float-sm-end mb-0']
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <?= $content ?>
            </div>
        </section>

    </div>

    <footer class="main-footer">

        <div class="float-end d-none d-sm-inline">

        </div>
        <strong>&copy; <?= date('Y') ?> <a
                    href="#"><?= Html::encode(Yii::$app->name) ?></a>.</strong>
        <?= Yii::t('app', 'All rights reserved.') ?>
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
