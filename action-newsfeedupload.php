
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
	if(!isset($_SESSION['adid']))
	{
		header("location:pagelogin.php");
	}
else{
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$date=date('Y-m-d');
		$exdate=$_POST['exdate'];
		$news=$_POST['notification'];
		$to=$_POST['to'];
	if(mysql_query("insert into newsfeed(Date,Notification,Expdate,Recipient) values('$date','$news','$exdate','$to')"))
		{
			?><!--<script>alert("Uploaded Successfully");window.location.href="forms-notesupload.php"</script>-->
				<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
					<span class="badge badge-pill badge-success">Success</span>
					Upload Successful..
					<button type="button" class="close" data-dismiss="alert" aria-label="Close" onClick="window.location.href='forms-newsfeedupload.php'">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><?php
			
		}
		else
		{
			?><!--<script>alert("Unsuccessfull!!");window.location.href="forms-notesupload.php"</script>-->
				<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
					<span class="badge badge-pill badge-danger">Unsuccess</span>
					Upload Failed..
					<button type="button" class="close" data-dismiss="alert" aria-label="Close" onClick="window.location.href='forms-newsfeedupload.php'">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><?php
		}
}
?>