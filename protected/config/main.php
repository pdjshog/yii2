<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
return array(
	'theme'=>'bootstrap',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	'application.modules.user.models.*',
	'application.modules.user.components.*',
	'ext.giix.components.*',
		
	),

	'modules'=>array(
		
		'staticPages',
		
	'user'=>array(
			# encrypting method (php hash function)
			'hash' => 'md5',

			# send activation email
			'sendActivationMail' => true,

			# allow access for non-activated users
			'loginNotActiv' => false,

			# activate user on registration (only sendActivationMail = false)
			'activeAfterRegister' => false,

			# automatically login from registration
			'autoLogin' => true,

			# registration path
			'registrationUrl' => array('/user/registration'),

			# recovery password path
			'recoveryUrl' => array('/user/recovery'),

			# login form path
			'loginUrl' => array('/user/login'),

			# page after login
			'returnUrl' => array('/user/profile'),

			# page after logout
			'returnLogoutUrl' => array('/user/login'),
			),
		
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
				'bootstrap.gii',
				'ext.giix.generators', 
			),
			
		),
		
	),



	// application components
	'components'=>array(
	'phpThumb'=>array(
			'class'=>'ext.EPhpThumb.EPhpThumb',
			),
	'user'=>array(
			// enable cookie-based authentication
			'class' => 'WebUser',
			'allowAutoLogin'=>true,
			'loginUrl' => array('/user/login'),
			),
		
		'bootstrap'=>array(
			'class'=>'bootstrap.components.Bootstrap',
			),
		// uncomment the following to enable URLs in path-format
		
		/*'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'page/<id:[\w\-]+>' => 'staticPages/staticPages/view',
			),
		),*/
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
			'tablePrefix' => 'tbl_',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=kyattsu_testss',
			'emulatePrepare' => true,
			'username' => 'kyattsu_testss',
			'password' => '123456',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);