<?php
	session_start();
    if(!isset($_SESSION['adid']))
    {
        header("location:pagelogin.php");
    }
else{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$cid=$_GET['cid'];
	if(mysql_query("update course set Status='1' where CID='$cid'"))
	   {
		?><script>alert("Deleted"); window.location="tables-courseview.php";</script><?php
	   }
}
?>
	