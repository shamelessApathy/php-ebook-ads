<?php 
require_once(HEADER);
$pageNext = $info['page-number'] +1;
$pagePrev = $info['page-number'] -1;
var_dump($info);
?>

<h3>You are in book view</h3>
<?php if ($pagePrev != 0):?>
<a href="<?php echo '/ebook/view/' . $pagePrev;?>">Previous</a>
<?php endif;?>
<img style='max-width:400px;' src="<?php echo '/ebookfiles/SD-book/' . $info['page']; ?>" />
<a href="<?php echo '/ebook/view/' . $pageNext;?>">Next</a>
