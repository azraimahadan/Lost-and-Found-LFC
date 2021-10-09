<?
header('content-type: text/html; charset=utf-8');

//$connect = mysqli_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank","ci2020thank");

$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);
if(!$connect) {
    echo "연결 에러". mysqli_connect_error();
}

session_start();

$id = $_POST['id'];

try {
    $sql = "SELECT * FROM MEMBERSHIP WHERE ID = '$id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    if($row['id']) {
        echo "아이디가 이미 존재합니다.";
    } else {
        echo "사용가능한 아이디입니다.";
    }
} catch(Exception $e) {
    die("DB에러!".$e->getmessage());
}
?>