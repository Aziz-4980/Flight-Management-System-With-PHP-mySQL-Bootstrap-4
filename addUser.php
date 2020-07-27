<?php
include_once 'database.php';
if (isset($_POST['adduser'])) {

    $email = $_POST['email'];
    $fname =  $_POST['fname'];
    $lname =  $_POST['lname'];


    if ($email != '' and $fname != '' and $lname != '') {

        $sql = "INSERT INTO user (email,firstName,lastName)
        VALUE ('$email','$fname','$lname')";

        if (mysqli_query($conn, $sql)) {
            // echo "New record created successfully !";
            echo '<script>alert("Record Entered Successfully!")</script>';



            echo "<script>location.href = 'admin.html';</script>";
        } else {
            $error = "Error: " . $sql1 . "
" . mysqli_error($conn);
            if ($error) {
                $msg = "The User is Already Registered with email : " . $email;
                echo "<script>alert('$msg');</script>";
                echo "<script>location.href = 'admin.html';</script>";
            }
        }
    } else if ($email == '' and $fname == '' and $lname == '') {
        echo '<script>alert("All fields are compulsary please re-enter values!")</script>';
        echo "<script>location.href = 'admin.html';</script>";
    }
}
