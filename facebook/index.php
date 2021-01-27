<?php>

$img = "assets\img\fd3ccd7b49e366b4206f5ac7f8fa8dac.gif";

$btnImg = filter_input(INPUT_POST, 'avatar', );
$btnPsot = filter_input(INPUT_POST, 'post', );

i($btnPsot == 'poster'){

	$img = $btnImg
}



<?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Facebook Theme Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="assets/css/facebook.css" rel="stylesheet">
    </head>
    
    <body>
        
        <div class="wrapper">
			<div class="box">
				<div class="row row-offcanvas row-offcanvas-left">
					
					
				  
					<!-- main right col -->
					<div class="column col-sm-10 col-xs-11" id="main">
						
						<!-- top nav -->
						<div class="navbar navbar-blue navbar-static-top">  
							<div class="navbar-header">
							  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							  <a href="" class="navbar-brand logo">b</a>
							</div>
							<nav class="collapse navbar-collapse" role="navigation">
							<form class="navbar-form navbar-left">
								<div class="input-group input-group-sm" style="max-width:360px;">
								  <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
								  <div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								  </div>
								</div>
							</form>
							<ul class="nav navbar-nav">
							  <li>
								<a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
							  </li>
							  <li>
								<a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
							  </li>
							  <li>
								<a href="#"><span class="badge">badge</span></a>
							  </li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
								<ul class="dropdown-menu">
								  <li><a href="">More</a></li>
								  <li><a href="">More</a></li>
								  <li><a href="">More</a></li>
								  <li><a href="">More</a></li>
								  <li><a href="">More</a></li>
								</ul>
							  </li>
							</ul>
							</nav>
						</div>
						<!-- /top nav -->
					  
						<div class="padding">
							<div class="full col-sm-9">
							  
								<!-- content -->                      
								<div class="row">
								  
								 <!-- main col left --> 
								 <div class="col-sm-5">
								   
									  <div class="panel panel-default">
										<div class="panel-thumbnail"><img src="assets\img\fd3ccd7b49e366b4206f5ac7f8fa8dac.gif" class="img-responsive"></div>
										<div class="panel-body">
										  <p class="lead">Oeuf</p>
										  <p>Très bo gif</p>
										  
										  <p>
											<img src="assets\img\daft1_2.gif" height="28px" width="28px">
										  </p>
										</div>
									  </div>
				   
								  </div>
								  
								  <!-- main col right -->
								  <div class="col-sm-7">
									   
										<div class="well"> 
										   <form class="form">
											<div class="input-group text-center">
											<h1>Bienvenue sur Book !!</h1>
											</div>
										  </form>
										</div>
							  
										
										<div class="panel panel-default">
										<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootstrap Examples</h4></div>
										  <div class="panel-body">
											<div class="list-group">
											  <a href="http://usebootstrap.com/theme/facebook" class="list-group-item">Modal / Dialog</a>
											  <a href="http://usebootstrap.com/theme/facebook" class="list-group-item">Datetime Examples</a>
											  <a href="http://usebootstrap.com/theme/facebook" class="list-group-item">Data Grids</a>
											</div>
										  </div>
									  </div>
									   								
									  
									
								  </div>
							   </div><!--/row-->
							  
								
							  
								<div class="row" id="footer">    
								  <div class="col-sm-6">
									
								  </div>
								  <div class="col-sm-6">
								  </div>
								</div>
							  
							  <hr>
							  
							  <h4 class="text-center">
							  <a href="" target="ext">Passe une belle journée</a>
							  </h4>
								
							  <hr>
								
							  
							</div><!-- /col-9 -->
						</div><!-- /padding -->
					</div>
					<!-- /main -->
				  
				</div>
			</div>
		</div>
<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog">
		  <div class="modal-content">
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><b>X</b></button>
					Update Status
			  </div>
			  <div class="modal-body">
				  <form class="form center-block" action="#" method="POST">
					<div class="form-group">
					  <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
					  
					</div>
					<input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" multiple >
				  </form>
			  </div>
			  <div class="modal-footer">
				  <div>
				  <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true" name="post" value="poster">Post</button>
				  </div>	
			  </div>
		  </div>
		  </div>
		</div>
        
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
			$('[data-toggle=offcanvas]').click(function() {
				$(this).toggleClass('visible-xs text-center');
				$(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
				$('.row-offcanvas').toggleClass('active');
				$('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
				$('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
				$('#btnShow').toggle();
			});
        });
        </script>

		
</body></html>