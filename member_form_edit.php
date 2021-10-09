<?
session_start();
if ($_SESSION['user'] == true){
if($mode == "edit_fail"){
        echo "You Failed";
    }
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
    $dbconn = mysql_select_db("ci2020thank",$connect);

$temp = $_SESSION['user'];
$sql = "select * from membership where id = '$temp';";
$result = mysql_query($sql, $connect);

while ( $row = mysql_fetch_array($result)){
?>

<html>
    <head>
        <title>Edit Profile</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="main"> 
            <div class="logo">
                <a href="homeafterlogin.php"><img src="css/logo3_edited.png"></a>
            </div>
            <ul class="header">
                <li><a href="homeafterlogin.php">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li> 
                <li><a href="message">Notifications</a></li>
            </ul>
        </div>
        <div class="editcontainer">
            <center>
            <h2>Edit Profile</h2>
            <form name="member_form" method="post" action="member_edit.php">
            <input type="hidden" name="title" value="Member Registration Form"> 
            <table class="table1">
                <tr>
                <td align="right" >Username</td>
                <td><input class="textbox2" type="text" size="15" maxlength="30" name="id" value="<? echo $row[id]?>"></td>
                </tr>
                <tr>
                <td align="right">Email Address</td>
                <td><input class="textbox2" type="text" size="15" maxlength="30" name="email" value="<? echo $row[email]?>"></td>
                </tr>
                <tr>
                <td align="right">Password</td>
                <td><input class="textbox2" type="password" size="15" maxlength="10" name="password" value="<? echo $row[password]?>"></td>
                </tr>
            </table>
            <input class="btn3" type="submit" value="Confirm">
            </form>
            <a href="homeafterlogin.php"><button class="btn3">Home</button></a>
            <h3>Delete Account?</h3>
            <a href="member_delete.php"><button class="btn3">Delete</button></a>
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
<?}
mysql_close();
}
else
    include("login.php");
    ?>
