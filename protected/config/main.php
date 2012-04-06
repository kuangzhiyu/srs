<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'theme'=>'dancer',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.report.models.*',
		'application.extensions.yiidebugtb.*', 
		'application.extensions.fullcalendar.*', 
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'avatar' => array(
					
		),
		'report' => array(
					
		),
		'user' => array(
			//'debug' => true,
			'usersTable' => 'user',
			'translationTable' => 'translation',
		),
		'usergroup' => array(
			'usergroupTable' => 'user_group',
			'usergroupMessagesTable' => 'user_group_message',
		),
		'membership' => array(
			'membershipTable' => 'membership',
			'paymentTable' => 'payment',
		),
		'friendship' => array(
			
		),
		'profile' => array(
			'privacySettingTable' => 'privacy_setting',
			'profileFieldsGroupTable' => 'profile_field_group',
			'profileFieldsTable' => 'profile_field',
			'profileTable' => 'profile',
			'profileCommentTable' => 'profile_comment',
			'profileVisitTable' => 'profile_visit',
		),
		'role' => array(
			'rolesTable' => 'role',
			'userHasRoleTable' => 'user_role',
			'actionTable' => 'action',
			'permissionTable' => 'permission',
		),
		'messages' => array(
			'messagesTable' => 'message',
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class' => 'application.modules.user.components.YumWebUser',
			'allowAutoLogin'=>true,
			'loginUrl' => array('//user/user/login'),
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yii_srs',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => '',
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
				array( // configuration for the toolbar
					'class'=>'XWebDebugRouter',
					'config'=>'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
					'levels'=>'error, warning, trace, profile, info',
					'allowedIPs'=>array('127.0.0.1','::1','192.168.1.54','192\.168\.1[0-5]\.[0-9]{3}'),
				),
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