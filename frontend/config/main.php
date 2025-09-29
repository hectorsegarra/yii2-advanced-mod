<?php

use yii\web\UrlManager;
use yii\log\FileTarget;
use yii\helpers\ArrayHelper;
use modules\users\models\User;
use modules\users\behavior\LastVisitBehavior;
use modules\main\Bootstrap as MainBootstrap;
use modules\users\Bootstrap as UserBootstrap;
use modules\rbac\Bootstrap as RbacBootstrap;

$params = ArrayHelper::merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'en', // en, ru
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'main/default/index',

    // Si quieres que el mantenimiento se aplique en frontend, descomenta 'maintenance'
    'bootstrap' => [
        'log',
        MainBootstrap::class,
        UserBootstrap::class,
        RbacBootstrap::class,
        // 'maintenance',
    ],

    // Módulos
    'modules' => [
        // Módulo de mantenimiento (brussens)
        'maintenance' => [
            'class' => 'brussens\maintenance\Module',
        ],
    ],

    // Contenedor: singletons de mantenimiento (brussens)
    'container' => [
        'singletons' => [
            'brussens\maintenance\states\StateInterface' => [
                'class' => 'brussens\maintenance\states\FileState',
                'directory' => '@runtime',
            ],
            'brussens\maintenance\Maintenance' => [
                'class' => 'brussens\maintenance\Maintenance',
                // Ruta que verá el público en modo mantenimiento
                'route' => 'maintenance/default/index',
                'params' => [
                    'retryAfter' => 300,
                ],
                // Excepciones opcionales (IP/URI)
                'exceptions' => [
                    'ip'  => ['127.0.0.1'],
                    'uri' => ['debug', 'gii', 'users/default/login', 'users/default/logout', 'users/default/request-password-reset'],
                ],
            ],
        ],
    ],

    'components' => [
        'request' => [
            'cookieValidationKey' => '',
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => ''
        ],
        'user' => [
            'identityClass' => User::class,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => ['/users/default/login']
        ],
        'session' => [
            'name' => 'advanced-frontend'
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
            'errorAction' => 'frontend/error'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => []
        ],
        'urlManagerBackend' => [
            'class' => UrlManager::class,
            'baseUrl' => '/admin',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => []
        ]
    ],

    // Última visita
    'as afterAction' => [
        'class' => LastVisitBehavior::class
    ],

    'params' => $params
];
