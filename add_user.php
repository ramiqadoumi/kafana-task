<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Add User</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="basicStyle.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     
   </head>
   <body>
      <div class="container-fluid">
         <div class="row content">
            <div class="col-sm-3 sidenav">
               <?php
                  session_start();
                  require 'conn.php';
                  $fname = $_SESSION['First_Name'];
                  echo "<h2>" . "Welcome " . $fname . "</h2>";
                  ?>
               <ul class="nav nav-pills nav-stacked">
                  <li class=""><a href="users.php">Users</a></li>
                  <li><a href="accounts.php">Accounts</a></li>
                  <li><a href="transactionst.php">Transactions</a></li>
                  <li><a href="add_user.php">Add user</a></li>
                  <li><a href="add_account.php">Add account</a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
               </ul>
               <br>
            </div>
            <div class="col-sm-9">
               <br>
               <h4>Add Users</h4>
               <form action="addUser.php" method="POST">
                  <div class="row">
                     <div class="col-sm-12 p-3 ">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-6 p-3 ">
                        <label for="fname">First name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="First name" name="fname" required>
                     </div>
                     <div class="col-sm-6 p-3 ">
                        <label for="lname">Last name:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Last name" name="lname" required>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-6 p-3 "><label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                     </div>
                     <div class="col-sm-6 p-3 "><label for="pwd">Date of birth:</label>
                        <input type="date" class="form-control" id="dob" placeholder="Date of birth" name="dob" required>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-12 p-3 ">
                        <label for="status">Status:</label>
                        <input type="radio" name="status" value="single" id="single" required>
                        <label for="single">Single</label>
                        <input type="radio" name="status" value="married" id="married" required>
                        <label for="married">Married</label>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-12 p-3 ">
                        <label for="gender">Gender:</label>
                        <input type="radio" name="gender" value="male" id="male" >
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="female" id="female">
                        <label for="female">Female</label>
                     </div>
                  </div>
                  <br>
                  <center>
                     <div class="row" >
                        <div class="col p-3 ">
                           <button type="submit" class="btn btn-primary">Add user</button>
                        </div>
                     </div>
                  </center>
               </form>
            </div>
         </div>
      </div>
      <footer class="container-fluid">
         <p></p>
      </footer>
   </body>
</html>