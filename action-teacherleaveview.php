<?php
	session_start();
    if(!isset($_SESSION['tid']))
    {
        header("location:pagelogin.php");
    }
else{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$lid=$_GET['lid'];
	if(mysql_query("update `leave` set TeacherApproval='1' where LID='$lid'"))
	{
		?><script>alert("Approved"); window.location="tables-teacherleaveview.php";</script><?php
	}
	
}
?>
	