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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tour &amp; Travels System</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.ashu
{
	border:1px solid #333;
	border-collapse:collapse;
		color:#FFF;
		text-shadow:1px 1px 1px #000000; 
}

</style>
</head>

<body>
<div id="header">
  <div align="center"> <marquee behavior="alternate" direction="left" class="headingMain" scrollamount="12">Online Tours &amp; Travels System</marquee> </div>
</div>
<br />
<br />

<div align="center">
 <div class="reg" style="font-size:40px;border:5px ridge gray;height:50px;width:70%;border-radius:105px;text-align:center">Customers Booking</div>
<br><br>
<table border="0" cellpadding="5" cellspacing="5" class="design ashu">
<tr class="labels ashu"><th class="ashu">Sr.No.</th><th class="ashu">E-Mail</th><th class="ashu">Package Name</th>
<th class="ashu">Journey By</th>
<th class="ashu">Total Amount</th>
<th class="ashu">Members</th>
<th class="ashu">Date</th>
<th class="ashu">Status</th>
<th class="ashu">Delete</th></tr>
<?php
$u=1;
$x=mysqli_query($al, "SELECT * FROM bookings");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels">
<td class="ashu"><?php echo $u;$u++;?></td>
<td class="ashu"><?php echo $y['email'];?></td>
<td class="ashu"><?php echo $y['package'];?></td>
<td class="ashu"><?php echo $y['journey'];?></td>
<td class="ashu"><?php echo "INR ".$y['amount'];?></td>
<td class="ashu"><?php echo $y['members'];?></td>
<td class="ashu"><?php echo $y['date'];?></td>
<?php if($y['status']==0)
{
	
?> <td class="ashu"><a href="app.php?a=<?php echo $y['id'];?>" class="link">Approve</a></td>
<?php } else { ?>
<td class="ashu">Approved</td>
<?php }
?>
<td class="ashu"><a href="deleteH.php?dd=<?php echo $y['id'];?>" class="link">Delete</a></td>
</tr>
<?php } ?>
</table>
<br />
<br />
<a href="ahome.php" class="link">HOME</a>
</div>
</body>

</html>