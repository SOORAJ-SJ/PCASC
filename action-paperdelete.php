<?php
	session_start();
    if(!isset($_SESSION['adid']))
    {
        header("location:pagelogin.php");
    }
else{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$pid=$_GET['pid'];
	if(mysql_query("update paper set Status='1' where PID='$pid'"))
	   {
		?><script>alert("Deleted"); window.location="tables-paperview.php";</script><?php
	   }
}
?>
	