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
		$course=$_POST['course'];
		$q="insert into course(FkDID,Course) values('$did','$course')";
		if($res=mysql_query($q))
			header("location:forms-addpaper.php");
		else
			?><script>alert("Unsuccessfull!!");window.location.href="forms-addcourse.php"</script> <?php
}
?>
		
	
		