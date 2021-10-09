<?
session_start();
//SET NAMES 'utf8';
if ($_SESSION['user'] == true){
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
    $dbconn = mysql_select_db("ci2020thank",$connect);
$sql ="select*from fboard";
$result = mysql_query($sql, $connect);

?>
<html>
     <head>
        <title>Things Found</title>
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
        <div class="lnfcontainer">
                <center>
                <h1>Things Found</h1>
                    <table class="table2" width="90%"> 
                        <tr>Page
                        <?php 
    	$resultT = mysql_query($sql, $connect);
    	$h =1; // 글객수받으려고 만든수
            while ($row = mysql_fetch_array($resultT)){
                $h++;
             }
             if (($h-1)%10 == 0) {
                 $list =$h/10; //목록개수만드려고 받은것
                 $c=1;
                 while ((int)$list>=$c) { //c는 목록 번호 출력
                     echo"<a class=link1 href = 'flist_num.php?id=$c'>$c </a>";
                     $c++;
                 }
             }
             else {
                 $h=$h-1;
                 $list =$h/10 +1;
             $c=1;
             while ((int)$list>=$c) {
                 echo"<a class=link1  href = 'flist_num.php?id=$c'>$c </a>";
                      $c++;
             }
             }?>
                        </tr>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Uploader</th>
                        </tr>
                         <?
           $a = 1;
            while ($row = mysql_fetch_array($result)) {
                $num = $row[post_num];
                if(10>=$a) {
            echo "
             <tr>
 	           <td> $a </td>
                <td> <a href = 'fboard_read.php?num=$num' class='link1'> $row[title] </a> </td>
               <td> $row[id] </td>  
               
            </tr>
                ";}
             $a++;
            }
            ?>
                    </table>
                    <a href="homeafterlogin.php"><button class="btn4">Homepage</button></a>
                    <a href="fboard_write.php"><button class="btn4">Upload Article</button></a>
                    <a href="login.php?mode=logout"><button class="btn4">Log Out</button></a> 
            </center>
        </div>
                <div class="footer" align="center">
            <center>
                <p class="muted-text">
                <img src="css/logo3_edited-Cropped.png" width="55px">
                ⓒ 2020 LFC All Rights Reserved
                </p>
            </center>
        </div>
    </body>
</html>

<?
mysql_close();
} 
else
    include("login.php")

?>