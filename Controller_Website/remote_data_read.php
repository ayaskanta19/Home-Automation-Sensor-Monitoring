<?php
	$file = fopen("remote_data", "r");
	$data = fread($file, filesize("remote_data"));
	fclose($file);
	echo $data;
?>