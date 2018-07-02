<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null):?>
<?php require_once(HEADER);?>

<div class='container'>
	<h3 style='text-align:center;'>Logged into Admin Area of Ebook Ads Tool</h3>
	<div class='ad-template-container'>
		<div class='ad-template-top ad-temp'><div class='ad-modal'>Stuff in here</div><p style='text-align:center;'>Top Ad Section</p></div>
		<div class='ad-sidebar-contaner'>
			<div class='ad-sidebar-left ad-temp'>
				<div class='ad-modal'>Stuff in here</div>
			</div>
			<div class='ad-sidebar-right ad-temp'>
				<div class='ad-modal'>Stuff in here</div>
			</div>
							<div class='ebook-form-container'>
					<form name='ebook-form' action='/ebook/upload' method="POST" enctype="multipart/form-data">
						<label>EBook</label><br>
						<input type='file' name='ebook' placeholder='Choose Ebook File'/><br>
						<button type='submit'>Upload</button>
					</form>
				</div>
			<div style='clear:both; float:none; width:100%;'></div>
		</div>
		<div class='ad-template-bottom ad-temp'>
			<div class='ad-modal'>Stuff in here</div>
			<p style='text-align:center'>Bottom Ad Template</p>
		</div>
	</div>
</div>

<script src="/assets/js/admin-ads.js" type='text/javascript' rel='javascript'></script>
<?php else: ?>
<h1>Need to be logged in</h1>
<?php endif;?>