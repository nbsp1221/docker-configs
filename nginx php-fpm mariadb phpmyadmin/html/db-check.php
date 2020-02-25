<?php

define('__DB_HOST__', 'db');
define('__DB_DBNAME__', 'develop');
define('__DB_USERNAME__', 'develop');
define('__DB_PASSWORD__', 'develop');

try {
	$pdo = new PDO('mysql:host=' . __DB_HOST__ . '; dbname=' . __DB_DBNAME__, __DB_USERNAME__, __DB_PASSWORD__);
} catch (PDOException $e) {
	die($e->getMessage());
}

echo 'Successfully connected to DB.';
