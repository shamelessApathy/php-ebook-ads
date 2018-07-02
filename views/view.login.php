<?php
require_once(HEADER);
?>
<div class='container'>
	<h3 style='text-align:center;'>PHP Ebook Ads Tool</h3>
	<h4 style='text-align:center;'>Login Area</h4>
	<form action="/admin/verify" name="login" method="POST">
		<label>User</label><br>
		<input type='text' name='username' placeholder='username'/><br>
		<label>Password</label><br/>
		<input type='password' name='password'/><br/>
		<button type='submit'>Login</button><br>
	</form>
</div>