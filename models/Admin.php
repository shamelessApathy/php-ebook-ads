<?php
class Admin {

	public function create_user($username, $email, $password)
	{
		// Set Vars
		$md5_password = md5($password);
		$salt = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
		$passwordsalt = $md5_password . $salt;

		require_once(MODELS . '/DB.php');
		$db = new DB();
		$pdo = $db->pdo();

		$sql = "INSERT INTO users (username, email, password, salt) VALUES (?,?,?,?)";
		$stmt= $pdo->prepare($sql);
		if($stmt->execute([$username, $email, $passwordsalt, $salt]))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function verify_user($username, $password)
	{
		require_once(MODELS . '/DB.php');
		$db = new DB();
		$pdo = $db->pdo();

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
	public function user_exists()
	{
		require_once(MODELS . '/DB.php');
		$db = new DB();
		$pdo = $db->pdo();
		$sql = "SELECT * FROM users";
		$stmt = $pdo->query($sql);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}
}

?>