<?
session_start();
?>
<?
if ($_SESSION['user'] == true){

?>
<html>
 <head>
        <title>Write Lost Things</title>
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
        <div class="lnfcontainer">
            <center>
            <h1>Write an article</h1>
    <a href="lboard_main.php"><button class="btn3">Back to board</button></a>
    
<form method="post" action = ltext_insert.php enctype="multipart/form-data">
<table class="table2">
    <tr>
        <td>Title</td>
        <td><input type="text" size="61" name="title" ></td>
    </tr>
    <tr><td>Category</td>
		<td left>
		<select name="type">
			<option SELECTED value="book">Book</option>
			<option value="personal">Personal</option>
            <option value="clothes">Clothes</option>
            <option value="accessories">Accessories</option>
			<option value="other">Other</option>
		</select>
		</td>
	</tr>
     <tr>
        <td>Place</td>
        <td><input type="text" size="61" name="location" ></td>
    </tr>
    <tr>
        <td>Content</td>
        <td>
            <textarea type ="text" rows="10" cols="60" align="center" name="content"></textarea><br>
            <input type="file" name="imageUp">
        </td>
    </tr>
    <tr >
    </table>
    <input class="btn3" type="submit" value="Save">
    <input class="btn3" type="reset" value="Reset">
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

<?
}
?>