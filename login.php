<?php
    session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
    <head>
        <title>Lost and Found Centre</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="main"> 
            <div class="logo">
                <a href="homeafterlogin.php"><img src="css/logo3_edited.png"></a>
            </div>
            <ul class="header">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li> 
            </ul>
        </div>
        <div class="login-box">
            <h1>Login</h1>
            <form name="login" method="post" action="login_test.php">
            <?php
            if($mode == "logout"){
                ?> <script type="text/javascript">
                     alert("로그아웃되었습니다.");
                    </script>
                 <?
                session_destroy();
            }
            if($mode == "failed"){
                if (!array_key_exists('attempt', $_SESSION))
  		    {
            $_SESSION['attempt']=1;
            }
        
            if($_SESSION['attempt'] <= 5){
                echo "Invalid username or password ".$_SESSION['attempt']."</br> ";
                $_SESSION['attempt']++;
            }
            else 
                {
  		    
  		        }
            }
    
            ?>
            <? if ($_SESSION['attempt'] <= 5) { ?> 
        <div class="textbox">
            <input type="text" placeholder="Username" size="15" maxlength="20" name="id">
        </div>
        <div class="textbox">
            <input type="password" size="15" maxlength="10" placeholder="Password" name="password" value="">
        </div>
        <input class="btn" type="submit" name="login" value="Login">
        <input class="btn" type="reset" name="reset" value="Reset">
                <?} else{
                        echo "Attempts exceed 5 times. You are now blocked from login.";
                    session_destroy();
                        }
                ?>  
        <br><h2>Not a member yet?</h2><br>
        <a href="member_form.php">Join Now!</a>
            </form>
        </div>
                <div class="footer" align="center">
            <center>
                <p class="muted-text">
                <img src="css/logo3_edited-Cropped.png" width="55px">
                © 2020 LFC All Rights Reserved
                </p>
            </center>
        </div>
    </body>
</html>