<?php 
require 'torrent.php';
$torr = new Torrent('Concussion.2015.1080p.BluRay.H264.AAC-RARBG-[rarbg.com].torrent');
echo $torr->name();
echo "<br />";
var_dump($torr->content());
$arr = json_encode($torr->content());
echo $arr;
/* foreach ($arr as $key => $vari) {
	if (strpos( $key, 'mp4') == true) {
		echo $key;
		$filename = $key;
		break;
	}else{
		echo "no";
	}
	
}*/

?>