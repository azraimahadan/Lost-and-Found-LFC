<?
session_start();

if ($_SESSION['user'] == true){
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
    $dbconn = mysql_select_db("ci2020thank",$connect);

$temp = $_SESSION['user'];
$sql = "update membership set id = '$id' , email = '$email', password = '$password' ";
$sql.= "where id = '$temp'";

$result = mysql_query($sql, $connect);

if($result){
    $_SESSION['user'] = $id;
    ?> <script type="text/javascript">
        alert("?ˆ˜? •?•˜????Šµ?‹ˆ?‹¤.");
    </script>
    <?
    include("homeafterlogin.php");
}
else{
    ?> <script type="text/javascript">
                     alert("?ˆ˜? •?‹¤?Œ¨?–ˆ?Šµ?‹ˆ?‹¤!.");
                    </script>
                 <?
    include("member_form_edit.php");
}

mysql_close();
}
else
    include("login.php");

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />