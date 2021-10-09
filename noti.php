<?
session_start();
//SET NAMES 'utf8';
if ($_SESSION['user'] == true){
    $id = $_SESSION['user'];
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
    $dbconn = mysql_select_db("ci2020thank",$connect);
$sql ="select*from chat where id_one='$id' or id_two='$id' order by dtime desc";
$result = mysql_query($sql, $connect);

?>
<html>
     <head>
        <title>Messages</title>
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
                <li class="active"><a href="noti.php">Notifications</a></li> 
            </ul>
        </div>
        <div class="lnfcontainer">
                <center>
                <h1>Messages</h1>
                    <div class="scroll">
                    <table class="table2" width="90%"> 
                        <tr>
                            <th>No.</th>
                            <th>Sender</th>
                            <th>Time</th>
                        </tr>
                         <?
           $a = 1;
            while ($row = mysql_fetch_array($result)) {;
                if($id != $row[writer])
                {
                    if($row[type] == "l"){
                        echo "
                        <tr>
 	                    <td> $a </td>
                        <td> <a class=link1 href = 'lmessage2.php?id_one=$row[id_one]&post_num=$row[post_num]&id_two=$row[id_two]&type=l'> $row[writer] </a> </td>
                        <td> $row[dtime] </td>  
               
                        </tr>
                        ";
                        $a++;
                    }
                    if($row[type] == "f"){
                        echo "
                        <tr>
 	                    <td> $a </td>
                        <td> <a class=link1 href = 'fmessage2.php?id_one=$row[id_one]&post_num=$row[post_num]&id_two=$row[id_two]&type=f'> $row[writer] </a> </td>
                        <td> $row[dtime] </td>  
               
                        </tr>
                        ";
                        $a++;
                    }
                }
            }
            ?>
                    </table>
                    </div>
                    <a href="homeafterlogin.php"><button class="btn4">Homepage</button></a>
                    <a href="login.php?mode=logout"><button class="btn4">Log Out</button></a> 
                
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

<?} else
    include("login.php")
    ?>

