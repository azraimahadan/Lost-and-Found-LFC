<?
session_start();
$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

$number = $_GET['id'];

$sql ="select*from lboard";
$result = mysql_query($sql, $connect);

?>
<html>
    <head>
        <title>Lost Things</title>
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
                <li class="active"><a href="#">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="message">Notifications</a></li> 
            </ul>
        </div>
        <div class="lnfcontainer">
                <center>
    <h1>Lost Things</h1>
    <table class="table2" width="90%"> 
    	<tr>Page
    	<?php 
    	$resultT = mysql_query($sql, $connect);
    	$h =1;
            while ($roe = mysql_fetch_array($resultT)){
                $h++;
             }
             if (($h-1)%10 == 0) {
                 (int) $list =$h/10;
                 $c=1;
                 while ($list>$c) {
                     echo"<a class=link1 href = 'llist_num.php?id=$c'>$c </a>";
                     $c++;
                 }
             }
             else {
                 $h=$h-1;
                 $list =$h/10 +1;
             $c=1;
             while ((int)$list>=$c) {
                 echo"<a class=link1 href = 'llist_num.php?id=$c'>$c </a>";
                      $c++;
             }
             }?>
        </tr>
        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Uploader</th>
                        </tr>
        
        <?php 
        $w=0; //±Û¹øÈ£
        while ($row = mysql_fetch_array($result)) {
            $num = $row[post_num];
            $w++;
            if($number>=(int)$w/10 && (int)$w/10 >$number-1) {
                echo "
             <tr>
 	           <td> $w </td>
                <td> <a class=link1  href = 'lboard_read.php?num=$num'> $row[title] </a> </td>
               <td> $row[id] </td>
               
            </tr>
                ";
            }
        }
        ?>
 
    </table>
                    <a href="homeafterlogin.php"><button class="btn4">Homepage</button></a>
                    <a href="lboard_write.php"><button class="btn4">Upload Article</button></a>
                    <a href="login.php?mode=logout"><button class="btn4">Log Out</button></a> 
            </center>
        </div>
                <div class="footer" align="center">
            <center>
                <p class="muted-text">
                <img src="css/logo3_edited-Cropped.png" width="55px">
                ? 2020 LFC All Rights Reserved
                </p>
            </center>
        </div>
    </body>
</html>