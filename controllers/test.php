<?php

class testController {


	public function create_preview_images() 
	{
		$file_name = "FinalStonedick.pdf";
		echo "before base strip " . $file_name . "<br>";
	    // Strip document extension
	    $file_name = basename($file_name, '.pdf');
	    echo "after base : " . $file_name . "<br>";

	    // Convert this document
	    // Each page to single image
	    $file_path = "/var/www/php-ebook-ads/controllers/" . $file_name . ".pdf";
	    echo $file_path;
	    $img = new Imagick($file_path);
	    // Set background color and flatten
	    // Prevents black background on objects with transparency
	    $img->setImageBackgroundColor('white');
	    $img = $img->flattenImages();

	    // Set image resolution
	    // Determine num of pages
	    $img->setResolution(300,300);
	    $num_pages = $img->getNumberImages();

	    // Compress Image Quality
	    $img->setImageCompressionQuality(100);
	    $i = 0;
	    $img->setImageIndex(0);
	    $img->setImageFormat('jpeg');
	    $writePath = "/var/www/php-ebook-ads/controllers/split/" . $file_name . '-new' .$i.'.jpg';   
	    $img->writeImage($writePath);
	    // Convert PDF pages to images
	    /*for ($i = 0;$i < $num_pages; $i++) 
	    {         

	        // Set iterator postion
	        $img->setIteratorIndex($i);

	        // Set image format
	        $img->setImageFormat('jpeg');

	        // Write Images to temp 'upload' folder  
	        $writePath = "/var/www/php-ebook-ads/controllers/split/" . $file_name . '-' .$i.'.jpg';   
	        $img->writeImage($writePath);
	    *}*/

	    $img->destroy();
	}
	public function split()
	{
		$this->create_preview_images();
	}
}
?>