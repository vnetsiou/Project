<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: index.php");
    exit;   
}

include("dbcon.php");

$id = mysqli_real_escape_string($mysqli, $_POST['id']);
$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$surname = mysqli_real_escape_string($mysqli, $_POST['surname']);
$phone=mysqli_real_escape_string($mysqli, $_POST['mobilenumber']);

if(!empty($_POST)){
    $query = $query = "DELETE FROM Students WHERE ID='$id' OR (NAME='$name' AND SURNAME='$surname') OR MOBILENUMBER='$phone'";
    $result = mysqli_query($mysqli,$query);  
     if($mysqli->affected_rows==1)
     {
         $delete_messege="Student Deleted!";
     }
     if($mysqli->affected_rows==0){
      $delete_messege="Student not found!";   
     }   
  
}


mysqli_close($mysqli); 

?>


<html>
<head> 
<script src="css/delete.js"></script>     
</head>
    <body onmouseover="checkagain()">
        <title>Delete Student</title>
        <link rel="stylesheet" type="text/css" href="/css/delete.css"> 
 


    <div class="nav" >
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
    </div>

    <div class="forms">
        

        <div class="panel" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
                <div class="outter">
                    <p name="link">Search Criteria</p>
                    <img name="img" src="/css/arrow.svg">     
                </div>
                    <div id="collapse1" class="collapse" >
                    <ul>
                        <li onclick="idway()" id="idbtn"> <button type="button" >ID</button> </li>
                        <li onclick="nameway()" id="namebtn"> <button type="button" name="Name" >Name and Surname</button> </li>
                        <li onclick="phoneway()" id="phonebtn"> <button type="button" name="Phone" >Phone Number</button> </li>
                    </ul>
                    </div>        
             
      </div>


        <div class="IDcont" id="IDcont">
            <p name="label1">Insert Student's ID</p>
            <form action="" method="POST" id="myForm1" name="P1">
                <div class="form-input">
                   <input type="text" name="id"  placeholder="ID" required>
                </div>
                <input type="submit" name="Search" value="Done" onClick="confSubmit1(this.form)">
            </form>
             <p name=messege><?php echo htmlspecialchars($delete_messege); ?></p>
        </div>



        <div class="NAMEcont" id="NAMEcont">
            <p name="label1">Insert Student's Name and Surname</p>
            <form action="" method="POST" id="myForm2" name="P2">
                <div class="form-input">            
                   <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="form-input">
                   <input type="text" name="surname" placeholder="Surname" required>
                </div>
                <input type="submit" name="Search" value="Done" onClick="confSubmit2(this.form)">
            </form>
             <p name=messege><?php echo htmlspecialchars($delete_messege); ?></p>
        </div>


        <div class="PHONEcont" id="PHONEcont">
            <p name="label1">Insert Student's Phone Number</p>
            <form action="" method="POST" id="myForm3"  name="P3">
                <div class="form-input">
                    <input type="text" name="mobilenumber" placeholder="Mobile Number" required>
                </div>
                <input type="submit" name="Search" value="Done" onClick="confSubmit3(this.form)">
            </form>
             <p name=messege><?php echo htmlspecialchars($delete_messege); ?></p>
        </div>

      
        <div class="container2" id="result" data-processed="false">
            <p name="firstline"><?php echo htmlspecialchars($SNAME); ?> Info</p>
            <p>ID  <?php echo htmlspecialchars($SID); ?></p>
            <p>Name    <?php echo htmlspecialchars($SNAME); ?></p>
            <p>Surname    <?php echo htmlspecialchars($SSURNAME); ?></p>
            <p>Father's Name    <?php echo htmlspecialchars($SFATHERNAME); ?></p>
            <p>Grade    <?php echo htmlspecialchars($SGRADE); ?></p>
            <p>Phone Number    <?php echo htmlspecialchars($SNUMBER); ?></p>
            <p>Birthday    <?php echo htmlspecialchars($SBIRTHDAY); ?></p>
 
           
        </div> 
   

    </div>
 

        <script type="text/javascript">

        function confSubmit1(form) 
        {
            if (confirm("Are you sure you want to delete this student?")) {
            form.submit();}
            else {
            document.getElementById("myForm1").reset();
            }
        }

        function confSubmit2(form) {
            if (confirm("Are you sure you want to delete this student?")) {
            form.submit();}
            else {
            document.getElementById("myForm2").reset();
            }
        }
        function confSubmit3(form) {
            if (confirm("Are you sure you want to delete this student?")) {                
            form.submit();}
            else {
            document.getElementById("myForm3").reset();
            }
        }
        </script>

    </body>

    <script type="text/javascript">
    function checkagain(){
        ms = "<?php echo $delete_messege; ?>";
        if(ms==" ")
        {
            document.getElementById("result").style.display = "block";
        }
    }
    </script>

</html>