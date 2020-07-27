<?php
include_once 'database.php';
if (isset($_POST['profileUpdate'])) {
    $pEmail = $_POST['pemail'];
    $nEmail = $_POST['nemail'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];


    $sql = "UPDATE user SET email = '$nEmail', firstName = '$fname', lastName =' $lname 'WHERE email = $pEmail";
    
    
    if($pEmail != '' and $nEmail != '' and $fname != '' and $lname != ''  ){

	 
	 
        if (mysqli_query($conn, $sql)) {
          
           $msg = "The Profile against ".$pEmail." "."is Updated Sucessfully!";
        echo "<script>alert('$msg');</script>";
           echo "<script>location.href = 'contactus.html';</script>";
        } else {
           echo "Error: " . $sql . "
   " . mysqli_error($conn);
        }
        }else{
           echo '<script>alert("All Fields are mandatory")</script>';
           echo "<script>location.href = 'contactus.html';</script>";
   
       }







}
