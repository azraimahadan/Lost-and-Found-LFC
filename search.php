<?
session_start();
$connect = mysql_connect("ci2020thank.dongyangmirae.kr","ci2020thank", "2020thank");
$dbconn = mysql_select_db("ci2020thank",$connect);

if($type != null){
    $sql = "select * from fboard where title like '%$title%' and type = '$type';";
    $sql2 = "select * from lboard where title like '%$title%' and type = '$type';";
}
else{
    $sql = "select * from fboard where title like '%$title%';";
    $sql2 = "select * from lboard where title like '%$title%';";
}


$result = mysql_query($sql, $connect);
$result2 = mysql_query($sql2, $connect);

$count = 1;

?>
<html>
    <head>
        <title>LFC Homepage</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>        
        <div class="main"> 
            <div class="logo">
                <a href="homeafterlogin.php"><img src="css/logo3_edited.png"></a>
            </div>
            <ul class="header">
                <li><a href="homeafterlogin.php">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="message">Notifications</a></li>
            </ul>
        </div>
        <div class="maincontainer">
        <center>
            <form class="search" method="post" action="search.php">
            <input class="textbox2" type="text" size="100" maxlength="100" name="title" placeholder="max 50 characters"><br>
                <input type="hidden" name="mode" value="all">
                <div class="category">
		          <select name="type">
			         <option SELECTED value="">Category</option>
                     <option value="book">Book</option>
                      <option value="accessories">Accessories</option>
                      <option value="clothes">Clothes</option>
			         <option value="personal">Personal</option>
			         <option value="other">Other</option>
		          </select>
                </div>
            <input class="btn3" type="submit" value="Search">
            </form>
            <ul class="search">
                <li><a href="?mode=all">All</a></li>
                <li><a href="?mode=found">Found</a></li>
                <li><a href="?mode=lost">Lost</a></li>
            </ul><br>
            <h4>Search results of "<? echo "$title"?>"</h4>

<?
    if($mode == all)
    {
        if($result){
        echo "<h5>Things Found Board</h5>";
        
        echo "<table class='table2'>";
        echo "<tr><th>No.</th><th>Title</th></tr>";
        while ($row = mysql_fetch_array($result)){
        $num = $row[post_num];
        echo "<tr><td>$count</td><td><a href= 'fboard_read.php?num=$num'>$row[title]</a></td></tr>";
        $count++;
            }
            echo "</table>";
        }
        if($result2){
            echo "<h5>Lost Things Board</h5>";
            
            echo "<table class='table2'>";
            echo "<tr><th>No.</th><th>Title</th></tr>";
            while ($row = mysql_fetch_array($result2)){
            $num = $row[post_num];
            echo "<tr><td>$count</td>";
            echo "<td><a href= 'lboard_read.php?num=$num'>$row[title]</a></td></tr>"; 
            $count++;     
        }
            echo "</table>";
        }
}
    if($mode == found)
    {
        if($result){
        echo "<h5>Things Found Board</h5>";
        
        echo "<table class='table2'>";
        echo "<tr><th>No.</th><th>Title</th></tr>";
        while ($row = mysql_fetch_array($result)){
        $num = $row[post_num];
        echo "<tr><td>$count</td><td><a href= 'fboard_read.php?num=$num'>$row[title]</a></td></tr>";
        $count++;
            }
            echo "</table>";
        }
}
                
    if($mode == lost)
    {
        if($result2){
            echo "<h5>Lost Things Board</h5>";
            
            echo "<table class='table2'>";
            echo "<tr><th>No.</th><th>Title</th></tr>";
            while ($row = mysql_fetch_array($result2)){
            $num = $row[post_num];
            echo "<tr><td>$count</td>";
            echo "<td><a href= 'lboard_read.php?num=$num'>$row[title]</a></td></tr>"; 
            $count++;     
        }
            echo "</table>";
        }
    }
    ?>
        <form method="post" action="homeafterlogin.php">
        <input class="btn4" type="submit" value="Return">
        </form>
        </center>
        </div>
                <div class="footer" align="center">
            <center>
                <p class="muted-text">
                <img src="css/logo3_edited-Cropped.png" width="55px">
                © 2020 LFC All Rights Reserved
                </p>
            </center>
        </div>
    </body>
</html>
        
    
