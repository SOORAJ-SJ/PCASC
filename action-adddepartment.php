<?php
	session_start();
	if(!isset($_SESSION['adid']))
	{
		header("location:pagelogin.php");
	}
else{
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$a=$_SESSION['adid'];
		$dept=$_POST['dept'];
		$res=mysql_query("insert into department values('','$dept','')");
		?><script>alert("Successfull!!");window.location.href="forms-adddepartment.php"</script> <?php
}
?>