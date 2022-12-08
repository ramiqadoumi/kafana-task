
<?php
session_start();

require 'conn.php';

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$_SESSION['email']=$email;

$query = "Select First_Name , ID from user_table where email='$email'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fname = $row["First_Name"];
        $userid = $row["ID"];
        
        $_SESSION['First_Name']=$fname;
        $_SESSION['ID']=$userid;

        
    }
} 

$format2 = "Y-m-d\TH:i:s\Z";
$time2 = gmdate($format2);

$result=mysqli_query($conn,"Select * from user_table where email='$email' and password='$pwd'");
$num=mysqli_num_rows($result);
if($num>0){
    mysqli_query($conn,"UPDATE user_table set Last_Login_DateTime_UTC ='$time2' WHERE email='$email'");
   header('Location:users.php');

}
else{
    echo "invalid email or password";
}


?>