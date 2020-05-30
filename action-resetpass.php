<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("pcasc");
$cpass=$_POST['cpass'];
$pass=$_POST['pword'];
$rpass=$_POST['rpword'];
if(isset($_SESSION['adid']))
{
	$adid=$_SESSION['adid'];
	$q="select * from admindetails where AdID='$adid'";
	$res=mysql_query($q);
	$arr=mysql_fetch_array($res);
	$oldpass=$arr['Password'];
	if($cpass==$oldpass)
	{
		if($pass==$rpass)
		{
			if(mysql_query("update admindetails set Password='$pass' where AdID='$adid'"))
			{
				session_destroy();
				?><script>alert("Password changed succesfully");window.location.href="pagelogin.php"</script><?php
			}
			else
			{
				?><script>alert("invalid username/password");window.location.href="pagelogin.php"</script><?php
			}
		}
		else
		{
			?><script>alert("Passwords doesn't match");window.location.href="forms-resetpass.php"</script><?php
		}
	}
	else
	{
		?><script>alert("Incorrect Password");window.location.href="forms-resetpass.php"</script><?php
	}
}
		
if(isset($_SESSION['tid']))
{
	$tid=$_SESSION['tid'];
	$q="select * from teacherdetails where TID='$tid'";
	$res=mysql_query($q);
	$arr=mysql_fetch_array($res);
	$oldpass=$arr['Password'];
	if($cpass==$oldpass)
	{
		if($pass==$rpass)
		{
			if(mysql_query("update teacherdetails set Password='$pass' where TID='$tid'"))
			{
				session_destroy();
				?><script>alert("Password changed succesfully");window.location.href="pagelogin.php"</script><?php
			}
			else
			{
				?><script>alert("invalid username/password");window.location.href="pagelogin.php"</script><?php
			}
		}
		else
		{
			?><script>alert("Passwords doesn't match");window.location.href="forms-resetpass.php"</script><?php
		}
	}
	else
	{
		?><script>alert("Incorrect Password");window.location.href="forms-resetpass.php"</script><?php
	}
}
if(isset($_SESSION['id']))
{
	$id=$_SESSION['id'];
	$q="select * from studentdetails where SID='$id'";
	$res=mysql_query($q);
	$arr=mysql_fetch_array($res);
	$oldpass=$arr['Password'];
	if($cpass==$oldpass)
	{
		if($pass==$rpass)
		{
			if(mysql_query("update studentdetails set Password='$pass' where SID='$id'"))
			{
				session_destroy();
				?><script>alert("Password changed succesfully");window.location.href="pagelogin.php"</script><?php
			}
			else
			{
				?><script>alert("invalid username/password");window.location.href="pagelogin.php"</script><?php
			}
		}
		else
		{
			?><script>alert("Passwords doesn't match");window.location.href="forms-resetpass.php"</script><?php
		}
	}
	else
	{
		?><script>alert("Incorrect Password");window.location.href="forms-resetpass.php"</script><?php
	}
}
?>