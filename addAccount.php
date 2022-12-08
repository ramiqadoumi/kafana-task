<?php
session_start();
require 'conn.php';
$balance = $_POST['balance'];
$curruncy = $_POST['curruncy'];

$availableBalance=$availableBalance+$balance;
$status="active";

$format = "Y-m-d\TH:i:s\Z";
$time = gmdate($format);

$accountNumber = rand(1000, 9999);
$email = $_SESSION['email'];
$userid = $_SESSION['ID'];

$query = "Select Amount from transaction_table where User_ID='$userid'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$amount = $row["Amount"];
$_SESSION['Amount']=$amount;
}
} else {
echo "0 results";
}
$availableBalance=$availableBalance+ $_SESSION['Amount'];
$result = mysqli_query($conn, "Select Account_Number , User_ID from  acccount_table where User_ID='$userid'");
$num = mysqli_num_rows($result);
if ($num == 0) {
mysqli_query($conn, "INSERT INTO acccount_table
VALUES ('','$userid',now(),'$time','$time', '$accountNumber', '$balance','$availableBalance','$curruncy','$status')");
header("Location:accounts.php");
} else {
echo "You have account";
}