<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("location:pagelogin.php");
	}
else{
		$markspercent=$_POST['markspercent'];
		$first=$_POST['first'];
		$second=$_POST['second'];
		$third=$_POST['third'];
		$fourth=$_POST['fourth'];
		$fifth=$_POST['fifth'];
		$sid=$_SESSION['id'];
		$q="select * from studentdetails where SID='$sid'";
		$res=mysql_query($q);
		$arr=mysql_fetch_array($res);
		$cid=$arr['FkCID'];
		$sem=$arr['Sem'];
		if($res1=mysql_query("insert into opencoureseselector values('','$sid','$cid','$sem','$markspercent','$first','$second','$third','$fourth','$fifth')"))
		{
			?><script>alert("Successful"); window.location.href="forms-opencourse.php"</script><?php
		}
		else
			?><script>alert("Unsuccessful"); window.location.href="forms-opencourse.php"</script><?php
	}?>