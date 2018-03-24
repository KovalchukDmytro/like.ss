<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'buratino-basic',
    'basePath' => dirname(__DIR__),
    'homeUrl' => '/',
    'bootstrap' => ['log'],
    'components' => [
//        'errorHandler' => [
//            'errorAction' => 'content/error',
//        ],

        'calculator' => [
            'class' => 'app\components\Calculator'
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
//            'class' => 'yii\caching\ApcCache',
            'defaultDuration' => 10
        ],
        'view' => [
            'class' => 'yii\web\View',
            'renderers' => [
                'twig' => [
                    'class' => 'yii\twig\ViewRenderer',
                    'cachePath' => '@runtime/Twig/cache',
                    // Array of twig options:
                    'options' => [
                        'auto_reload' => true,
                    ],
                    'filters'    => [
                        'dump' => 'var_dump'
                    ],
                    'globals' =>
                        [   
                            'Url'   => '\yii\helpers\Url',
                            'html'  => '\yii\helpers\Html',
                            'asset' => '\app\assets\AppAsset',
                            'Yii'   => 'Yii',
                            'Pages' => '\app\models\Pages',
                            'Seo'   => '\app\components\Seo',
                        ],
                    'uses' => ['yii\bootstrap'],
                ],
                // ...
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'kossworthburatinocookievalidation',
            'baseUrl'             => '/',    // for multiLang
            'class'               => 'app\components\LangRequest' // for multiLang
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class'      => 'yii\swiftmailer\Mailer',
            'viewPath'   => '@app/mail',
//            'htmlLayout' => 'layouts/html',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'class'               => 'app\components\LangUrlManager', // for multiLang
            'enablePrettyUrl'     => true,
            'showScriptName'      => false,
            'enableStrictParsing' => false,
            'rules' => [
                [
                    'pattern' => 'form/discribe',
                    'route' => 'form/discribe',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'form/pay',
                    'route' => 'form/pay',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'search',
                    'route' => 'search/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'search/result',
                    'route' => 'search/result',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'catalogs/<alias>',
                    'route' => 'catalogs/view',
                    'suffix' => ''
                ],

                [
                    'pattern' => 'catalogs/page/<page>',
                    'route' => 'catalogs/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'catalogs',
                    'route' => 'catalogs/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'webinar/<alias>',
                    'route' => 'articles/view',
                    'suffix' => ''
                ],

                [
                    'pattern' => 'webinar/page/<page>',
                    'route' => 'articles/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'webinar',
                    'route' => 'articles/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'news/<alias>',
                    'route' => 'news/view',
                    'suffix' => ''
                ],

                [
                    'pattern' => 'news/page/<page>',
                    'route' => 'news/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'news',
                    'route' => 'news/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'about',
                    'route' => 'content/about',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'contacts',
                    'route' => 'content/contacts',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'partners',
                    'route' => 'content/partners',
                    'suffix' => ''
                ],
                [
                    'pattern' => '<alias>/<product>',
                    'route' => 'product/index',
                    'suffix' => ''
                ],
                [
                    'pattern' => '<alias:(laboratoriya|biotehnologii|promushlennoe-oborudovanie)>',
                    'route' => 'catalog/catalog',
                    'suffix' => ''
                ],
                [
                    'pattern' => 'products',
                    'route' => 'catalog/products',
                    'suffix' => ''
                ],
                [
                    'pattern' => '<alias>/filter/<filter>/page/<page>',
                    'route'   => 'catalog/category',
                    'suffix'  => '',
                ],
                [
                    'pattern' => '<alias>/filter/<filter>',
                    'route'   => 'catalog/category',
                    'suffix'  => '',
                ],
                [
                    'pattern' => '<alias>/page/<page>',
                    'route'   => 'catalog/category',
                    'suffix'  => '',
                ],
                [
                    'pattern' => '<alias>',
                    'route'   => 'catalog/category',
                    'suffix'  => '',
                ],
			   [
                    'pattern' => '',
                    'route' => 'content/index',
                    'suffix' => ''
                ],
               
                [
                    'pattern' => '<_c>/<_a>',
                    'route' => '<_c>/<_a>',
                    'suffix' => '',
                ],
            ],
        ],
        'language'     => 'ru-RU',
        'i18n'         => [
            'translations' => [
                '*' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],
        // выключаем bootstap
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'      => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '37.115.80.189', '193.93.77.121'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '37.115.80.189', '193.93.77.121'],
    ];
}

return $config;
