<?php
include("setting.php");
$n=$_POST['name'];
$e=$_POST['email'];
$c=$_POST['contact'];
$p=sha1($_POST['pass']);
if($n!=NULL && $e!=NULL && $c!=NULL && $_POST['pass']!=NULL)
{
	$sql=mysqli_query($al, "INSERT INTO customers(name,email,contact,password) VALUES('$n','$e','$c','$p')");
	if($sql)
	{
		$info="Successfully Registered";
	}
	else
	{
		$info="Email ID Already Exists";
	}
}
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
<div align="center">

<marquee behavior="alternate" direction="left" class="headingMain" scrollamount="12">Online Tours &amp; Travels System</marquee>
</div>
</div>
<br />
<br />
<div align="center"><br/>
<br />

   <div class="reg" style="font-size:40px;border:5px ridge gray;height:50px;width:320px;border-radius:105px;">Registration Panel</div>
<br />




<form method="post" action="">

<table border="0" align="center" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Name : </td><td><input type="text" size="25" name="name" class="fields" placeholder="Enter Full Name" required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Email : </td><td><input type="email" size="25" name="email" class="fields" placeholder="Enter Email ID" required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Contact : </td><td><input type="text" size="25" name="contact" class="fields" placeholder="Enter Mobile No." required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Password : </td><td><input type="password" size="25" name="pass" class="fields" placeholder="Enter Password" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Login" class="fields" /></a></td></tr>
</table>
</form>
<br />
<br />
<div class="btn"><a href="index.php" class="link">HOME</a></div>


</div>


</body>

</html>