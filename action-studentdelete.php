<?php
	session_start();
    if(!isset($_SESSION['tid']))
    {
        header("location:pagelogin.php");
    }
else{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$sid=$_GET['sid'];
	echo $sid;
	if(mysql_query("update studentdetails set Status='1' where SID='$sid'"))
	   {
		?><script>alert("Deleted"); window.location="tables-studentdetailsview.php";</script><?php
	   }
}
?>
	