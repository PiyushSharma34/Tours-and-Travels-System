<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:admin.php");
}
$a=$_GET['a'];
mysqli_query($al, "UPDATE bookings SET status='1' WHERE id='$a'");
header("location:orders.php");
?>