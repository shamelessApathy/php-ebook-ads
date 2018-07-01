<?php require_once(HEADER);?>
<div class='container'>
<h3 style='text-align:center;'>PHP EBook Ads Tool</h3>
	<form action='/admin/new_user' method='POST'>
		<label>Username</label><br>
		<input type='text' name='username' placeholder='username'/><br>
		<label>Email</label><br>
		<input type='text' name='email' placeholder='email'/><br>
		<label>Password</label><br>
		<input type='password' name='password1' placeholder='Password'/><br>
		<label>Confirm Password</label><br>
		<input type='password' name='password2' placeholder='Password'/><br>
		<button type='submit'>Create</button>
	</form>
</div>