<?
session_start();
//$connect = mysql_connect("localhost","root","1234");
//mysql_select_db("test", $connect);// DB ?„ ?ƒ

$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

if(isset($_POST['check'])){
    $_SESSION["name"]= $name;
    $_SESSION["email"]= $email;
    $_SESSION["id"]= $id;
    $sql = "select * from membership;";
    $result = mysql_query($sql, $connect);

while ( $row = mysql_fetch_array($result)){
    if($id == $row['id']){
        $a=1;   ?>
        <script type="text/javascript">
  alert("ID is not available!!");
  window.history.back();
</script>
        <?php
        //header("location: member_form.php?mode=unavailable_id");
    }
}
if($a!=1){
    ?>
        <script type="text/javascript">
  alert("ID is available!!");
  window.history.back();
</script>
        <?php
    //header("location: member_form.php?mode=available_id");
}
session_destroy();
mysql_close();   
}
else{
$sql = "insert into membership (id,name, email, password) values";
$sql.= "('$id','$name','$email','$password')";

$result = mysql_query($sql, $connect);

if($result){
    header("location: login.php");
    
}
else{
    
    header("location: member_form.php?");
}
mysql_close();
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />