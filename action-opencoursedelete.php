<?php
	session_start();
    if(!isset($_SESSION['adid']))
    {
        header("location:pagelogin.php");
    }
else{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$opid=$_GET['opid'];
	if(mysql_query("update opencourse set Status='1' where OPID='$opid'"))
	   {
		?><script>alert("Deleted"); window.location="tables-opencourseview.php";</script><?php
	   }
}
?>
	