<?php
	
	header('Content-type: text/html; charset=utf-8'); 
	
	define( 'DIRSEP', DIRECTORY_SEPARATOR );
		$site_path = realpath( dirname(__FILE__). DIRSEP. '..' .DIRSEP ) . DIRSEP;
		define( 'sPath', $site_path );
	
	require_once( 'core/router.php' );
	require_once( 'core/controller.php' );
	require_once( 'core/model.php' );
	require_once( 'core/view.php' );


	$dir = sPath . 'applications' . DIRSEP . 'models';
	$files = scandir($dir);
	array_shift($files);
	array_shift($files);
	foreach ($files as $key => $value) :
		require_once($dir . DIRSEP . $value);
	endforeach;
	
	define('NAME_DB','dayredo_zzz_com_ua');
	define('USER_DB','ddayredo');
	define('PASSWORD_DB','dlk924mw1');
	define('HOST_DB','127.0.0.1:3306');
	define('CHARSET_DB','utf8');

	

	$router = new Router;
	$router->delegate();