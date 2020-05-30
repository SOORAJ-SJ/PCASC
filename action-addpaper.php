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
		$course=$_POST['crs'];
		$sem=$_POST['sem'];
		$num=$_POST['num'];
		foreach($_POST['paper'] as $key =>$value)
		{
			$q=mysql_query("insert into paper(FkCID,Sem,Papername) values('$course','$sem','$value')");
		}
		?><script>alert("Successfull!!");window.location.href="forms-addpaper.php"</script> <?php
}
?>
		
	
		