<?php
session_start();
#if we are not logged in->auto redirectin to log in page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: index.php");
    exit;
}

include("dbcon.php");
mysqli_close($mysqli); 
?>

<html>
    <body>
        <title>My Account</title>
        <link rel="stylesheet" type="text/css" href="/css/account.css">

        <ul>
            <li><a href="teacher.php">Back</a></li>
            <li><a href="AddStudent.php">Add</a></li>
            <li><a href="EditStudent.php">Edit</a></li>
            <li><a href="DeleteStudent.php">Delete</a></li>
            <li><a href="SearchStudent.php">Search</a></li>
            <li><a href="News.php">Ballet News</a></li>
            <li><a href="account.php" ><?php echo htmlspecialchars($_SESSION["USERNAME"]); ?></a></li>
            <li><a href="logout.php" >Log Out</a2></li></a></li>
        </ul>


        <div align="center" class="container"> 
            <p name="heading">My Account Info</h1>        
            <p>ID: <?php echo htmlspecialchars($_SESSION["ID"]); ?></p>
            <p>Name: <?php echo htmlspecialchars($_SESSION["NAME"]); ?></p>
            <p>Surname: <?php echo htmlspecialchars($_SESSION["SURNAME"]); ?></p>
            <p>Username: <?php echo htmlspecialchars($_SESSION["USERNAME"]); ?></p>
            <p>E-mail: <?php echo htmlspecialchars($_SESSION["EMAIL"]); ?></p>
            <a name="pass" href="changepassword.php" >Change Password</a>
        </div>
    </body>
</html>