
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sign up</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="main"> 
            <div class="logo">
                <a href="homeafterlogin.php"><img src="css/logo3_edited.png"></a>
            </div>
            <ul class="header">
                <li><a href="login.php">Home</a></li>   
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li> 
                <li><a href="message">Notifications</a></li>
            </ul>
        </div>
        <div class="containersignup">
        <center>
        <h1 class="signup">Sign Up</h1>
        <form name="member_form" method="post" action="member_insert.php">
            <input type="hidden" name="title" value="회원 가입 양식"> 
            <table class="table1">
                <tr>
                    <td align="right" >Name:</td>
                    <td><input class="textbox1" type="text" size="30" maxlength="30" name="name" placeholder="max 30 characters"></td>
                </tr>
                <tr>
                    <td align="right">Email:</td>
                    <td><input class="textbox1" type="text" size="30" maxlength="30" name="email" placeholder="max 30 characters"></td>
                </tr>
                <tr>
                    <td align="right">Username:</td>
                    <td>
                        <input class="textbox1" type="text" size="30" maxlength="20" name="id" placeholder="max 20 characters">
                        <input class="btn2" type="submit" value="Check" name="check"><?
                        if ($mode == unavailable_id){
                                echo "Username is not available.";
                            }
                        else if ($mode == available_id){
                                echo "Username is available.";
                            }
                    ?></td>
                </tr>
                <tr>
                    <td align="right">Password:</td>
                    <td><input class="textbox1" type="password" size="30" maxlength="10" name="password" value="" placeholder="max 10 characters"></td>
                </tr>
            </table>
            <tr><td><input class="btn1" type="submit" value="Confirm">
               <input class="btn1" type="reset" value="Reset"></td>
            </tr>
        </form>
        <h2>Already have an account?</h2>
        <a href="login.php"><button class="btn1">Login</button></a>
        </center>
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
      