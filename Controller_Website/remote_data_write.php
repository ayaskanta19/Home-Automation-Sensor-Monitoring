<?php
	$led = $_GET["led"];
	if($led == "reset") {
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
	}
	else {
		$filename = "";
		if($led == "red") $filename = "led_data_red";
		else if($led == "green") $filename = "led_data_green";
		else if($led == "yellow") $filename = "led_data_yellow";
		$file = fopen($filename, "r");
		$data = fread($file, filesize($filename));
		fclose($file);
		if($data == "0") $data = "1";
		else $data = "0";
		$file = fopen($filename, "w");
		fwrite($file, $data);
		fclose($file);
		$data = "";
		$file = fopen("led_data_red", "r");
		$data = $data.fread($file, filesize("led_data_red"));
		fclose($file);
		$file = fopen("led_data_green", "r");
		$data = $data.fread($file, filesize("led_data_green"));
		fclose($file);
		$file = fopen("led_data_yellow", "r");
		$data = $data.fread($file, filesize("led_data_yellow"));
		fclose($file);
		$file = fopen("remote_data", "w");
		fwrite($file, $data);
		fclose($file);
	}
	header("location: remote_control.html");
?>