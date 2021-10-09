<?php
//습득물 신고 게시판 테이블 구성
$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

$sql = "create table fboard ( ";
$sql .= "post_num int not null auto_increment, ";
$sql .= "id char(20) not null, ";
$sql .= "title char(40) not null,";
$sql .= "type char(10) not null, ";
$sql .= "location char(20) not null, ";
$sql .= "content text, ";
$sql .= "imageUp longblob, ";
$sql .= "time datetime, ";
$sql .= "primary key(post_num)) "; 

$result = mysql_query($sql, $connect);
if($result)
    echo "Table Ok!";
else
    echo  "Table Fail!";
    
mysql_close();

?>