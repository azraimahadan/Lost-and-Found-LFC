<?
session_start();
$writer = $_SESSION['user'];
//$id_two = $writer;
/*if($id_one == $id_two){            //incase chatter is same with article owner
  ?> <script type="text/javascript">
  window.history.back();
</script>
*/

?>

<html>
    <head>
        <title>Message</title>
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
                <li><a href="noti.php">Notifications</a></li> 
            </ul>
        </div>
        <div class="chatcontainer">
<?
$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

$sql = "select * from lboard where post_num = '$post_num';";
$result = mysql_query($sql, $connect);

if($result){
    while($row = mysql_fetch_array($result))
    {
        if($row[imageUp] != null)
            echo "<tr><td colspan=2><img src='luploads/$row[imageUp]' class='articleimg'></td></tr>";
        echo "<h1>$row[title]</h1>";
    }
}

?>

    <div class="chat-box">       
<?            
            
            $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
            $dbconn = mysql_select_db("ci2020thank",$connect);

$sql = "select * from chat where post_num = '$post_num' and id_one='$id_one' and id_two='$id_two' and type='$type';";
$result = mysql_query($sql, $connect);

while($row=mysql_fetch_array($result)){

/*if($row[chat_id] == null){
  $sql2 = "select * from chat;";
  $result2 = mysql_query($sql2, $connect);
  while($row2= mysql_fetch_array($result2)){
    $MAX = $row2[chat_id];
    if($row2[chat_id]>$MAX){
      $MAX=$row2[chat_id];
    }
  }
  
  $chat_id = 1+$MAX;
}
else{
  $chat_id = $row[chat_id];
}
*/

if($row[id_two] == $row[writer]){
echo "<div class='container1'>";
echo "<div class='time-right'>$row[id_two] | $row[dtime]</div><br><br>";
echo  "<p>$row[message]</p><br>";
echo "</div>";
}
else{
echo "<div class='container1 darker'>";
echo "<div class='time-left'>$row[id_one] | $row[dtime]</div><br><br>";
echo  "<p>$row[message]</p><br>";
echo "</div>";
}

}

?> 
            </div>    
    <form action="message_insert.php"><td colspan="1"><input size="30" type="text" name="message"></td>
            <td><input class="textbox-msg" type="hidden" placeholder="Send a message..." name="post_num" value= "<?php echo $post_num ?>"></td>
              <td><input type ="hidden" name="writer" value="<?php echo $writer ?>"> </td>
                <td><input type="hidden" name="id_two" value= "<?php echo $id_two ?>"></td>
                <td><input type ="hidden" name="id_one" value="<?php echo $id_one ?>"> </td>
                <td><input type ="hidden" name="type" value="l"></td>
                <!--<td><input type ="hidden" name="chat_id" value="<?php echo $chat_id ?>"> </td> -->
            <td><input class="btn4" type="submit" value="Send message"></td>
    </form>
    <a href="lboard_read.php?num=<? echo $post_num ?>"><button class="btn5" >Back to article</button></a>
</div>
    <div class="footer" align="center">
            <center>
                <p class="muted-text">
                <img src="css/logo3_edited-Cropped.png" class="footer-img">
                © 2020 LFC All Rights Reserved
                </p>
            </center>
        </div>
    </body>
</html>
