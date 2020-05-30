<?php
	session_start();
	if(!isset($_SESSION['adid']))
	{
		header("location:pagelogin.php");
	}
else{ 
		$crs=$_GET['crs'];
		$slno=1;
?>
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
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$q2=mysql_query("Select * from course where CID='$crs'");
	$res2=mysql_fetch_array($q2);
	$course=$res2['Course'];
	$q1="select * from busapplicationview where Course='$course'";
		$res1=mysql_query($q1);
	?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">Application</strong>
		</div>

		<div class="table-stats order-table ov-h" id="student">
			<table class="table ">
				<thead>
					<tr>
						<th class="serial">#</th>
						<th class="avatar">Photo</th>
						<th>Name</th>
						<th>Course</th>
						<th>From</th>
						<th>Rate</th>
						<th>Status</th>
					</tr>
				</thead> <?php
		while($arr1=mysql_fetch_array($res1))
		{ 
				?>
			<tbody>
				<tr>
					<td class="serial"><?php echo $slno++;?></td>
					<td class="avatar">
						<div class="round-img">
							<a href="#"><img class="rounded-circle" src="images/student/photo/<?php echo $arr1['Photo'];?>" alt=""></a>
						</div>
					</td>
					<td>  <span class="name"><?php echo $arr1['Firstname']." ".$arr1['Lastname'];?></span> </td>
					<td> <span class="product"><?php echo $arr1['Course'];?></span> </td>
					<td><span ><?php echo $arr1['Placefrom'];?></span></td>
					<td><span class=""><?php echo $arr1['Busfee'];?></span></td>
					<td>
						<span class="badge badge-complete">Complete</span>
					</td>
				</tr>
			</tbody><?php
		} ?>
	  </table>
                            </div> <!-- /.table-stats -->
                        </div>
</div>
<?php
}?>