<?php
	session_start();
    if(!isset($_SESSION['adid']))
    {
        header("location:pagelogin.php");
    }
else{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$did=$_GET['did'];
	if(mysql_query("update department set Status='1' where DID='$did'"))
	   {
		?><script>alert("Deleted"); window.location="tables-departmentview.php";</script><?php
	   }
}
?>
	