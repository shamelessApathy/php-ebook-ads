<?php

class Admin {

	public function create_user($username, $email, $password)
	{
		// Set Vars
		$md5_password = md5($password);
		$salt = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
		$passwordsalt = $md5_password . $salt;

		// DB STUFF
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

		$sql = "INSERT INTO users (username, email, password, salt) VALUES (?,?,?,?)";
		$stmt= $pdo->prepare($sql);
		if($stmt->execute([$username, $email, $passwordsalt, $salt]))
		{
			echo "it worked!";
		}
		else
		{
			echo "something went wrong";
		}
	}
	public function verify_user($username, $password)
	{
		// DB STUFF
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

		$sql = "SELECT * FROM users WHERE username = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$username]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result)
		{
			$salt = $result['salt'];
			$passwordsalt = md5($password) . $salt;
			if ($result['password'] === $passwordsalt)
			{
				$_SESSION['user_id'] = $result['id'];
				return true;
			}
			else
			{
				echo "Password didn't match";
			}
		}
		else
		{
			echo "Credentials did not match";
		}

	}
}

?>