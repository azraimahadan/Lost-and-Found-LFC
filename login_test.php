<?
session_start();
//$connect = mysql_connect("localhost","root","1234");
//mysql_select_db("test", $connect);// DB 선택

$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

$sql = "select * from membership;";
$result = mysql_query($sql, $connect);

//$num_match = mysql_num_rows($result);

while ( $row = mysql_fetch_array($result)){
    if($id == $row['id']){
        $a=1;
        if($password == $row['password']){
            $_SESSION['user'] = $id; 
            header("location: homeafterlogin.php");
        }
        
        else {
            header("location: login.php?mode=failed");
    }
}
}
if($a!=1)            
    header("location: login.php?mode=failed");
//if($num_match == 1){
//    $row = mysql_fetch_array($result);
    

mysql_close();
?>