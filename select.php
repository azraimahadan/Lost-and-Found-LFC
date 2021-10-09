<?
$connect = mysqli_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank","ci2020thank");

$sql = "SELECT * FROM MEMBERSHIP";

$result = mysqli_query($connect, $sql);

while($row = mysqli_fetch_array($result)) {
    echo $row;
    if($row == 0) {
        echo "there is no query";
    }
}