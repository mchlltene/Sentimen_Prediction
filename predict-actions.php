<?php
	function run_python_command() {
		$email      = $_POST['email'];
		$datetime   = $_POST['datetime'];
		$id         = $_POST['id'];
		$size       = $_POST['size'];
		$rating     = $_POST['rating'];
		
		//echo "email : ".$email;
		//echo "datetime : ".$datetime;
		//echo "id : ".$id;
		//echo "size : ".$size;
		//echo "rating : ".$rating;
		
		print_r($_POST);
		
		$command = escapeshellcmd("python predictor.py $id $size $rating");
		$output = shell_exec($command);
		echo $output;
	}

	# execute python
	run_python_command();

?>