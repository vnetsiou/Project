<?php
	session_start();
	#check if we are already logged in
	if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){
    	header("location: teacher.php");
    exit;
	}
	include("dbcon.php");

	#take info from post
	$username_2 = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password_2 = mysqli_real_escape_string($mysqli,$_POST['password']);

	# if post isnt empty
	if (!empty($_POST)){
	#write and run query	
		$query = sprintf("SELECT * FROM Teachers WHERE USERNAME='$username_2' AND PASSWORD='$password_2'");
		$result = mysqli_query($mysqli, $query);
		$count = mysqli_num_rows($result);
		#if you find sth
        if($count!=0) {
            $row = mysqli_fetch_array($result);
		  	session_start();
		  	#write it to session variables and redirect to another page
		  	$_SESSION["loggedin"] = true;
		  	$_SESSION["ID"]=$row['ID'];
		  	$_SESSION["NAME"]=$row['NAME'];
		  	$_SESSION["SURNAME"]=$row['SURNAME'];
		  	$_SESSION["USERNAME"] = $row['USERNAME']; 
		  	$_SESSION["PASSWORD"]= $row['PASSWORD']; 	
		  	$_SESSION["EMAIL"]= $row['EMAIL']; 	
		   	header('Location:teacher.php');
		}
		else{
			#else throw messege
			$messege="Invalid username or password. Try again!";
		}
	}	
	mysqli_close($mysqli); 
?>

<html>

    <body>    
    	<title>Login Page</title>
    	<link rel="stylesheet" type="text/css" href="/css/main.css">	
    	<script src="index.js"></script>	
       	<ul>
	        <li><p>Add</p></li>
	        <li><p>Edit</p></li>
	        <li><p>Delete</p></li>
	        <li><p>Search</p></li>
	        <li><p>Log Out</p></li>

        </ul>
        <div class="container">


            <form action="" method="POST">
            	<p name="label1">Welcome...</p>
            	<div class="form-input">
            		<input type="text" name="username" placeholder="username" required>
            	</div>
                <div class="form-input">
                	<input type="password" name="password" placeholder="password" required>
                </div> 
                <button type="submit" class="btn-login" onclick=""><span>Log In</span></button>
                <p name="messege"><?php echo htmlspecialchars($messege); ?></p>
      
            </form>



        </div>
    </body>

</html>