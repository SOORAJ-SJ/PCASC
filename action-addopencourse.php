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
		$did=$_POST['department'];
		$papername=$_POST['papername'];
		$seats=$_POST['seats'];
		$q="insert into opencourse values('','$papername','$did','$seats')";
		if($res=mysql_query($q))
		{
			?><script>alert("Successfull!!");window.location.href="forms-addopencourse.php"</script> <?php	
		}
		else
			?><script>alert("Unsuccessfull!!");window.location.href="forms-addopencourse.php"</script> <?php
}
?>
		
	
		