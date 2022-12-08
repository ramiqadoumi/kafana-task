<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Transaction</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="basicStyle.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
               <h4>Transaction</h4>
               <div class="row">
                  <div class="col-sm-5 p-3 ">
                     <h4>Debit</h4>
                     <form action="DebitTransactions.php" method="POST">
                        <label for="amount">Amount:</label>
                        <input type="number" class="form-control" id="amount" placeholder="Enter balance" name="amount" required min="0"><br>
                        <label for="currency">Currency:</label>
                        <input type="text" class="form-control" id="curruncy" placeholder="Currency" name="curruncy" required><br>
                        <label for="credit">Credit:</label>
                        <input type="radio" name="credit" value="true" id="true">
                        <label for="true">True</label>
                        <input type="radio" name="credit" value="false" id="false">
                        <label for="false">False</label>
                        <br>
                        <center><button type="submit" class="btn btn-primary">Debit</button></center>
                     </form>
                  </div>
                  <div class="col-sm-5 p-3 ">
                     <h4>Withdraw</h4>
                     <form action="WithdrawTransaction.php" method="POST">
                        <label for="amount">Amount:</label>
                        <input type="number" class="form-control" id="amount" placeholder="Enter balance" name="amount" required min="0"><br>
                        <label for="currency">Currency:</label>
                        <input type="text" class="form-control" id="curruncy" placeholder="Currency" name="curruncy" required><br>
                        <label for="creditw">Credit:</label>
                        <input type="radio" name="creditw" value="true" id="truew">
                        <label for="truew">True</label>
                        <input type="radio" name="creditw" value="false" id="falsew">
                        <label for="falsew">False</label>
                        <br>
                        <center><button type="submit" class="btn btn-primary">Withdraw</button></center>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <footer class="container-fluid">
         <p></p>
      </footer>
   </body>
</html>