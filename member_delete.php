<?
session_start();
if ($_SESSION['user'] == true){
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
    $dbconn = mysql_select_db("ci2020thank",$connect);

$id= $_SESSION['user'];
$sql = "delete from membership where id = '$id'"; 
$result =mysql_query($sql, $connect);

if($result){
    session_destroy();
    ?> <script type="text/javascript">
            alert("ê³„ì • ?‚­? œ?–ˆ?Šµ?‹ˆ?‹¤.");
        </script>
    <?
    include("login.php");
}
else{
include("homeafterlogin.php");
}
}
else
    include("login.php");
?>
