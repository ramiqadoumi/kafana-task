<?php
   include 'conn.php';
   session_start();
   $userid=$_SESSION['ID'];
   $result = @mysqli_query($conn, "SELECT * FROM user_table") or die("Error: " . mysqli_error($conn));
   
   if (isset($_POST['chk_id'])) {
       $arr = $_POST['chk_id'];
       foreach ($arr as $id) {
         mysqli_query($conn, "DELETE FROM user_table WHERE id = " . $id);
         mysqli_query($conn, "DELETE FROM acccount_table WHERE User_ID = " . $id);
       }
       $msg = "Deleted Successfully!";
       header("Location: users.php");
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Users</title>
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
               <?php  require_once 'conn.php';
                  $email = $_SESSION['email'];
                  
                  $result = $conn->query("SELECT img FROM user_table where email='$email'");
                  ?>
               <?php if ($result->num_rows > 0) {?>
               <div class="gallery">
                  <?php while ($row = $result->fetch_assoc()) {?>
                  <center> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>"
                     width="70px"
                     height="70px"
                     style="border-radius: 50%; margin: 10px;"
                     alt="No Selected Image"
                     /> </center>
                  <?php }?>
               </div>
               <?php } else {?>
               <center> <img src=""
                  width="70px"
                  height="70px"
                  style="border-radius: 50%; margin: 10px;"
                  /> </center>
               <?php }?>        <?php
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
            </div>
            <div class="col-sm-9">
               <br>
               <h4>Users</h4>
               <?php
                  $sqlk = "SELECT ID,First_Name,Last_Name,Last_Login_DateTime_UTC,email FROM user_table";
                  $result = $conn->query($sqlk);?>
               <form action="users.php" method="post">
                  <?php if (isset($_GET['msg'])) {?>
                  <p class="alert alert-success"><?php echo $_GET['msg']; ?></p>
                  <?php }?>
                  <table class="table table-striped table-hover">
                     <thead>
                        <tr>
                           <th>check</th>
                           <th> ID</th>
                           <th>First Name</th>
                           <th>Last Name</th>
                           <th>Last Login</th>
                           <th>Email</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                           <td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['ID']; ?>"/></td>
                           <td><?php echo $row['ID']; ?></td>
                           <td><?php echo $row['First_Name']; ?></td>
                           <td><?php echo $row['Last_Name']; ?></td>
                           <td><?php echo $row['Last_Login_DateTime_UTC']; ?></td>
                           <td><?php echo $row['email']; ?></td>
                        </tr>
                        <?php }?>
                     </tbody>
                  </table>
                  <center><input id="submit" name="submit" type="submit" class="btn btn-danger" value="Delete Selected User(s)" /></center>
               </form>
               <br>
               <h4>Select your profile image:</h4>
               <form action="uploadimg.php" method="post" enctype="multipart/form-data">
                  <label>Upload Image:</label>
                  <input type="file" name="image" >
                  <br>
                  <input type="submit" name="submit" value="Upload Image" class="btn btn-primary">
               </form>
            </div>
         </div>
      </div>
      <footer class="container-fluid">
      </footer>
      <script src="js/jquery-1.10.2.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
             $('#chk_all').click(function(){
                 if(this.checked)
                     $(".chkbox").prop("checked", true);
                 else
                     $(".chkbox").prop("checked", false);
             });
         });
         
         $(document).ready(function(){
             $('#delete_form').submit(function(e){
                 if(!confirm("Confirm Delete?")){
                     e.preventDefault();
                 }
             });
         });
      </script>
   </body>
</html>