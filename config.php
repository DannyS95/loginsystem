<?php

$config = [
	'database' => [
		'name' => ';dbname=webservice',
        'username' => 'root',
        'password' => 'dfpsrane15',
        'connection' => 'mysql:host=localhost',
        'options' => [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
]];

try {
	$pdo =  new PDO(
		$config['database']['connection'] . $config['database']['name'],
		$config['database']['username'],
		$config['database']['password'],
		$config['database']['options']
	);
} catch(PDOException $e)
{
	echo "Error:" . $e->getMessage();
}

?>
