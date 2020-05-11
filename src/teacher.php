<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: index.php");
    exit;  
}
include("dbcon.php");
mysqli_close($mysqli); 
?>
<html>

<body>
        <title>Teacher's Page</title>
        <link rel="stylesheet" type="text/css" href="/css/teacher.css"> 
        <script type="text/javascript" src="teacher.js"></script>
    
      <ul>
        <li><a href="AddStudent.php">Add</a></li>
       	<li><a href="EditStudent.php">Edit</a></li>
        <li><a href="DeleteStudent.php">Delete</a></li>
        <li><a href="SearchStudent.php">Search</a></li> 
        <li><a href="News.php">Ballet News</a></li>
      	<li>
          <a href="account.php" >
            <img  src="/css/woman.svg"><p><?php echo htmlspecialchars($_SESSION["USERNAME"]); ?></p>
        </a>
        </li>
      	<li>
          <a href="logout.php">
            <img  src="/css/logout-sketch.svg">
          </a>
        </li>  	
      </ul>
      <div class="entry">
        <p name="label1" >Adagio Dance Studio</p>
        <div class="snowflakes" aria-hidden="true">
            <div class="snowflake">
            .
            </div>
            <div class="snowflake">
            ❅
            </div>
            <div class="snowflake">
            ❄
            </div>
            <div class="snowflake">
            *
            </div>
             <div class="snowflake">
            .
            </div>
            <div class="snowflake">
            ❅
            </div>
            <div class="snowflake">
            ❄
            </div>
            <div class="snowflake">
            *
            </div>
             <div class="snowflake">
            .
            </div>
            <div class="snowflake">
            ❅
            </div>
            <div class="snowflake">
            ✧
            </div>
            <div class="snowflake">
            ❄
            </div>
            <div class="snowflake">
            ❄
            </div>
            <div class="snowflake">
            *
            </div>
             <div class="snowflake">
            .
            </div>
            <div class="snowflake">
            ❄
            </div>
            <div class="snowflake">
            ❄
            </div>
          
        </div>

      </div>
      <div class="social">
      	<div class="fb">	
      		<a name="fb" href="https://www.facebook.com/AdagioDanceStudio/"  target="_blank">
      		<img name="fb" src="/css/facebook.svg">
      		Adagio Dance Studio</a>
      	</div>

      	<div class="insta">
       		<a name="insta" href="https://www.instagram.com/adagio_dance_studio_chania/"  target="_blank">
       		<img name="insta" src="/css/instagram.svg">
       		adagio_dance_studio_chania</a>
     	</div>
     </div>

     <div class="incoming">
      <div class="inbox" id="inbox">
          <div class=inbox-title>
            <p>Inbox</p>
          </div>
          <div class="inbox-body">
            <p> Body</p>
          </div>

      </div>
       <img name="email_icon" src="/css/gmail.svg" onclick="email()">
     </div>

</body>



<script type="text/javascript">
  function email()
  {
    if(document.getElementById('inbox').style.display=='block')
    document.getElementById('inbox').style.display='none';
    else{
    document.getElementById('inbox').style.display='block';
  }
  }

</script>

      



</html>

