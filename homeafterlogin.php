<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
if ($_SESSION['user'] == true){
    $id = $_SESSION['user'];
?>

<html>
    <head>
        <title>LFC Homepage</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript">
        function logout(){
            alert("Î°úÍ∑∏?ïÑ?õÉ?êò?óà?äµ?ãà?ã§.");
        }
        </script>
    </head>
    <body>        
        <div class="main"> 
            <div class="logo">
                <a href="homeafterlogin.php"><img src="css/logo3_edited.png"></a>
            </div>
            <ul class="header">
                <li class="active"><a  href="homeafterlogin.php">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="noti.php">Notifications</a></li> 
            </ul>
        </div>
        <div class="maincontainer">
        <center>
             <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://www.cssscript.com/demo/simple-typewriter-effect-pure-javascript-typewriterjs/typewriter.js"></script>
 
        <script type="text/javascript">
            var app = document.getElementById('hello');

            var typewriter = new Typewriter(hello, {
                loop: true
            });

            typewriter.typeString('Welcome <? echo "<strong>".$_SESSION['user']."</strong>" ?>!')
                .pauseFor(2500)
                .deleteAll()
                .typeString('Nice to meet you')
                .pauseFor(2500)
                .deleteChars(16)
                .typeString('Let\'s get started!')
                .pauseFor(2500)
                .start();
        </script>
            <div class="maintitle">
                <p>Welcome <? echo "<strong>".$_SESSION['user']."</strong>" ?>!</p>
            </div>
            <h2>Matches</h2>
            <div class="matchgallery">
            <? 
        $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
        $dbconn = mysql_select_db("ci2020thank",$connect);
        $sql = "select * from lboard where id='$id'";
        $result = mysql_query($sql, $connect);
    
        while($row = mysql_fetch_array($result)){
            $a = $row[location];
            $b = $row[type];
            $sqlT = "select * from fboard where location like '%$a%' or type='$b'";
            $resultT = mysql_query($sqlT, $connect);
            echo "<table width=100%><tr>";
            while($rowT = mysql_fetch_array($resultT)){
                
                echo "<div class='img1'><a href = 'fboard_read.php?num=$rowT[post_num]'>
                    <img src='fuploads/$rowT[imageUp]'></a><p>Title: ".$rowT[title]."</p><p>Location: "
                    .$rowT[location]."</p><p>Type: ".$rowT[type]."</p><p>Time: ".$rowT[time]."</p></div>";
            }
            break;
        }
            
    
    ?>
            </div>
            <h2>What are you looking for?</h2>
            <form class="search" method="post" action="search.php">
            <input class="textbox2" type="text" maxlength="50" name="title" placeholder="max 50 characters"><br>
                <input type="hidden" name="mode" value="all">
                <div class="category">
		          <select name="type">
			         <option size="30" SELECTED value="">Category</option>
                     <option value="book">Book</option>
                      <option value="accessories">Accessories</option>
                      <option value="clothes">Clothes</option>
			         <option value="personal">Personal</option>
			         <option value="other">Other</option>
		          </select>
                </div>
            <input class="btn3" type="submit" value="Search">
            </form>
            <br>
            <a href="lboard_main.php"><button class="btn3">Lost Things</button></a>
            <a href="fboard_main.php"><button class="btn3">Things Found</button></a>
            <a href="member_form_edit.php"><button class="btn3">Edit Profile</button></a> 
            <a href="login.php?mode=logout"><button class="btn4">Log Out</button></a>

            </center>
        </div>
        <div class="footer" align="center">
            <center>
                <p class="muted-text">
                <img src="css/logo3_edited-Cropped.png" class="footer-img">
                ¬© 2020 LFC All Rights Reserved
                </p>
            </center>
        </div>
    </body>
</html>
<?
        }
        else{
	       include("login.php");
	       }
        ?>


