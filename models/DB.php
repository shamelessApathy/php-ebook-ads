<?php 

class DB {

	public function __construct() 
	{
		// construct stuff here
	}
	public function spitOut()
	{
		$spit = "spit it out";
		return $spit;
	}
	public function pdo()
	{
		$host = DB_HOST;
		$db   = DB_NAME;
		$user = DB_USER;
		$pass = DB_PASS;
		$charset = 'utf8mb4';

		$options = [
   					PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    				PDO::ATTR_EMULATE_PREPARES   => false,
					];
		$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $options);
		return $pdo;
	}
}

?>