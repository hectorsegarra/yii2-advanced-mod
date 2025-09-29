<?php

use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\log\FileTarget;
use yii\web\UrlManager;
use yii\helpers\ArrayHelper;
use modules\rbac\models\Permission;
use modules\users\models\User;
use modules\rbac\components\behavior\AccessBehavior;
use modules\users\behavior\LastVisitBehavior;
use modules\main\Bootstrap as MainBootstrap;
use modules\users\Bootstrap as UserBootstrap;
use modules\rbac\Bootstrap as RbacBootstrap;
use modules\rbac\Module;

$params = ArrayHelper::merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'language' => 'en',
    'homeUrl' => '/admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'main/default/index',
    'bootstrap' => [
        'log',
        MainBootstrap::class,
        UserBootstrap::class,
        RbacBootstrap::class,
        // activar maintenance en backend si quieres bloquear admin durante obras:
        // 'maintenance',
    ],
    'modules' => [
        'main' => [
            'isBackend' => true
        ],
        'users' => [
            'isBackend' => true
        ],
        'rbac' => [
            'class' => Module::class,
            'params' => [
                'userClass' => User::class
            ]
        ],
        // módulo de mantenimiento (brussens)
        'maintenance' => [
            'class' => 'brussens\maintenance\Module',
        ],
    ],
    'controllerMap' => [
        // si quieres comandos web específicos para maintenance, puedes crear tu propio controller;
        // brussens no expone controller web aquí, usa la ruta del módulo: maintenance/default/index
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => '',
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin'
        ],
        'assetManager' => [
            'bundles' => [
                BootstrapAsset::class => [],
                BootstrapPluginAsset::class => []
            ]
        ],
        'user' => [
            'identityClass' => User::class,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['/users/default/login']
        ],
        'session' => [
            'name' => 'advanced-backend'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => FileTarget::class,
                    'levels' => ['error', 'warning']
                ]
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'backend/error'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => []
        ],
        'urlManagerFrontend' => [
            'class' => UrlManager::class,
            'baseUrl' => '',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                'email-confirm' => 'users/default/email-confirm'
            ]
        ]
    ],
    // Último vis it
    'as afterAction' => [
        'class' => LastVisitBehavior::class
    ],
    // Acceso a admin
    'as AccessBehavior' => [
        'class' => AccessBehavior::class,
        'permission' => Permission::PERMISSION_VIEW_ADMIN_PAGE,
    ],
    'params' => $params
];
