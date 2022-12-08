<?php
session_start();
require 'conn.php';
$accountNumber;
$availableBalance;
$finalacc;
$finalavialable;
$amount = $_POST['amount'];
$curruncy = $_POST['curruncy'];
$Is_credit = $_POST['credit'];
$format = "Y-m-d\TH:i:s\Z";
$time = gmdate($format);
$email = $_SESSION['email'];
$userid = $_SESSION['ID'];

$query = "Select Account_Number from acccount_table where User_ID='$userid'";
$query2 = "Select Available_Balance from acccount_table where User_ID='$userid'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $accountNumber = $row['Account_Number'];
        $_SESSION['Account_Number'] = $accountNumber;
        $finalacc = $_SESSION['Account_Number'];

    }
} else {

    echo '<script>alert("you dont have account")</script>';
    header('Location:add_account.php');

}

$result2 = $conn->query($query2);

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $availableBalance = $row['Available_Balance'];
        $_SESSION['Available_Balance'] = $availableBalance;
        $finalavialable = $_SESSION['Available_Balance'] + $amount;

    }
} else {
    echo "0 results";
}

mysqli_query($conn, "UPDATE acccount_table set Available_Balance=$finalavialable where User_ID=$userid");

mysqli_query($conn, "INSERT INTO transaction_table
VALUES ('','$userid',$finalacc,now(),'$time', '$Is_credit','$amount','$curruncy')");
header('Location:accounts.php');
