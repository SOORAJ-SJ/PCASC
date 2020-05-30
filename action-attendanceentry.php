<?php
	session_start();
	if(!isset($_SESSION['tid']))
	{
		header("location:pagelogin.php");
	}
else{
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$course=$_POST['crs'];
		$sem=$_POST['sem'];
		$date=date('Y-m-d',strtotime ($_POST['date']));
		$time=$_POST['time'];
		$res=mysql_query("SELECT * FROM `studentdetails` WHERE FkCID = '$course' AND Sem = '$sem' AND Status = '0'");
		$count=mysql_num_rows($res);
		foreach($_POST['checkbox1'] as $select)
		{
			$res5=mysql_query("select * from attendance where Date='$date' and FkSID='$select'");
			$count1=mysql_num_rows($res5);
			if($count1==0&&$time==3)
			{
				while($ar=mysql_fetch_array($res))
				{
					$sid=$ar['SID'];
					$res4=mysql_query("select Count from studentdetails where SID='$sid'");
					$arr1=mysql_fetch_array($res4);
					$count=$arr1['Count'];
					$count=$count + 5;
					$res5=mysql_query("update studentdetails set Count=$count where SID='$sid'");
					$q3="insert into attendance(FkSID,FkCID,Sem,Date,Present) values('$sid','$course','$sem','$date','0')";
					$res3=mysql_query($q3);
				}
				//foreach($_POST['checkbox1'] as $select)
				//{
					if($time==3)
					{
						$q2="select * from attendance where Date='$date' and FkSID='$select'";
						$res2=mysql_query($q2);
						$arr=mysql_fetch_array($res2);
						$q="update attendance set Present=$time where Date='$date' and FkSID='$select'";
						$res3=mysql_query($q);
					}
					else
					{
						$q2="select * from attendance where Date='$date' and FkSID='$select'";
						$res2=mysql_query($q2);
						$arr=mysql_fetch_array($res2);
						$presentvalue=$arr['Present'];
						$finalvalue=$presentvalue + 2;
						$q="update attendance set Present=$finalvalue where Date='$date' and FkSID='$select'";
						$res3=mysql_query($q);
					}
					
				//}
			}
			else
			{
				//foreach($_POST['checkbox1'] as $select)
				//{
					if($time==3)
					{
						$q2="select * from attendance where Date='$date'and FkSID='$select'";
						$res2=mysql_query($q2);
						$arr=mysql_fetch_array($res2);
						$q="update attendance set Present=$time where Date='$date' and FkSID='$select'";
						$res3=mysql_query($q);
					}
					else
					{
						$q2="select * from attendance where Date='$date' and FkSID='$select'";
						$res2=mysql_query($q2);
						$arr=mysql_fetch_array($res2);
						$presentvalue=$arr['Present'];
						$finalvalue=$presentvalue + 2;
						$q="update attendance set Present=$finalvalue where Date='$date' and FkSID='$select'";
						$res3=mysql_query($q);
					}
					
				//}
			}
		}	
		if($res3)
		{?>
			<script>alert("Sucessfully updated!!");window.location.href='forms-attendanceentry.php'</script><?php
		}
	}
?>