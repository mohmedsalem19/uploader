<?php

function folderSize ($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;
}

$folder = '../torrentit/' .$_GET['folder'];
$total = $_GET['orgin'];
if (is_file($folder)) {
	$sizee = filesize($folder);
	$calced =  $sizee;
	$qesma = $calced / $total;
	$nesba = $qesma * 100;
	//echo round($nesba, 3);
	echo $nesba;
}

if (is_dir($folder)) {
	$foldersize  = folderSize($folder);
	$calced =  $foldersize;
	$qesma = $calced / $total;
	$nesba = $qesma * 100;
	echo $nesba;
}


 ?>