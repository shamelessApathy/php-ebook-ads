<?php
require_once(GLOBALS);
class adminController {

	public function login()
	{
		require_once(MODELS . "/Admin.php");
		$admin_model = new Admin();
		$test = $admin_model->user_exists();
		if (!$test)
		{
			return_view('view.create_user.php');
		}
		else
		{
			return_view('view.login.php');
		}
	}
	public function create()
	{
		return_view('view.create_user.php');
	}
	public function new_user()
	{
		$username = $_POST['username'];
		$pass1 = $_POST['password1'];
		$pass2 = $_POST['password2'];
		$email = $_POST['email'];
		if ($pass1 !== $pass2)
		{
			echo "Passwords do not match";
		}
		// Password confirmed to be matching
		else
		{
			require_once(MODELS . '/Admin.php');
			$admin_model = new Admin();
			$result = $admin_model->create_user($username,$email,$pass1);
			if ($result)
			{
				return_view('view.login.php');
			}
			else
			{
				return_view('view.create_user.php');
			}
		}
	}
	public function verify()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		require_once(MODELS . '/Admin.php');
		$admin_model = new Admin();
		$verify = $admin_model->verify_user($username, $password);
		if ($verify === true)
		{
			return_view('view.admin.php');
		}
	}
	public function main()
	{
		return_view('view.admin.php');
	}
}

?>