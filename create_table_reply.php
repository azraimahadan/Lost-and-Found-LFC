<?php
//Å×ÀÌºí »ø¼º
$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

//$connect = mysql_connect("localhost","root", "1234");
//$dbconn = mysql_select_db("test",$connect);

$sql = "create table reply ( ";
$sql .= "reply_id int not null auto_increment, ";
$sql .= "comment_id int(11) not null,";
$sql .= "id char(20) not null, ";
$sql .= "post_num int(11) not null,";
$sql .= "replies text not null, ";
$sql .= "type char(5) not null, ";
$sql .= "dtime datetime, ";
$sql .= "primary key(reply_id)) "; 

$result = mysql_query($sql, $connect);
if($result)
    echo "Table Ok!";
else
    echo  "Table Fail!";
    
mysql_close();

?>