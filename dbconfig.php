<?php

	$db_username = 'root';
	$db_password = 'mysql';
	$db_name = 'rdbms';
	$db_host = 'localhost';
	$item_per_page = 7;
	
	
	try
	{
		$dbcon = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_username,$db_password);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

?>