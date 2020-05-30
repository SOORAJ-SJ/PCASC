<?php
	session_start();
	if(!isset($_SESSION['adid']))
	{
		header("location:pagelogin.php");
	}
else{
		?> <script> 
			function myFunction() 
			{
				  var r = confirm("Are you sure about to update the semester of students, then Click OK..!");
				  if (r == true)
				  {
					<?php
						mysql_connect("localhost","root","");
						mysql_select_db("pcasc");
						$q="select * from studentdetails where Status='0'";
						$res=mysql_query($q);
						while($arr=mysql_fetch_array($res))
						{
							$sid=$arr['SID'];
							$sem=$arr['Sem'];
							$cid=$arr['FkCID'];
							$d=date("Y-m-d");
							if($sem==1)
							{
								$res1=mysql_query("update internalmark set Status='1' where FkCID='$cid' and Sem='$sem' and FkSID='$sid'");
								$res2=mysql_query("update studentdetails set Sem='2',Semstartdate='$d',Count='0' where SID='$sid'");
							}
							else if($sem==2)
							{
								$res1=mysql_query("update internalmark set Status='1' where FkCID='$cid' and Sem='$sem' and FkSID='$sid'");
								$res2=mysql_query("update studentdetails set Sem='3',Semstartdate='$d',Count='0' where SID='$sid'");
							}
							else if($sem==3)
							{
								$res1=mysql_query("update internalmark set Status='1' where FkCID='$cid' and Sem='$sem' and FkSID='$sid'");
								$res2=mysql_query("update studentdetails set Sem='4',Semstartdate='$d',Count='0' where SID='$sid'");
							}
							else if($sem==4)
							{
								$res1=mysql_query("update internalmark set Status='1' where FkCID='$cid' and Sem='$sem' and FkSID='$sid'");
								$res2=mysql_query("update studentdetails set Sem='5',Semstartdate='$d',Count='0' where SID='$sid'");
							}
							else if($sem==5)
							{
								$res1=mysql_query("update internalmark set Status='1' where FkCID='$cid' and Sem='$sem' and FkSID='$sid'");
								$res2=mysql_query("update studentdetails set Sem='6',Semstartdate='$d',Count='0' where SID='$sid'");
							}
							else
							{
								$res1=mysql_query("update internalmark set Status='1' where FkCID='$cid' and Sem='$sem' and FkSID='$sid'");
								$res2=mysql_query("update studentdetails set Status='1',Count='0' where SID='$sid'");
							}
						}
						//header("location:admin-index.php");
					  ?> alert("Successfully updated.."); window.location.href="admin-index.php"
				  } 
				else
				{
					alert("UnSuccessful"); window.location.href="admin-index.php"
			  	}
			}
			myFunction();</script> <?php
}
?>