
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
		header("location:pagelogin.php");
	}
else{
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$course=$_POST['course'];
		$sem=$_POST['sem'];
		$papername=$_POST['papername'];
		$description=$_POST['description'];
		$note=$_FILES['note']['name'];
		$note_file=$_FILES['note']['tmp_name'];
		$note_size=$_FILES['note']['size'];
		$dir="images/";
		move_uploaded_file($note_file,$dir.$note);
		$res=mysql_query("insert into notes(FkCID,Sem,Papername,Description,File) values('$course','$sem','$papername','$description','$note')");
		if($res)
		{
			?><!--<script>alert("Uploaded Successfully");window.location.href="forms-notesupload.php"</script>-->
				<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
					<span class="badge badge-pill badge-success">Success</span>
					You successfully read this important alert.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close" onClick="window.location.href='forms-notesupload.php'">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><?php
			
		}
		else
		{
			?><!--<script>alert("Unsuccessfull!!");window.location.href="forms-notesupload.php"</script>-->
				<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
					<span class="badge badge-pill badge-success">UNSuccess</span>
					You successfully read this important alert.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close" onClick="window.location.href='forms-notesupload.php'">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><?php
		}
}
?>