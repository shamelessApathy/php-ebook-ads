<?php
require_once(GLOBALS);

class ebookController {
	
	public function view($page = null)
	{
		$directory = ROOT . "/ebookfiles/SD-book";
		$test = scandir($directory);
		array_shift($test);
		array_shift($test);
		if (isset($page) && $page != null)
		{
			// set page  number to be passed before changing it
			$pageNum = $page;
			$page = $page -1;
			$current = $test[$page];

			$info_array = array("page" => $current, "page-number"=>$pageNum);
			return_view('view.book.php', $info_array);
		}
		else
		{
			$info_array = array("page" => $test[0], "page-number" => 1);
			return_view('view.book.php', $info_array);
		}
		
	}
}