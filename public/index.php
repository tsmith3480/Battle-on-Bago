<?php
    require 'vendor/autoload.php';
	
	$database = new medoo([
		'database_type' => 'mssql',
		'database_name' => 'BOB',
		'server' => 'agilebob.database.windows.net',
		'username' => 'bobadmin',
		'password'=> 'Agilebob60515',
		'charset' => 'utf8'
	]);
	
	
?>