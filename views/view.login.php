<?php
require_once(HEADER);
?>
<div class='container'>
	<form action="/admin/verify" name="login" method="POST">
		<label>User</label><br>
		<input type='text' name='username' placeholder='username'/><br>
		<label>Password</label><br/>
		<input type='password' name='password'/><br/>
		<button type='submit'>Login</button><br>
		<a href="/admin/create">Create User</a>
	</form>
</div>