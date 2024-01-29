<?php
include("setting.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al, "SELECT * FROM customers WHERE email='$email'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['old']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	//ASL Do Nothing
}
else
{
if($old!=$pass)
{
	$info="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$info="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($al, "UPDATE admin SET password='$p2' WHERE aid='$aid'");
		$info="Successfully Changed your Password";
	}

}
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tour &amp; Travels System</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<style >
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
<marquee behavior="alternate" direction="left" class="headingMain" scrollamount="12">Online Tours &amp; Travels System</marquee>
</div>
<br />
<br />

<div align="center">


<div class="reg" style="font-size:40px;border:5px ridge gray;height:50px;width:50%;border-radius:105px;text-align:center;text-transform:uppercase;"> <?php echo $name;?>  Can Change Password</div>
<br>
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="design" align="center">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Old Password :</td><td><input type="password" name="old" size="25" class="fields" placeholder="Enter Old Password" required="required" /></td></tr>
<tr><td class="labels">New Password :</td><td><input type="password" name="p1" size="25" class="fields" placeholder="Enter New Password" required="required"  /></td></tr>
<tr><td class="labels">Re-Type Password :</td><td><input type="password" name="p2" size="25"  class="fields" placeholder="Re-Type New Password" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Change Password" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="home.php" class="link">HOME</a>
</div>
</body>

</html>