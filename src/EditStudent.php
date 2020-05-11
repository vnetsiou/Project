<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: index.php");
    exit;
}
include("dbcon.php");
$search_id = mysqli_real_escape_string($mysqli, $_POST['id']);
$search_name = mysqli_real_escape_string($mysqli, $_POST['name']);
$search_surname = mysqli_real_escape_string($mysqli, $_POST['surname']);
$search_mobilenumber = mysqli_real_escape_string($mysqli, $_POST['mobilenumber']);

$query = sprintf("SELECT * FROM Students WHERE (NAME='%s' AND SURNAME='%s') OR ID='%s' OR MOBILENUMBER='%s'", $search_name, $search_surname, $search_id, $search_mobilenumber);
$result = mysqli_query($mysqli, $query);
if (!empty($_POST)){
    if ($result != 0) {
        $count = mysqli_num_rows($result);
        if($count==1) {
             while($row = mysqli_fetch_array($result)){
            $_SESSION['edit_id']=$row['ID'];
            $_SESSION['edit_name']=$row['NAME'];
            $_SESSION['edit_surname']=$row['SURNAME'];
            $_SESSION['edit_fathername']=$row['FATHERNAME'];
            $_SESSION['edit_grade']=$row['GRADE'];
            $_SESSION['edit_mobilenumber']=$row['MOBILENUMBER'];
            $_SESSION['edit_birthday']=$row['Birthday'];

            $search_error="";
            header("location: EditForm.php");
        }}
        if($count>1){
            $search_error = "More than one students found. Please insert another identification method";
        }
        else{
            $search_error = "Student not found";
        }
    }
}
mysqli_close($mysqli); 

?>

<html>
    <body>
        <title>Edit Student's Info</title>
        <link rel="stylesheet" type="text/css" href="/css/edit.css"> 
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
    
    

    <div align="center" title="Edit Student's Info" class="container" id="ask_id"  >
        <form action="" method="POST" > 
            <div w3-container w3-teal>
                <p name="label1">Edit Student</p>
                <p name="label2" >Student's Info.</p>
                <p name="label2">ID, Name and Surname or Phone Number</p>
    
            </div> 
            <div class="form-input">
                <input type="text" name="id" placeholder="ID">
            </div>
            <div class="form-input">
                <input type="text" name="name" placeholder="Name">
            </div>
            <div class="form-input">
                <input type="text" name="surname" placeholder="Surname">
            </div>
            <div class="form-input">
                <input type="text" name="mobilenumber" placeholder="Mobile Number">
            </div>
            <input type="submit"  value="Done">
            </form>
            <p name="messege"><?php echo htmlspecialchars($search_error); ?></p>
        </div>


    </body>
</html>