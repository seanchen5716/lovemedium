<?php
$config['db'] = array(
	'host' 			=> 'ja-cdbr-azure-east-a.cloudapp.net',
	'username'		=> 'b966de4042f988',
	'password'		=> '2e118b48',
	'dbname'		=> 'lovemedium'
);

try {
	$db = new PDO('mysql:host=' .$config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
}
catch(PDOException $e) { 
    echo $e->getMessage();
}
?>
