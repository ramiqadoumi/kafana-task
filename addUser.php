<?php
require 'conn.php';

$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pwd = $_POST['pwd'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$status = $_POST['status'];

$format = "Y-m-d\TH:i:s\Z";
$time = gmdate($format);

$fname1 = ucfirst($fname);
$lname1 = ucfirst($lname);

$result = mysqli_query($conn, "Select * from user_table where email='$email'");
$num = mysqli_num_rows($result);

if ($num == 0) {
    mysqli_query($conn, "INSERT INTO user_table
     VALUES ('','',now(),'$time','$time','$time', '$email', '$pwd','$fname1','$lname1','$status','$gender','$dob')");
    header("Location:users.php");

} else {
    echo "email alredy taken";
}
