<?php

use yii\db\Connection;
use yii\rbac\DbManager;
use yii\caching\FileCache;
use yii\helpers\ArrayHelper;
use modules\main\Module as MainModule;
use modules\users\Module as UserModule;
use modules\rbac\Module as RbacModule;

$params = ArrayHelper::merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'name' => 'Yii2-advanced-start',
    'timeZone' => 'Europe/Moscow',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset'
    ],
    // si quieres mantenimiento también aquí (global), añade 'maintenance' al bootstrap:
    'bootstrap' => [
        // 'maintenance',
    ],
    'container' => [
        'singletons' => [
            // Config de estado de mantenimiento (brussens)
            'brussens\maintenance\states\StateInterface' => [
                'class' => 'brussens\maintenance\states\FileState',
                'dateFormat' => 'd-m-Y H:i:s',
                'directory'  => '@frontend/runtime',
            ],
            'brussens\maintenance\Maintenance' => [
                'class' => 'brussens\maintenance\Maintenance',
                'route' => 'maintenance/default/index',
                'params' => [
                    'retryAfter' => 300,
                ],
                'exceptions' => [
                    'ip'  => ['127.0.0.1'],
                    'uri' => ['debug', 'gii'],
                ],
            ],
        ],
    ],
    'modules' => [
        'main' => [
            'class' => MainModule::class
        ],
        'users' => [
            'class' => UserModule::class
        ],
        'rbac' => [
            'class' => RbacModule::class
        ],
        // módulo de mantenimiento (brussens)
        'maintenance' => [
            'class' => 'brussens\maintenance\Module',
        ],
    ],
    'components' => [
        'db' => [
            'class' => Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=yii2_advanced_start',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
            'enableSchemaCache' => true
        ],
        'authManager' => [
            'class' => DbManager::class,
            'cache' => 'cache'
        ],
        'cache' => [
            'class' => FileCache::class,
            'cachePath' => '@frontend/runtime/cache'
        ],
        'mailer' => [
            'useFileTransport' => false
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'basePath' => '@app/web/assets'
        ]
    ]
];
