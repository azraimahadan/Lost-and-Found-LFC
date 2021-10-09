<?php
session_start();
session_destroy();

echo "로그아웃 완료";
echo "<br><br><a href = 'login.php'>";
echo "<input type ='submit' value='홈으로'><br>";
?>


