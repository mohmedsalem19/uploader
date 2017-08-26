<?php 
if (isset($_POST["upload"])) {
	$filesname = $_FILES["torrent"]["name"];
	$filesize = $_FILES["torrent"]["size"];
	$filetype = $_FILES["torrent"]["type"];
	$filetmp = $_FILES["torrent"]["tmp_name"];
	$namemody = str_replace(' ', '*', $filesname);

	if ($filetype == 'application/x-bittorrent') {
		 $newdir = '../torrentit/torrents/' .$filesname;
		 if (move_uploaded_file($filetmp, $newdir)) {
		 	header('Location: http://127.0.0.1:3000/torrent/' .$namemody);    
		 }else{
		 	echo 'error' ;
		 }
	}else{
		return 'please upload a torrent file';
	}

	//echo $filesname .' ' .$filesize .' ' .$filetype .' ' .$filetmp;
}

if (isset($_GET['torrent'])) {
	$filetor = $_GET['torrent'];
	$newmody = str_replace('*', ' ', $filetor);
	$mafile = '../torrentit/torrents/' .$newmody;
	if (is_file($mafile)) {
		require 'torrent.php';
		$torr = new Torrent($mafile);
		//echo $torr->name();
		//echo "<br />";
		//var_dump($torr->content());
		$newarr = array();
		$arr = $torr->content();
		$i = 0;
		foreach ($arr as $key => $value) {
			$newarr[$i] = $key;
			$i++;
		}
		$decoded = json_encode($newarr);
		echo $decoded;
	}else{
		echo "no such file";
	}
}

if (isset($_GET['torrentsize'])) {
	$filetor = $_GET['torrentsize'];
	$newmody = str_replace('*', ' ', $filetor);
	$mafile = '../torrentit/torrents/' .$newmody;
	if (is_file($mafile)) {
		require 'torrent.php';
		$torr = new Torrent($mafile);
		echo $torr->size();
	}else{
		echo "no such file";
	}
}

if (isset($_GET['getsize'])) {
	$filetoupload = $_GET['getsize'];
	$filesearch = $_GET['torrento'];
	$mafile = '../torrentit/torrents/' .$filesearch;
	if (is_file($mafile)) {
		require 'torrent.php';
		$torr = new Torrent($mafile);
		//echo $torr->name();
		//echo "<br />";
		//var_dump($torr->content());
		//$newarr = array();
		$arr = $torr->content();
		/*$i = 0;
		foreach ($arr as $key => $value) {
			$newarr[$i] = $key;
			$i++;
		}
		$decoded = json_encode($newarr);
		echo $decoded;*/
		$replaced = str_replace('/', "\\", $filetoupload);
		$newvary = strval($replaced);
		//echo $filetoupload;
		//var_dump($arr);
		echo $arr[$replaced];
		//var_dump($arr);
		//echo @$arr[$replaced];
	}else{
		echo "no such file";
		//echo $filesearch;
	}
	//echo $_GET['getsize'];
}

//var_dump($_GET);
?>