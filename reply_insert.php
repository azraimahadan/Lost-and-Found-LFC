<?
session_start();

if ($_SESSION['user'] == true){
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
    $dbconn = mysql_select_db("ci2020thank",$connect);

$id = $_SESSION['user'];
$num = $_GET['post_num'];
$sql = "insert into reply (comment_id, id,post_num, replies, type, dtime) values";
$sql.= "('$comment_id','$id',$post_num,'$replies','$type', now())";

$result = mysql_query($sql, $connect);

/*if($result){
    if($type="l"){ //Check comment from which board
    include("lboard_main.php");
    }
    else if($type="f"){
       include("fboard_main.php");
    }
}
*/  
if($result){
    ?> <script type="text/javascript">
        alert("?“±ë¡ë˜?—ˆ?Šµ?‹ˆ?‹¤.");
        window.history.back();
    </script>
    <?
}
else
    ?>
    <script type="text/javascript">
        alert("?“±ë¡ë˜?—ˆ?Šµ?‹ˆ?‹¤.");
        window.history.back();
    </script>
    <?
mysql_close();
 }
else
    include("login.php");
?>
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />