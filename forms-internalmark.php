<?php
	session_start();
	if(!isset($_SESSION['tid']))
	{
		header("location:pagelogin.php");
	}
else{
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$res=mysql_query("select * from course");
	?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png"> -->
    <link rel="shortcut icon" type="image/png" href="images/icon2.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="teacher-index.php"><i class="menu-icon fa fa-laptop"></i>Home </a>
					</li>
					<hr>
                    <!--<li class="menu-title">UI elements</li><!-- /.menu-title -->
                   <!-- <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>-->
                           <li><a href="tables-studentdetailsview.php"> <i class="menu-icon fa fa-th"></i> Student Details</a></li>
						<li><a href="tables-studentattendanceview.php"> <i class="menu-icon fa fa-th"></i> Student Attendance View</a></li>	
							<li><a href="tables-internalmarkview.php"> <i class="menu-icon fa fa-th"></i> Internal Marks</a></li>
							<li><a href="tables-teacherleaveview.php"> <i class="menu-icon fa fa-th"></i> Leave View</a></li>
							<li><a href="tables-opencourseview.php"> <i class="menu-icon fa fa-th"></i> Open Course View</a></li>
                   <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">-->
                            <li><a href="forms-attendanceentry.php"> <i class="menu-icon fa fa-th"></i>Attendance Entry</a></li>
                            <li><a href="forms-internalmark.php"> <i class="menu-icon fa fa-th"></i>Internal Mark Entry</a></li>
						   <li><a href="forms-studentreg.php"> <i class="menu-icon fa fa-th"></i>Student Registration</a></li>
						   <li></i><a href="forms-notesupload.php"> <i class="menu-icon fa fa-th"></i>Notes Upload</a></li>
                       <!-- </ul>
                    </li>

                    <li class="menu-title">Icons</li><!-- /.menu-title -->

                   <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Extras</li><!-- /.menu-title -->
                   <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li>-->
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->


    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo5.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/icon2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <!--<button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>-->

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i> 
								<?php
									$q3=mysql_query("select * from newsfeed");
									while($res1=mysql_fetch_array($q3))
									{
									$nid=$res1['NeID'];
									if($res1['Expdate']== date('Y-m-d')||$res1['Expdate']<date('Y-m-d'))
										mysql_query("delete from newsfeed where NeID='$nid'");
									}
									$q3=mysql_query("select * from newsfeed where Recipient='all' or Recipient='teach'");
									$count=mysql_num_rows($q3);
									?>
                                <span class="count bg-primary"><?php echo $count; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have <?php echo $count; ?> Notification</p>
								<?php while($res1=mysql_fetch_array($q3)){ ?>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><!--<img alt="avatar" src="images/avatar/1.jpg">--><i class="fa ti-bell"></i></span>
									<div class="message media-body">
										<span class="name float-left"></span>
                                        <span class="time float-right"><?php echo date('d-m-Y',strtotime ($res1['Date'])); ?></span>
                                        <p><?php echo $res1['Notification']; ?></p> 
									</div>	
                                </a>
								<?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/teacher/photo/<?php $a=$_SESSION['tid']; $res6=mysql_query("select * from teacherdetails where TID='$a'"); $arr6=mysql_fetch_array($res6); echo $arr6['Photo'];?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="teacher-index.php"><i class="fa fa-user"></i>My Profile</a>

                            <!--<a class="nav-link" href="#"><i class="fa fa-bell-o"></i>Notifications <span class="count">13</span></a>-->

                            <a class="nav-link" href="forms-resetpass.php"><i class="fa fa-pencil"></i>Reset Password</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Internal Mark Entry</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Home</a></li>
                                    
                                    <li class="active">Internal Mark Entry</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<form method="post" action="action-internalmark.php">
        <div class="content">
            <div class="animated fadeIn">

                <div class="row">
<script>
function showPaper(sem) {
	var crs=document.getElementById("crs").value;
  if (sem=="") {
    document.getElementById("paper").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("paper").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getpaper.php?sem="+sem+"&crs="+crs,true);
  xmlhttp.send();
	showUser();
}
function showUser() {
	var sem=document.getElementById("sem").value;
	var crs=document.getElementById("crs").value;
  if (sem=="") {
    document.getElementById("student").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("student").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getstudent.php?sem="+sem+"&crs="+crs,true);
  xmlhttp.send();
}
</script>
                    <div class="col-xs-6 col-sm-12">
                        <div class="card">
                            <!--<div class="card-header">
                                <strong class="card-title">Internal Mark Entry</strong>
                            </div>-->
                            <div class="card-body">
								<form method="post" action="#">
								<div class="row form-group">
									<div class="col col-md-2"><label class=" form-control-label">Course</label></div>
									<div class="col-6 col-md-3">
                              			<select data-placeholder="select" id="crs" name="course" class="form-control" tabindex="1">
											<option value="" label="default"></option>
											<?php
											while($arr=mysql_fetch_array($res))
											{?>
												<option value="<?php echo $arr['CID'];?>"><?php echo $arr['Course'];?></option><?php
											}?>
											
										</select>
                       				 </div>
								</div>
			
						
							<div class="row form-group">
								<div class="col col-md-2"><label class=" form-control-label">Semester</label></div>
								<div class="col-6 col-md-3">
									  <select data-placeholder="select" class="form-control" name="sem" id="sem" tabindex="1" onChange="showPaper(this.value)">
										<option value="" label="default">select</option>
										<option value="1">FIRST</option>
										<option value="2">SECOND</option>
										<option value="3">THIRD</option>
										  <option value="4">FOURTH</option>
										  <option value="5">FIFTH</option>
										  <option value="6">SIXTH</option>
										  
									</select>
		                        </div>
							</div>
								
						
						<div class="row form-group">
								<div class="col col-md-2"><label class=" form-control-label">Paper</label></div>
								<div class="col-6 col-md-3" id="paper">
									 <select data-placeholder="select" class="form-control" tabindex="1" name="paper" >
										
									</select>
                        		</div>
						</div>
						
						<div class="row form-group">
								<div class="col col-md-2"><label class=" form-control-label">Student Name</label></div>
								<div class="col-6 col-md-3" id="student">
								  <select data-placeholder="select" class="form-control" tabindex="1" name="student" >
								   <!-- <option value="Afghanistan">Afghanistan</option>
									<option value="Aland Islands">Aland Islands</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Anguilla">Anguilla</option>
									<option value="Antarctica">Antarctica</option>-->
								</select>
                       		 </div>
						</div>
                    
					<div class="row form-group">
						<div class="col col-md-2"><label for="text-input" class=" form-control-label">Marks</label></div>
						<div class="col-6 col-md-3"><input type="text" id="text-input" name="mark" placeholder="mark" class="form-control"></div>
					 </div>
						<div class="form-actions form-group">
								<div class="col-lg-3 col-md-4"><input type="submit" class="btn btn-primary btn-sm"> <input type="reset" class="btn btn-secondary btn-sm"></div>
						</div>
				</div>
			</div>
			</div>
			</div>
</div><!-- .animated -->
</div><!-- .content -->
</form>
    <div class="clearfix"></div>

    <!--<footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; 2018 Ela Admin
                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="https://colorlib.com">Colorlib</a>
                </div>
            </div>
        </div>
    </footer>-->


</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

</body>
</html>
<?php } ?>