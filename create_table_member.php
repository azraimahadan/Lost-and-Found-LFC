<?php
//���̺� ����
$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

//$connect = mysql_connect("localhost","root", "1234");
//$dbconn = mysql_select_db("test",$connect);

$sql = "create table membership ( ";
$sql .= "id char(20) not null, ";
$sql .= "name varchar(30) not null,";
$sql .= "email char(30), ";
$sql .= "password varchar(30), ";
$sql .= "primary key(id))";

$result = mysql_query($sql, $connect);
if($result)
    echo "Table Ok!";
else
    echo  "Table Fail!";
    
mysql_close();

    ?>