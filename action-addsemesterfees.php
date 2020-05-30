<?php
	session_start();
	if(!isset($_SESSION['adid']))
	{
		header("location:pagelogin.php");
	}
else{
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$crs=$_POST['crs'];
		$fee=$_POST['fee'];
		if($res=mysql_query("insert into semesterfees values('','$crs','$fee','0')"))
		{
			?><script>alert("Successfully inserted"); window.location.href="tables-semesterfeesview.php"</script><?php
		}
		else
		{
			?><script>alert("Unsuccessful"); window.location.href="forms-addsemesterfees.php"</script><?php
		}
	}
?>