<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sensor_feedback</title>
	<link rel="stylesheet" type="text/css" href="feedback_style.css">
</head>
<body class="wall">
	<?php
		error_reporting(0);
		$file = fopen("sensor_data", "r");
		$data = fread($file, filesize("sensor_data"));
		$arr = explode("\n", $data);
		$total = 0;
		foreach($arr as $key => $reading)
			$total += $reading;
		fclose($file);
		if($reading == "" || $key == 0) {
			echo '<span class="desc">SENSOR READING: </span><span class="data">?</span><br>';
			echo '<span class="desc">SENSOR READING STATISTICS: </span><span class="data">0</span><br>';
			echo '<span class="desc">AVERAGE SENSOR READING: </span><span class="data">?</span>';
		}
		else {
			echo '<span class="desc">SENSOR READING: </span><span class="data">'.$reading.'</span><br>';
			echo '<span class="desc">SENSOR READING STATISTICS: </span><span class="data">'.$key.'</span><br>';
			echo '<span class="desc">AVERAGE SENSOR READING: </span><span class="data">'.($total / $key).'</span>';
		}
	?>
</body>
</html>