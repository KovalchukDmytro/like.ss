<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
	'id' => 'basic',
	'basePath' => dirname(__DIR__),
	'homeUrl' => '/',
	'bootstrap' => ['log'],
	'components' => [
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
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'kossworthburatinocookievalidation',
			'baseUrl'             => '/',    // for multiLang
			'class'               => 'app\components\LangRequest' // for multiLang
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'user' => [
			'identityClass' => 'app\models\User',
			'enableAutoLogin' => true,
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
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
		'db' => $db,

		'urlManager' => [
//			'suffix'=>'/',
			'class'               => 'app\components\LangUrlManager', // for multiLang
			'enablePrettyUrl'     => true,
			'showScriptName'      => false,
			'enableStrictParsing' => false,
			'rules' => [

				'about-us' => 'site/about',
				'contacts' => 'site/contacts',

				'service/<category>'=>'service/category',

				'portfolio/<alias>'=>'portfolio/view',
				'portfolio'=>'portfolio/index',

				'news/<alias>'=>'news/view',
				'news/page/<page>'=>'news/index',
				'news'=>'news/index',
				'/'=>'site/index',
			],
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',

			'useFileTransport' => false,

			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'mail.ukraine.com.ua',
				'username' => 'form@adamantstore.com',
				'password' => 'U90l80ejkPPY',
				'port' => '25',
			],
		],

	],
	'params' => $params,
];

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];

	$config['bootstrap'][] = 'gii';
	$config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];
}

return $config;
