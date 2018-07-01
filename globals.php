<?php
function return_view($view, $info =null) 
{
	require(VIEWS . '/' . $view);
	$info = $info;
}
?>