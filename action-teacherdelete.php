<?php
	session_start();
    if(!isset($_SESSION['adid']))
    {
        header("location:pagelogin.php");
    }
else{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$tid=$_GET['tid'];
	if(mysql_query("update teacherdetails set Status='1' where TID='$tid'"))
	   {
		?><script>alert("Deleted"); window.location="tables-teacherdetailsview.php";</script><?php
	   }
}
?>
	