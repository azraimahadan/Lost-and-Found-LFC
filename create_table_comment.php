<?php
//Å×ÀÌºí »ø¼º
//$connect = mysql_connect("localhost","root", "1234");
//$dbconn = mysql_select_db("test",$connect);

$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

$sql = "create table comment ( ";
$sql .= "comment_id int not null auto_increment, ";
$sql .= "id char(20) not null, ";
$sql .= "post_num int(11) not null,";
$sql .= "message text not null, ";
$sql .= "type char(1) not null, ";
$sql .= "dtime datetime, ";
$sql .= "primary key(comment_id)) "; 

$result = mysql_query($sql, $connect);
if($result)
    echo "Table Ok!";
else
    echo  "Table Fail!";
    
mysql_close();

?>