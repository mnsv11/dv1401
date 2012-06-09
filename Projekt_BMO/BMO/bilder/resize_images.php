<?php
include('Class_Resize_Image.php');

function readDirectory($aPath) {
  $list = Array();
  if(is_dir($aPath)) {
    if ($dh = opendir($aPath)) {
      while (($file = readdir($dh)) !== false) {
        if(is_file("$aPath/$file") && $file != '.htaccess') {
          $list[$file] = "$file";
        }
      }
      closedir($dh);
    }
  }
  sort($list, SORT_STRING);
  return $list;
}


// Is GD enabled on the system?
if(function_exists('gd_info')) {
	echo "<p>GD is enabled<pre>";
	print_r(gd_info());
	echo "</pre>";
} else {
	echo "GD is not enabled";
}

// Rescale all images in current directory (777) to these sizes ($scale) and stores them in own directory
$scale = Array(550, 250, 80);

if(!(isset($_GET['doit']) || (isset($argv) && $argv[1] == 'doit'))) {
	echo "<p>Resizing all images in this directory, saving a copy of them in separate directories.<pre>";
	print_r($scale);
	echo "</pre><p>You may want to run this on command line instead, it will take some time.";
	echo "<p><a href='?doit'>Do It</a>";
	exit;
}

$dir = dirname(__FILE__);
$files = readDirectory($dir);

foreach($scale as $val) {

	if(!is_dir($val)) {
		mkdir($val);
	}
	$image = new Resize_Image;
	$image->ratio 			= true; 
	$image->save_folder = "$val/";

	foreach($files as $file) {
		$pathParts = pathinfo("$dir/$file");
		$extension = isset($pathParts['extension']) ? strtolower($pathParts['extension']) : '-';

		if(is_file("$dir/$file") && $extension != 'php') {	
			$image->image_to_resize = "$dir/$file";
			$image->new_image_name =$pathParts['filename'];
			if(!is_file($dir . "/" . $image->save_folder . $file)) {
				$image->new_width 	= $val;
				$image->new_height 	= (float)$val * 0.75;			
				$process = $image->resize();
				if($process['result']) {
					echo "<p>Created new image ({$process['new_file_path']}).";
				} else {
					echo "<p>Failed to resize image <code>$dir/$file</code>.";
				}
			} else {
				echo "<p>File exists, not converted: <code>{$image->save_folder}{$image->new_image_name}."; 
			}
		}		
	}
}


?>