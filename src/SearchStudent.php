<?php

session_start();
#this function provides us with the oprtion to extract pdf on cclick of a button
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: index.php");
    exit;
}
include("dbcon.php");
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $surname = mysqli_real_escape_string($mysqli, $_POST['surname']);
    $mobilenumber = mysqli_real_escape_string($mysqli, $_POST['mobilenumber']);

    $query = sprintf("SELECT * FROM Students WHERE ID='%s' OR (NAME='%s' AND SURNAME='%s') OR MOBILENUMBER='%s'",$id, $name, $surname,$mobilenumber);
    $result = mysqli_query($mysqli, $query);
if (!empty($_POST)){
    $count = mysqli_num_rows($result);
    if($count==1){
        while($row = mysqli_fetch_array($result)) {
            $SID=$row['ID'];
            $SNAME=$row['NAME'];
            $SSURNAME=$row['SURNAME'];
            $SFATHERNAME=$row['FATHERNAME'];
            $SGRADE=$row['GRADE'];
            $SNUMBER=$row['MOBILENUMBER'];
            $SBIRTHDAY=$row['Birthday'];
            $messege=" ";     
        }  
    }
    
    if ($count>1){
        $messege="More than one students found";
    }

    if ($count==0){
        $messege="No student Found";
    }        
}

$_SESSION['pdfid']=$SID;

mysqli_close($mysqli); 
?>

<html>
<head>
        
<script src="css/search.js"></script>    
</head>

<title>Search Student</title>

<link rel="stylesheet" type="text/css" href="/css/search.css">


    
    <body onmouseover="checkagain()">
    <div class="nav">
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
            <form action="" method="POST" id="form">
                <div class="form-input">
                   <input type="text" name="id"  placeholder="ID" required>
                </div>
                <input type="submit" name="Search" value="Done">
            </form>
             <p name=messege><?php echo htmlspecialchars($messege); ?></p>
        </div>



        <div class="NAMEcont" id="NAMEcont">
            <p name="label1">Insert Student's Name and Surname</p>
            <form action="" method="POST" id="form">
                <div class="form-input">            
                   <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="form-input">
                   <input type="text" name="surname" placeholder="Surname" required>
                </div>
                <input type="submit" name="Search" value="Done">
            </form>
             <p name=messege><?php echo htmlspecialchars($messege); ?></p>
        </div>


        <div class="PHONEcont" id="PHONEcont">
            <p name="label1">Insert Student's Phone Number</p>
            <form action="" method="POST" id="form">
                <div class="form-input">
                    <input type="text" name="mobilenumber" placeholder="Mobile Number" required>
                </div>
                <input type="submit" name="Search" value="Done" >
            </form>
             <p name=messege><?php echo htmlspecialchars($messege); ?></p>
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

    <div class="pdf">
         <form method="GET" name="pdf" action="generate_pdf.php"  target='_blank'>
            <input type="submit" name="generatepdf" class="btn btn-success" value="PDF Export"/>
        </form>
        
    </div> 

    </body>

    <script type="text/javascript">

    function checkagain(){
        ms = "<?php echo $messege; ?>";
        if(ms==" ")
        {
            document.getElementById("result").style.display = "block";
        }
    }

    </script>

</html>

