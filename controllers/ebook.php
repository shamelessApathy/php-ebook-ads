<?php
require_once(GLOBALS);

class ebookController {
	
//for .docx
//$text = shell_exec('/usr/local/bin/docx2txt.pl ' . 
//    escapeshellarg($docxFilePath) . ' -');
	public function upload()
	{
		$file = $_FILES['ebook'];
		if ($file['type'] === "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
		{
			$name = $file['tmp_name'];
			$splode = explode('/', $name);
			$newName = $splode[1] . ".docx";
			$actualName = $file['name'];
			$splodeExt = explode(".",$actualName);
			$length = count($splodeExt) - 1;
			$ext = $splodeExt[$length];
			echo $ext . "<br>";
			echo $length . "<br>";
			var_dump($splodeExt);
			echo "<br>". $actualName;
			$actualName = time() . $actualName;
			echo "<br> $actualName";
			$fileName = "/var/www/php-ebook-ads/ebookfiles/".  $actualName;
			// USe of is_uploaded_file is to check and make sure it's from a POST digital uplaod not from malicious script
			$test = move_uploaded_file($_FILES["ebook"]["tmp_name"], "/var/www/php-ebook-ads/ebookfiles/" . $actualName);
			if ($test === true)
			{
				$text = shell_exec('/usr/local/bin/docx2txt.pl ' . escapeshellarg($filename) . ' -');
				var_dump($text);
			}
		}
	}
}