<?php
	$data = $_GET["data"];
	$file = fopen("sensor_data", "a");
	fwrite($file, "\n".$data);
	fclose($file);
?>