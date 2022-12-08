<?php
require 'conn.php';
session_start();

$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pwd = $_POST['pwd'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$status = $_POST['status'];

$fname1 = ucfirst($fname);
$lname1 = ucfirst($lname);

$format = "Y-m-d\TH:i:s\Z";
$time = gmdate($format);

$result = mysqli_query($conn, "Select * from user_table where email='$email'");
$num = mysqli_num_rows($result);

if ($num == 0) {
    mysqli_query($conn, "INSERT INTO user_table
     VALUES ('','',now(),'$time','$time','$time', '$email', '$pwd','$fname1','$lname1','$status','$gender','$dob')");
    header("Location:users.php");
} else {
    echo " alredy taken";
}
$_SESSION['email'] = $email;
$_SESSION['fname'] = $fname;

$query = "Select First_Name from user_table where email='$email'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fname = $row["First_Name"];
        $userid = $row["ID"];

        $_SESSION['First_Name'] = $fname;
        $_SESSION['ID'] = $userid;

    }
}
