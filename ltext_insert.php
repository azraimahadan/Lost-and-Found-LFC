<?
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
if ($_SESSION['user'] == true){
    $connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
    $dbconn = mysql_select_db("ci2020thank",$connect);

    $name = $_FILES['imageUp']['name'];
    $target_dir = "luploads/";
    $target_file = $target_dir . basename($_FILES["imageUp"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
    
$id = $_SESSION['user'];
$sql = "insert into lboard (id,title,type,location,content,imageUp, time) values";
$sql.= "('$id','$title','$type','$location','$content','$name', now())";

move_uploaded_file($_FILES['imageUp']['tmp_name'],$target_dir.$name);
    
}

$ftp_server = "ci2020thank.dongyangmirae.kr";
$ftp_user_name = "ci2020thank";
$ftp_user_pass = "2020thank";
$destination_file = "luploads/";
$source_file = $_FILES['imageUp']['tmp_name'];

// set up basic connection
$conn_id = ftp_connect($ftp_server);
ftp_pasv($conn_id, true); 

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

// upload the file
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);

$result = mysql_query($sql, $connect);

if($result){
    ?> <script type="text/javascript">
        alert("등록되었습니다.");
    </script>
    <?
    include("lboard_main.php");
}
else
    include("lboard_write.php");


mysql_close();
 }
else
    include("login.php");
?>
