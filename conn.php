<?php
$conn = mysqli_connect('localhost', 'rami', 'rami', 'jobtask');
if (!$conn) {
    echo "erorr".mysqli_connect_errno();
    exit;
}
?>