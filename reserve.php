<?php
include_once 'database.php';
if (isset($_POST['save'])) {


	$fname = $_POST['firstName'];
	$lname = $_POST['lastName'];
	$email = $_POST['email'];
	$from = isset($_POST['from']) ? $_POST['from'] : '';
	$too = isset($_POST['too']) ? $_POST['too'] : '';
	$nSeats = isset($_POST['nSeats']) ? $_POST['nSeats'] : 0;
	$class = $_POST['options'];
	$date = $_POST['Date'];
	$time = $_POST['Time'];

	if ($from == 'Karachi' && $too == 'Islamabad') {
		$flightRegNo = 'pk-300';
	} else if ($from == 'Karachi' && $too == 'Lahore') {
		$flightRegNo = 'pk-747';
	} else if ($from == 'Islamabad' && $too == 'Karachi') {
		$flightRegNo = 'pk-600';
	} else if ($from == 'Islamabad' && $too == 'Lahore') {
		$flightRegNo = 'pk-80';
	} else if ($from == 'Lahore' && $too == 'Karachi') {
		$flightRegNo = 'pk-850';
	} else if ($from == 'Lahore' && $too == 'Islamabad') {
		$flightRegNo = 'pk-4980';
	}

	if ($fname != '' and $lname != '' and $email != '' and $from != '' and $too != '' and $nSeats != 0	 and $class != '' and $date != '' and $time != '') {
		if ($from != $too) {
			$sql = "INSERT INTO Reserve (firstName,lastName,email,departure,arrival,totalSeats,section,FlightRegNo,rdate,rtime)
	 VALUES ('$fname','$lname','$email','$from','$too',$nSeats,'$class','$flightRegNo','$date','$time')";
			if (mysqli_query($conn, $sql)) {
				// echo "New record created successfully !";

				$sql1 = "INSERT INTO user (firstName,lastName,email)
				VALUE ('$fname','$lname','$email')";

				if (mysqli_query($conn, $sql1)) {
					// echo "New record created successfully !";



				//	echo "<script>location.href = 'index.html';</script>";
				} else {
					$error = "Error: " . $sql1 . "
	" . mysqli_error($conn);
						if($error){
							$msg = "Welcome Back ! Mr/MRs: " .$lname ." your seat is registered";
							echo "<script>alert('$msg');</script>";
							echo "<script>location.href = 'index.html';</script>";

						}
						
				}


			echo "<script>location.href = 'index.html';</script>";
			} else {
				echo "Error: " . $sql . "
				" . mysqli_error($conn);
			}
		} else {
			echo '<script>alert("destination and arrival airports cannot be same")</script>';
			echo "<script>location.href = 'index.html';</script>";
		}
	} else {
		echo '<script>alert("All fields are compulsary please re-enter values!")</script>';
		echo "<script>location.href = 'index.html';</script>";
	}


	



} //  mysqli_close($conn);
