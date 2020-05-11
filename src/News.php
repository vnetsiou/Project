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
<head>   
</head>
    <body>
        <title>Ballet News</title>
        <link rel="stylesheet" type="text/css" href="/css/news.css"> 
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
    <div class="Feeds">
        <div class="NYCB" name="NYCB">
            <p>New York City Ballet</p>
            <rssapp-carousel id="os3MCqrEwJr4aAcQ"></rssapp-carousel>
            <script src="https://widget.rss.app/v1/carousel.js" type="text/javascript" async></script>       
        </div>
        
        <div class="VBA" name="VBA">
            <p>Vaganova Ballet Academy</p>
            <rssapp-carousel id="sEb6q2EbgLWu0qw4"></rssapp-carousel>
            <script src="https://widget.rss.app/v1/carousel.js" type="text/javascript" async></script>
        </div>

        <div class="BBA" name="BBA">
            <p>Bolshoi Ballet Academy</p>
            <rssapp-carousel id="bKsxSephqqKeDHPj"></rssapp-carousel>
            <script src="https://widget.rss.app/v1/carousel.js" type="text/javascript" async></script>
        </div>

    </div>
        

    </body>

</html>