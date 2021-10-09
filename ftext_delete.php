<?php
session_start();
if ($_SESSION['user'] == true){
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
    $dbconn = mysql_select_db("ci2020thank",$connect);

$id = $_SESSION['user'];
$sql3 = "select * from lboard where post_num = '$num'"; 
$result3 =mysql_query($sql3, $connect);

while($row2 = mysql_fetch_array($result3)){
    if($row2[id] != $id){
        ?>
            <script type="text/javascript">
                alert("You can only delete your own articles!");
                window.history.back();
                </script>
     <?php
    $a=1;
    }
}
if($a!=1)
{
$sql = "delete from fboard where post_num = '$num'"; 
$result =mysql_query($sql, $connect);

$sql2 = "delete from chat where post_num = '$num' and type='f'"; 
$result2 =mysql_query($sql2, $connect);

if($result){
?> <script type="text/javascript">

        alert("?‚­? œ?•˜????Šµ?‹ˆ?‹¤.");
    </script>
    <?
    include("fboard_main.php");
}
else
{
?> <script type="text/javascript">
        alert("?‚­? œ?‹¤?Œ¨?•˜????Šµ?‹ˆ?‹¤.");
    </script>
    <?
    include("fboard_main.php");
}
}
}
else
    include("login.php");
?>