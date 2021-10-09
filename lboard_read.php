<?php
session_start();
?>
<html>
     <head>
        <title>Lost Things</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<script type="text/javascript">
    function ShowHideDiv(btnReply) {
        var dvReply = document.getElementById("dvReply");
        dvReply.style.display = btnReply.value == "?‹µê¸?" ? "block" : "none";
    }
</script>
<style>
a{
    align-self: center;
    }</style>
<?
if ($_SESSION['user'] == true){
    
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);
    
            /*$sql3 = "select * from lboard where imageUp not like '%.png' and imageUp is not null and imageUp not like '%.jpg'";
    $result3 = mysql_query($sql3, $connect);
    if($result3){
        while($row3 = mysql_fetch_array($result3)){
            $sql2 = "update lboard set imageUp = '$row3[imageUp].jpg' where imageUp not like '%.png' and imageUp not like '%.jpg'";
            $result2 = mysql_query($sql2, $connect);
        }
    }*/
    
    
    $sql = "select * from lboard where post_num = '$num';" ;
    $result = mysql_query($sql, $connect);
    
    $result1 = mysql_query($sql, $connect);
    while($row1 = mysql_fetch_array($result1)){
        $article_owner = $row1[id];

?>
                <form class="btnform" name="b2b" method="post" action="lboard_main.php">
                <input class="btn5" type="submit" value="Back to board">
                </form>
                <form class="btnform" action="lmessage.php">
                <input class="textbox" type="hidden" name="post_num" value= "<?php echo $num ?>">
                <input type="hidden" name="id_two" value="<?php echo $row1[id] ?>">
                <input type ="hidden" name="type" value="l">
            <input class="btn4" type="submit" value="Message">
                </form>

                <table class="table2">
<? }
    while($row = mysql_fetch_array($result))
    {
        echo "<tr><td>Uploader</td><td width=300px>$row[id]</td></tr>
             <tr><td>Title</td><td>$row[title]</td></tr>
             <tr><td>Category</td><td>";
        if($row[type]== book) echo "Books</td></tr>";
        else if($row[type]== personal) echo "Personal</td></tr>";
        else if($row[type]== clothes) echo "Clothes</td></tr>";
        else if($row[type]== accessories) echo "Accessories</td></tr>";
        else if($row[type]== other) echo "Other</td></tr>";
        echo "<tr><td>Location</td><td>$row[location]</td></tr>";
        echo "<tr><td colspan=2 height= 200px align=center>$row[content]</td></tr>";
        if($row[imageUp] != null)
            echo "<tr><td colspan=2><img src='luploads/$row[imageUp]' height='500px' width='500px'></td></tr>";
        echo "</table>";
    }
    
    mysql_close();
    
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

    $sql = "select * from comment where post_num = '$num' and type = 'l' order by dtime desc;" ;
    $result = mysql_query($sql, $connect);
    while($row = mysql_fetch_array($result))
    {
        ?>                     
        <table class="comment"><?
        echo "<tr><td>$row[id] </td><td>$row[dtime] </td><td>";
        ?>
        <form action="com_delete.php">
            <input type="hidden" name="comment_id" value= "<?php echo $row[comment_id] ?>">
            <input class = "btn5" type="submit" value="Delete">
        </form>
        <?
        echo "</td></tr>";
        echo "<tr><td colspan=3>$row[message] </td></tr></table>";
        
        $sql2 = "select * from reply where post_num = '$num' and comment_id = '$row[comment_id]' order by dtime desc;";
        $result2 = mysql_query($sql2, $connect);
        while($row2 = mysql_fetch_array($result2))
        {
            ?> <div class="icon">&#10507;</div>
            
            <table class="replies"><?
                echo "<tr><td>$row2[id] </td><td>$row2[dtime] </td><td>";
            ?>
            <form action="rep_delete.php">
                <input type="hidden" name="reply_id" value= "<?php echo $row2[reply_id] ?>">
                <input class = "btn5" type="submit" value="Delete">
            </form>
        <?
        echo "</td></tr>";
        echo "<tr><td colspan=3>$row2[replies] </td></tr></table>";
        }
?>      
            </table>
            </table>
            <tr><form action="reply_insert.php"><td colspan="1"><input size="20" type="text" name="replies"></td>
            <td><input class="textbox" type="hidden" name="post_num" value= "<?php echo $num ?>"></td>
                <td><input type="hidden" name="comment_id" value= "<?php echo $row[comment_id]?>"> </td>
                <td><input type="hidden" name="type" value= "l"></td>
            <td><input class="btn4" type="submit" value="Reply"></td>
                </form>
        </tr>
<?
    }
?>

            <div>   
                <form action="comment_insert.php">
                    <input class="textbox" type="hidden" name="post_num" value= "<?php echo $num ?>">
                    <td><input type="hidden" name="type" value= "l"></td>
                    <textarea type ="text" rows="4" cols="50" align="center" name="message"></textarea><br>
                <input class="btn4" type="submit" value="Comment">
                </form>
            </div>
            </table>
    <form class="btnform" name="write" method="post" action="lboard_write.php">
     <input class="btn5" type="submit" value="Write Article">
    </form>
    <form class="btnform" method="post" action="homeafterlogin.php">
     <input class="btn5" type="submit" value="Homepage">
    </form>
    <form class="btnform" name="logout" method="post" action="login.php?mode=logout">
     <input class="btn5" type="submit" value="Log Out">
    </form>
     <form class="btnform" name="delete" method="post" action="ltext_delete.php?num=<? echo $num ?>">
     <input class="btn5" type="submit" onclick="check()" value="Delete">
    </form>
            </center>
        </div>
                <div class="footer" align="center">
            <center>
                <p class="muted-text">
                <img src="css/logo3_edited-Cropped.png" width="55px">
                Â© 2020 LFC All Rights Reserved
                </p>
            </center>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <script>
        function check(){
            confirm("Do you want to delete the article?");
        }
        window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
                }
                }
            function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
            }
        </script>
    </body>
</html>

 <?
    
}else
    include("login.php");
?>
