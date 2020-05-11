<?php
session_start();
#redirection to login page if we are not logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: index.php");
    exit;
}
     include("dbcon.php");
     #info from post
     $name = mysqli_real_escape_string($mysqli, $_POST['name']);
     $surname = mysqli_real_escape_string($mysqli, $_POST['surname']);
     $fathername = mysqli_real_escape_string($mysqli, $_POST['fathername']);
     $grade = mysqli_real_escape_string($mysqli, $_POST['grade']);
     $mobilenumber = mysqli_real_escape_string($mysqli, $_POST['mobilenumber']);
     $birthday = mysqli_real_escape_string($mysqli, $_POST['birthday']);

  if (!empty($_POST)){ 
    $query = "INSERT INTO Students(NAME,SURNAME,FATHERNAME,GRADE,MOBILENUMBER,Birthday) 
    			VALUES ('".$_POST["name"]."','".$_POST["surname"]."','".$_POST["fathername"]."','".$_POST["grade"]."','".$_POST["mobilenumber"]."','".$_POST["birthday"]."')";
    $result = mysqli_query($mysqli, $query);
    
    #if result== true ->student added
    if($result){
       $add_messege="Student added!";
    }
    #else throw messege
    else{$add_messege="Failed to add student!";}
  }
  mysqli_close($mysqli); 
?>

<html>

    <body>

      <title>New Student</title>
      <link rel="stylesheet" type="text/css" href="/css/add.css">  
      <link rel="stylesheet" type="text/css" href="/css/common.css"> 
        <ul>
            <li><a href="teacher.php">Back</a></li>
            <li><a href="AddStudent.php">Add</a></li>
            <li><a href="EditStudent.php">Edit</a></li>
            <li><a href="DeleteStudent.php">Delete</a></li>
            <li><a href="SearchStudent.php">Search</a></li>
            <li><a href="News.php">Ballet News</a></li>
            <li>
              <a href="account.php" >
                <img id="1" src="/css/woman.svg">
                <p><?php echo htmlspecialchars($_SESSION["USERNAME"]); ?></p>
              </a>
            </li>
            <li><a href="logout.php"><img id="1" src="/css/logout-sketch.svg"></a></li> 
          </ul>
          

          <div align="center" title="Insert Student's Info" class="container">
            <form action="" method="POST" name="myForm">
              <p name="label1">New Student</p>
              <p name="label2">Add Student's Info</p>
              <div class="form-input">
            	   <input type="text" name="name" placeholder="Name" required>
            	</div>
                <div class="form-input">
                    <input type="text" name="surname" placeholder="Surname" required>
            	</div>
                <div class="form-input">
                    <input type="text" name="fathername" placeholder="Father's Name"  required>
                </div>
                <div class="form-input">
                    <input type="float" name="grade" placeholder="Grade">
                </div>
                <div class="form-input">
                    <input type="text" name="mobilenumber" placeholder="Mobile Number">
                </div>
                <div class="form-input">
                    <input type="date" name="birthday" placeholder="Birthday" required>
                </div>
                <input type="submit"  value="Done">
                
            </form>
             <p name="messege"><?php echo htmlspecialchars($add_messege); ?></p>
        </div>
        

    </body>
</html>