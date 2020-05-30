
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
	if(!isset($_SESSION['id']))
	{
		header("location:pagelogin.php");
	}
else{
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$from=$_POST['from'];
		$a=$_SESSION['id'];
		$res=mysql_query("select * from studentdetails where SID='$a'");
		$arr=mysql_fetch_array($res);
		$course=$arr['FkCID'];
		$sem=$arr['Sem'];
		$rate=$_POST['rate1'];
		if($from!="")
		{
					$res1=mysql_query("insert into collegebus values('','$course','$sem','$a','$from','$rate','')");
			?>
				<!--<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
					<span class="badge badge-pill badge-success">Success</span>
					Successfull!!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>-->
				<script> alert("Successful");window.location.href="forms-collegebus.php"</script>
			<?php 
		}
		else
		{
			?> <!--<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
				<span class="badge badge-pill badge-danger">Unsuccess</span>
				 Unsuccessfull!!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>-->
			<script> alert("Unsuccessful!! Select your Place..");window.location.href="forms-collegebus.php"</script><?php
		}
		
		
	}
?>