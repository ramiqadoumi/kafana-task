<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Accounts</title>
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
               <h4>Accounts</h4>
               <?php
                  $sqlk = "SELECT ID,User_ID,Account_Number,Available_Balance,Currency,Status FROM acccount_table";
                  $result = $conn->query($sqlk);?>
               <table class="table table-striped table-hover">
                  <thead>
                     <tr>
                        <th>Account ID</th>
                        <th>User ID</th>
                        <th>Account Number</th>
                        <th>Available Balance</th>
                        <th>Currency</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php while ($row = mysqli_fetch_assoc($result)) {?>
                     <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['User_ID']; ?></td>
                        <td><?php echo $row['Account_Number']; ?></td>
                        <td><?php echo $row['Available_Balance']; ?></td>
                        <td><?php echo $row['Currency']; ?></td>
                        <td><?php echo $row['Status']; ?></td>
                     </tr>
                     <?php }?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <footer class="container-fluid">
         <p></p>
      </footer>
   </body>
</html>