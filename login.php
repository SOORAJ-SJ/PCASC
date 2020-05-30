<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("pcasc");
$uname=$_POST['uname'];
$pass=$_POST['pword'];
$user=$_POST['usertype'];
if($user=="student")
{
	$q="select * from studentdetails where Username='$uname' and Password='$pass'";
	$res=mysql_query($q);
	$arr=mysql_fetch_array($res);
	$sem=$arr['Sem'];
	$_SESSION['id']=$arr['SID'];
	$a=$arr['SID'];
	$count=mysql_num_rows($res);
	if($count>0)
	{
		$res1=mysql_query("select * from opencourseselect where FkSID='$a'");
		$count1=mysql_num_rows($res1);
		if($sem==5&&$count1==0)
		{
			header("location:student-5index.php");
		}
		else
		{
			header("location:student-index.php");
		}
		
	}
	else
	{
		?><script>alert("invalid username/password");window.location.href="index.html"</script><?php
	}
}
else if($user=="teacher")
{
	$q="select * from teacherdetails where Username='$uname' and Password='$pass'";
	$res=mysql_query($q);
	$arr=mysql_fetch_array($res);
	$_SESSION['tid']=$arr['TID'];
	$count=mysql_num_rows($res);
	if($count>0)
	{
		header("location:teacher-index.php");
	}
	else
	{
		?><script>alert("invalid username/password");window.location.href="index.html"</script><?php
	}
}
else if($user=="principal")
{
	$q="select * from teacherdetails where Username='$uname' and Password='$pass'";
	$res=mysql_query($q);
	$arr=mysql_fetch_array($res);
	$_SESSION['tid']=$arr['TID'];
	$count=mysql_num_rows($res);
	if($count>0)
	{
		header("location:principal-index.php");
	}
	else
	{
		?><script>alert("invalid username/password");window.location.href="index.html"</script><?php
	}
}
else
{
	$q="select * from admindetails where Username='$uname' and Password='$pass'";
	$res=mysql_query($q);
	$arr=mysql_fetch_array($res);
	$_SESSION['adid']=$arr['AdID'];
	$count=mysql_num_rows($res);
	if($count>0)
	{
		header("location:admin-index.php");
	}
	else
	{
		?><script>alert("invalid username/password");window.location.href="index.html"</script><?php 
	}
}
?>