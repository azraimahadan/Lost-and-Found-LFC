<?php
session_start();
if ($_SESSION['user'] == true){
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
    $dbconn = mysql_select_db("ci2020thank",$connect);

$id = $_SESSION['user'];

$sql2 = "select * from comment where comment_id = '$comment_id'"; 
$result2 =mysql_query($sql2, $connect);

while($row2 = mysql_fetch_array($result2)){
    if($row2[id] != $id){
        ?>
            <script type="text/javascript">
                alert("You can only delete your own replies!");
                window.history.back();
                </script>
     <?php
    $a=1;
    }
}
if($a!=1)
{
$sql = "delete from reply where reply_id = '$reply_id'"; 
$result =mysql_query($sql, $connect);

if($result){
    ?> <script type="text/javascript">
            alert("?‚­? œ?•˜????Šµ?‹ˆ?‹¤.");
            window.history.back();
        </script>
        <?
    }
    else
    {
    ?> <script type="text/javascript">
            alert("?‚­? œ?‹¤?Œ¨?•˜????Šµ?‹ˆ?‹¤.");
            window.history.back();
        </script>
        <?
    }
    }
}
    else
        include("login.php");
    ?>