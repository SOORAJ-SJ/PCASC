<?php
	session_start();
    if(!isset($_SESSION['adid']))
    {
        header("location:pagelogin.php");
    }
else{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$cbfid=$_GET['cbfid'];
	if(mysql_query("update collegebusfee set Status='1' where CBFID='$cbfid'"))
	   {
		?><script>alert("Deleted"); window.location="tables-busfareview.php";</script><?php
	   }
}
?>
	