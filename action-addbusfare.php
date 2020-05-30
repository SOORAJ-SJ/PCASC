<?php
	session_start();
	if(!isset($_SESSION['adid']))
	{
		header("location:pagelogin.php");
	}
else{
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$from=$_POST['from'];
		$rate=$_POST['rate'];
		if($res=mysql_query("insert into collegebusfee values('','$from','college','$rate','0')"))
		{
			?><script>alert("Successfully inserted"); window.location.href="tables-busfareview.php"</script><?php
		}
		else
		{
			?><script>alert("Unsuccessful"); window.location.href="forms-addbusfare.php"</script><?php
		}
	}
?>