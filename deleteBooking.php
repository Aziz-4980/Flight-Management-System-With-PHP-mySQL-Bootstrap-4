<?php
include_once 'database.php';
if(isset($_POST['delete']))
{	 
	 $booking = $_POST['email'];
	
	 $sql = "DELETE FROM Reserve WHERE email='$booking'";
	 
	 if($booking != ''){

	 
	 
	 if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully !";
        $msg = "All the bookings against ".$booking." "."is Deleted Sucessfully!";
	 echo "<script>alert('$msg');</script>";
        echo "<script>location.href = 'contactus.html';</script>";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 }else{
		echo '<script>alert("oops! you forgot to add email, Try entering a valid email address")</script>';
		echo "<script>location.href = 'contactus.html';</script>";

	}
	
	//  mysqli_close($conn);
}