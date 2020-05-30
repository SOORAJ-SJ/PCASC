<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("location:pagelogin.php");
	}
else{
		mysql_connect("localhost","root","");
		mysql_select_db("pcasc");
		$a=$_SESSION['id'];
		$q="select * from studentdetails where SID='$a'";
		$res=mysql_query($q);
		$arr=mysql_fetch_array($res);
		$did=$arr['FkDID'];
		$res2=mysql_query("select * from opencourse where FkDID!='$did'");
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PCASC - Student</title>
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                          <a href="student-5index.php"><i class="menu-icon fa fa-laptop"></i>Home </a>
                    </li><hr>
                    
                            <li><a href="tables-5notes.php"> <i class="menu-icon fa fa-th"></i> Notes</a></li>
					<li><a href="tables-5questionbank.php"> <i class="menu-icon fa fa-th"></i> Question Bank</a></li>
							<li><a href="student-5internalmarkview.php"> <i class="menu-icon fa fa-th"></i> Internal Mark</a></li>
                   <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">-->
                            <li><a href="forms-5collegebus.php"> <i class="menu-icon fa fa-th"></i>College Bus</a></li>
                            <li><a href="forms-5leave.php"> <i class="menu-icon fa fa-th"></i>Leave Form</a></li>
							<li><a href="forms-opencourse.php"> <i class="menu-icon fa fa-th"></i>Open Course</a></li>
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
									$q3=mysql_query("select * from newsfeed where Recipient='all' or Recipient='student'");
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
                            <img class="user-avatar rounded-circle" src="images/student/photo/<?php echo $arr['Photo'];?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="student-index.php"><i class="fa fa-user"></i>My Profile</a>

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
                                <h1>Home</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Home</a></li>
									<li class="active">Open Course</li>
            
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<form method="post" action="action-opencourse.php">
        <div class="content">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-xs-6 col-sm-12">
                        <div class="card">
							<div class="card-header">
                                <strong class="card-title">Add Course</strong>
                            </div>
                            <div class="card-body">
							<div class="row form-group">
								<div class="col col-md-2"><label for="text-input" class=" form-control-label">Marks Percentage</label></div>
								<div class="col-6 col-md-3"><input type="text" id="text-input" name="markspercent" placeholder="Last semester mark %" class="form-control"></div>
							 </div>
								
								<div class="row form-group">
									<div class="col col-md-2"><label class=" form-control-label">First</label></div>
									<div class="col-6 col-md-3">
                              			<select data-placeholder="select" id="first" name="first" class="form-control" tabindex="1">
											<option value="" label="default"></option>
											<?php
											while($arr1=mysql_fetch_array($res2))
											{?>
												<option value="<?php echo $arr1['OPID'];?>"><?php echo $arr1['Papername'];?></option>
											<?php } ?>
										</select>
                   				  </div>
								</div>
								
								<div class="row form-group">
									<div class="col col-md-2"><label class=" form-control-label">Second</label></div>
									<div class="col-6 col-md-3">
                              			<select data-placeholder="select" id="second" name="second" class="form-control" tabindex="1">
											<option value="" label="default"></option>
											<?php $res3=mysql_query("select * from opencourse where FkDID!='$did'");
											while($arr2=mysql_fetch_array($res3))
											{ ?>
												<option value="<?php echo $arr2['OPID'];?>"><?php echo $arr2['Papername'];?></option>
											<?php } ?>
										</select>
                   				  </div>
								</div>
				
								<div class="row form-group">
									<div class="col col-md-2"><label class=" form-control-label">Third</label></div>
									<div class="col-6 col-md-3">
                              			<select data-placeholder="select" id="third" name="third" class="form-control" tabindex="1">
											<option value="" label="default"></option>
											<?php $res4=mysql_query("select * from opencourse where FkDID!='$did'");
											while($arr3=mysql_fetch_array($res4))
											{ ?>
												<option value="<?php echo $arr3['OPID'];?>"><?php echo $arr3['Papername'];?></option>
											<?php }?>
										</select>
                   				  </div>
								</div>
								
								<div class="row form-group">
									<div class="col col-md-2"><label class=" form-control-label">Fourth</label></div>
									<div class="col-6 col-md-3">
                              			<select data-placeholder="select" id="fourth" name="fourth" class="form-control" tabindex="1">
											<option value="" label="default"></option>
											<?php $res5=mysql_query("select * from opencourse where FkDID!='$did'");
											while($arr4=mysql_fetch_array($res5))
											{ ?>
												<option value="<?php echo $arr4['OPID'];?>"><?php echo $arr4['Papername'];?></option>
											<?php }?>
										</select>
                   				  </div>
								</div>
								<div class="row form-group">
									<div class="col col-md-2"><label class=" form-control-label">Fifth</label></div>
									<div class="col-6 col-md-3">
                              			<select data-placeholder="select" id="fifth" name="fifth" class="form-control" tabindex="1">
											<option value="" label="default"></option>
											<?php $res6=mysql_query("select * from opencourse where FkDID!='$did'");
											while($arr5=mysql_fetch_array($res6))
											{ ?>
												<option value="<?php echo $arr5['OPID'];?>"><?php echo $arr5['Papername'];?></option>
											<?php }?>
										</select>
                   				  </div>
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