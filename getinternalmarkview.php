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
mysql_connect("localhost","root","");
mysql_select_db("pcasc");
$q="select * from studentdetails where FkCID='$crs' and Sem='$sem'";
$res=mysql_query($q);
$slno=1;
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">Internal Mark</strong>
		</div>

		<div class="table-stats order-table ov-h" id="student">
			<table class="table ">
				<thead>
					<tr>
						<th class="serial">#</th>
						<th class="avatar">Photo</th>
						<th>Name</th>
						<?php
							$q1="select * from paper where FkCID='$crs' and Sem='$sem'";
							$res1=mysql_query($q1);
							$count=0;
							while($arr1=mysql_fetch_array($res1))
							{
								?>
								<th><?php echo $arr1['Papername']; $count++; ?></th>
							<?php
							} ?>
						
						<!--<th>Status</th>-->
					</tr>
				</thead>
		<?php
		while($arr=mysql_fetch_array($res))
		{ 
			$sid=$arr['SID'];
				?>
			<tbody>
				<tr>
					<td class="serial"><?php echo $slno++;?></td>
					<td class="avatar">
						<div class="round-img">
							<a href="#"><img class="rounded-circle" src="images/student/photo/<?php echo $arr['Photo'];?>" alt=""></a>
						</div>
					</td>
					<td>  <?php echo $arr['Firstname']." ".$arr['Lastname'];?> </td>
					<?php 
		 				$res2=mysql_query("select * from internalmark where FkSID='$sid' and Sem='$sem'");
						while($arr2=mysql_fetch_array($res2))
						{?>
							<td> <?php echo $arr2['Mark'];?> </td>
						<?php
						} ?>
							
					
				</tr>
			</tbody><?php
		}?>
		<?php } ?>
      </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>