
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
session_start();
if(!isset($_SESSION['tid']))
{
	header("loation:pagelogin.php");
}
else
{
	mysql_connect("localhost","root","");
	mysql_select_db("pcasc");
	$sid=$_GET['sid'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$dob=$_POST['dob'];
	$gen=$_POST['gender'];
	$religion=$_POST['religion'];
	$caste=$_POST['caste'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$course=$_POST['course'];
	$sem=$_POST['sem'];
	$scndlang=$_POST['scndlang'];
	$address=$_POST['address'];

//	$plustwo=$_FILES['plustwo']['name'];
//	$plustwo_file=$_FILES['plustwo']['tmp_name'];
//	$plustwo_size=$_FILES['plustwo']['size'];
//	$sslc=$_FILES['sslc']['name'];
//	$sslc_file=$_FILES['sslc']['tmp_name'];
//	$sslc_size=$_FILES['sslc']['size'];
//	$photo=$_FILES['photo']['name'];
//	$photo_file=$_FILES['photo']['tmp_name'];
//	$photo_size=$_FILES['photo']['size'];
//	$rand=rand(9999,10);
//	$photo=$rand.$photo;
//
//	$dir="images/student/plustwo/";
//	move_uploaded_file($plustwo_file,$dir.$plustwo);
//	$dirr="images/student/sslc/";
//	move_uploaded_file($sslc_file,$dirr.$sslc);
//	$dirrr="images/student/photo/";
//	move_uploaded_file($photo_file,$dirrr.$photo);
	
	$q="update studentdetails set Firstname='$fname',Lastname='$lname',Dob='$dob',Gender='$gen',Religion='$religion',Caste='$caste',Email='$email',Phone='$phone',Address='$address',FkCID='$course',Sem='$sem',Secondlang='$scndlang' where SID='$sid'";
	$res=mysql_query($q);
	if($res)
	{
		?><!--<script>alert("Uploaded Successfully");window.location.href="forms-studentreg.php"</script>-->
		<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
			<span class="badge badge-pill badge-success">Success</span>
			You successfully updated..
			<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="window.location.href='tables-studentdetailsview.php';">
				<span aria-hidden="true">&times;</span>
			</button>
		</div><?php
	}
	else
	{
		echo $sid;
		?><!--<script>alert("Unsuccessfull!!");window.location.href="forms-studentreg.php"</script>-->
		<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
			<span class="badge badge-pill badge-success">UNSuccess</span>
			Unsuccessfull!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="window.location.href='forms-studentedit.php?sid=$sid';">
				<span aria-hidden="true">&times;</span>
			</button>
		</div><?php
	}
	
	
}
	
?>