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
$n=$_POST['name'];
$am=$_POST['amount'];
if($n!=NULL && $am!=NULL)
{
	$sql=mysqli_query($al, "INSERT INTO holiday(name,amount) VALUES('$n','$am')");
	if($sql)
	{
		$info="Successfully Added";
	}
	else
	{
		$info="Package Name Already Exists";
	}
}
?>

<!DOCTYPE html>
<html>
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
}

</style>
</head>

<body>
<div id="header">
<marquee behavior="alternate" direction="left" class="headingMain" scrollamount="12">Online Tour &amp; Travels System</marquee>
</div>
<br />
<br />
<center>
<div class="reg">Manage Holiday Packages</div>
<br /> 
<form method="post" action="" >
<table border="0" cellpadding="2" cellspacing="2" class="design">
<tr><td align="center" class="info"><?php echo $info;?></td></tr>
<tr><td><input type="text" name="name" placeholder="Enter Holiday Package Name" size="40" class="fields" required="required"  autocomplete="off" /></td></tr>
<tr><td><input type="text" name="amount" placeholder="Enter Amount Per Member" size="40" class="fields" required="required"  autocomplete="off" /></td></tr>
<tr><td align="center"><input type="submit" value="ADD" class="fields" /></td></tr>
</table>
</form>
<br />

  <a href="ahome.php" class="link">HOME</a>
<br />


 <span class="subHead">Current Holiday Packages<br /></span><br />

<table border="0" cellpadding="5" cellspacing="5" class="design ashu">
<tr class="labels ashu"><th class="ashu">Sr.No.</th><th class="ashu">Package Name</th><th class="ashu">Amount Per Member</th><th class="ashu">Delete</th></tr>
<?php
$u=1;
$x=mysqli_query($al, "SELECT * FROM holiday");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels">
<td class="ashu"><?php echo $u;$u++;?></td>
<td class="ashu"><?php echo $y['name'];?></td>
<td class="ashu"><?php echo "INR ".$y['amount'];?></td>
<td class="ashu"><a href="deleteH.php?del=<?php echo $y['id'];?>" class="link">Delete</a></td>
</tr>
<?php } ?>
</table>
</center>
</div>
</body>

</html>