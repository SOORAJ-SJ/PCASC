<?php
	session_start();
	if(!isset($_SESSION['tid']))
	{
		header("location:pagelogin.php");
	}
else{ ?>
<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<?php
	$sem=$_GET['sem'];
	$crs=$_GET['crs'];
	$date=$_GET['date'];
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$q="select * from studentdetails where FkCID='$crs' and Sem='$sem' and Status='0' order by Firstname,Lastname ASC";
	$res=mysql_query($q);
	$slno=1;
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">Student Details</strong>
		</div>

		<div class="table-stats order-table ov-h" id="student">
			<table class="table ">
				<thead>
					<tr>
						<th class="serial">#</th>
						<th class="avatar">Photo</th>
						<th>ID</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>FN</th>
						<th>AN</th>
						<th>Current %</th>
					</tr>
				</thead>
		<?php
		while($arr=mysql_fetch_array($res))
		{ 
				$sid=$arr['SID'];?>
			<tbody>
				<tr>
					<td class="serial"><?php echo $slno++;?></td>
					<td class="avatar">
						<div class="round-img">
							<a href="#"><img class="rounded-circle" src="images/student/photo/<?php echo $arr['Photo'];?>" alt=""></a>
						</div>
					</td>
					<td> <?php echo $arr['SID'];?></td>
					<td>  <span class="name"><?php echo $arr['Firstname']." ".$arr['Lastname'];?></span> </td>
					<td><span class="count"><?php echo $arr['Phone'];?></span></td>
					<?php $q=mysql_query("select * from attendance where FkSID='$sid' and Date='$date'");
							date_default_timezone_set("Asia/Kolkata");
							$time=date("H:i:sa");
							$t="13:45:00";
							if($date!=date("Y-m-d"))
							{
								while($arr1=mysql_fetch_array($q))
								{
									if($arr1['Present']=='5')
									{?>
										<td>Present</td> 
										<td>Present</td><?php
									}
									else if($arr1['Present']=='3')
									{?>
										<td>Present</td>
										<td>Absent</td><?php
									}
									else if($arr1['Present']=='2')
									{?>
										<td>Absent</td>
										<td>Present</td> <?php
									}
									else
									{?>
										<td>Absent</td>
										<td>Absent</td><?php
									}
								}
							}
							else
							{
								while($arr1=mysql_fetch_array($q))
								{
									if($arr1['Present']=='5')
									{?>
										<td>Present</td> 
										<td>-</td><?php
									}
									else if($arr1['Present']=='3')
									{?>
										<td>Present</td>
										<td>-</td><?php
									}
									else if($arr1['Present']=='2')
									{?>
										<td>Absent</td>
										<td>-</td> <?php
									}
									else
									{?>
										<td>Absent</td>
										<td>-</td><?php
									}
								}
							}
					 $cdate=date("Y-m-d");
					 $semstartdate=$arr['Semstartdate'];
					 $count=$arr['Count'];
					 if($count==0)
					 {

					 }
					 $present=0;
					 $res1=mysql_query("select * from attendance where FkSID=$sid and Date between '$semstartdate' and '$cdate'");
					while($arr2=mysql_fetch_array($res1))
					{
						$a=$arr2['Present'];
						$present=$present + $a;
					}
					if($count==0)
					{
						$percent=($present/1)*100;
					}
					else
					{
						$percent=($present/$count)*100;
					}
					
					?>
					<td><?php echo $percent; ?>%</td>
				</tr>
			</tbody><?php
		}?>
		<?php } ?>
      </tbody>
		</table>
	</div> <!-- /.table-stats -->
</div>
</div>