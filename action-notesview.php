<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("location:pagelogin.php");
}
else
{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$a=$_SESSION['id'];
	$q="select FkCID,Sem from studentdetails where SID='$a'";
	$res=mysql_query($q);
	$arr=mysql_fetch_array($res);
	echo $arr['FkCID'];
}