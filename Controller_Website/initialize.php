<?php
	$file = fopen("led_data_red", "w");
	fwrite($file, "0");
	fclose($file);
	$file = fopen("led_data_green", "w");
	fwrite($file, "0");
	fclose($file);
	$file = fopen("led_data_yellow", "w");
	fwrite($file, "0");
	fclose($file);
	$file = fopen("remote_data", "w");
	fwrite($file, "000");
	fclose($file);
	$file = fopen("sensor_data", "w");
	fclose($file);
	echo "SYSTEM INITIALIZED";
?>