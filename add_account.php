<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Add Accounts</title>
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
               <h4>Add Account</h4>
               <form action="addAccount.php" method="POST">
                  <div class="row">
                     <div class="col-sm-6 p-3 ">
                        <label for="balance">Balance:</label>
                        <input type="number" class="form-control" id="balance" placeholder="Enter balance" name="balance" required>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-6 p-3 ">
                        <label for="currency">Currency:</label>
                        <input type="text" class="form-control" id="curruncy" placeholder="Currency" name="curruncy" required>
                     </div>
                     <br>
                  </div>
            </div>
            <center>
            <div class="row" >
            <div class="col-sm-6 p-3 ">
            <br>
            <button type="submit" class="btn btn-primary">Add Account</button>
            </div>
            </div>
            </center>
            </form>
         </div>
      </div>
      <footer class="container-fluid">
         <p></p>
      </footer>
   </body>
</html>