<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: index.php");
    exit;
}
include("dbcon.php");

$id=$_SESSION['edit_id'];
$name = $_SESSION['edit_name'];
$surname = $_SESSION['edit_surname'];
$fathername = $_SESSION['edit_fathername'];
$grade = $_SESSION['edit_grade'];
$mobilenumber = $_SESSION['edit_mobilenumber'];
$birthday = $_SESSION['edit_birthday'];


$name2 = mysqli_real_escape_string($mysqli, $_POST['name']);
$surname2 = mysqli_real_escape_string($mysqli, $_POST['surname']);
$fathername2 = mysqli_real_escape_string($mysqli, $_POST['fathername']);
$grade2 = mysqli_real_escape_string($mysqli, $_POST['grade']);
$mobilenumber2 = mysqli_real_escape_string($mysqli, $_POST['mobilenumber']);
$birthday2 = mysqli_real_escape_string($mysqli, $_POST['birthday']);
if (!empty($_POST)){
    if($name2==''){$name2=$name;}
    if($surname2==''){$surname2=$surname;}
    if($fathername2==''){$fathername2=$fathername;}
    if($grade2==''){$grade2=$grade;}
    if($mobilenumber2==''){$mobilenumber2=$mobilenumber;}
    if($birthday2==''){$birthday2=$birthday;}

    $query = 'UPDATE Students
            SET NAME="'.$name2.'",SURNAME="'.$surname2.'",FATHERNAME="'.$fathername2.'", GRADE="'.$grade2.'",MOBILENUMBER="'.$mobilenumber2.'",Birthday="'.$birthday2.'" WHERE ID="' .$id. '" ';


    $result = mysqli_query($mysqli, $query);
        if ($result) {
            $edit_messege="Edit Succesful";

            }
        else{
            $edit_messege="Failed to edit";
        }
}

mysqli_close($mysqli); 
?>

<html>
    <body>
        <title>Edit Student's Info</title>
        <link rel="stylesheet" type="text/css" href="/css/edit_form.css"> 
        <link rel="stylesheet" type="text/css" href="/css/common.css"> 
        <ul>
            <li><a href="EditStudent.php">Back</a></li>
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
       
        
             	
        <div align="center" title="Edit Student's Info" class="container" id="edit_id">
            <form action="EditForm.php" method="POST" > 
            <div w3-container w3-teal>
                <p name=label1>Edit Student</p>
                <p name=label2>ID <?php echo htmlspecialchars($id); ?></p>
                <p name=label2>Change only info you wish to...</p>
            </div> 
            <div class="form-input">
                <input type="text" name="name" placeholder="<?php echo htmlspecialchars($name); ?>" >
            </div>
            <div class="form-input">
                <input type="text" name="surname" placeholder="<?php echo htmlspecialchars($surname); ?>">
            </div>
            <div class="form-input">
                <input type="text" name="fathername" placeholder="<?php echo htmlspecialchars($fathername); ?>" >
            </div>
            <div class="form-input">
                <input type="float" name="grade" placeholder="<?php echo htmlspecialchars($grade); ?>">
            </div>
            <div class="form-input">
                <input type="text" name="mobilenumber" placeholder="<?php echo htmlspecialchars($mobilenumber); ?>">
            </div>
            <div class="form-input">
                <input type="date" name="birthday" placeholder="<?php echo htmlspecialchars($birthday); ?>">
            </div>
            <input type="submit"  value="Done">
            </form>
             <p name="messege"><?php echo htmlspecialchars($edit_messege); ?></p>
        </div>




    </body>
</html>