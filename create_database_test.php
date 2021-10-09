<?
$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");

$sql = "CREATE DATABASE test";

$result = mysql_query($sql, $connect);

if($result) {
    echo "쿼리성공";
} else {
    echo "실패";
}