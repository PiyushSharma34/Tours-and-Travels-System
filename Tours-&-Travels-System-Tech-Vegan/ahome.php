<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:admin.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($al, "SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tour &amp; Travels System</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
  
<div id="header">
<marquee behavior="alternate" direction="left" class="headingMain" scrollamount="12">Online Tours &amp; Travels System</marquee>
</div>
<br />
<br />

<center>
<div class="reg">Welcome <?php echo $name;?> &#128522</div >
  <br />

  <table border="0">
<tr><td>  
  <a href="holiday.php" class="cmd">♦ 	Manage Holiday Packages</a>
</td><td>
  <a href="changePasswordAdmin.php" class="cmd">♦ Change Password</a>
</td></tr>
<tr><td>
  <a href="orders.php" class="cmd">♦ Orders</a>
</td><td>
  <a href="logout.php" class="cmd">♦ Logout</a>
</table>
</div>


</center>

</body>

</html>