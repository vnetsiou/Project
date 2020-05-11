<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: index.php");
    exit;  
}
include("dbcon.php");
$pass_id=$_SESSION["ID"];
$old = mysqli_real_escape_string($mysqli, $_POST['old']);
$new = mysqli_real_escape_string($mysqli, $_POST['new']);

if (!empty($_POST)){

    $query = 'UPDATE Teachers
            SET PASSWORD="'.$new.'" WHERE ID="' .$pass_id. '" ';
    $result = mysqli_query($mysqli, $query);

    if($mysqli->rows_affected==1)
    {
      $messege="Succesfully changed password";
    }
    else{
      $messege="Try again";
    }

}


mysqli_close($mysqli); 
?>
<html>

<body>
        <title>Teacher's Page</title>
        <link rel="stylesheet" type="text/css" href="/css/password.css">  
    
      <ul>
        <li><a href="account.php">Back</a></li>
        <li><a href="AddStudent.php">Add</a></li>
       	<li><a href="EditStudent.php">Edit</a></li>
        <li><a href="DeleteStudent.php">Delete</a></li>
        <li><a href="SearchStudent.php">Search</a></li>
        <li><a href="News.php">Ballet News</a></li>
      	<li><a href="account.php" ><?php echo htmlspecialchars($_SESSION["USERNAME"]); ?></a></li>
      	<li><a href="logout.php" >Log Out</a2></li></a></li>    	
      </ul>


      <div align="center" title="Change Password" class="container">
            <form action="" method="POST">
              <p name="label1">Change Password</p>
                <div class="form-input">
                 <input type="text" name="old" placeholder="Old Password" required>
              </div>
              
                <div class="form-input">
                    <input type="text" name="new" placeholder="New Password" required>
              </div>
             
              <input type="submit"  value="Done">
                
            </form>
             <p name="messege"><?php echo htmlspecialchars($add_messege); ?></p>
        </div>
        


</body>
   
</html>

