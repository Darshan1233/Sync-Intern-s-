<?php
session_start();
if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}
$userid = $_SESSION[ "umail" ];
?>
<!DOCTYPE  HTML>
<?php include('adminhead.php'); ?>
<header id="myCarousel" class="carousel slide">
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="item">
			<div class="fill" style="background-image:url('images/1707.jpg');"></div>
		</div>
		<div class="item active">
			<div class="fill" style="background-image:url('images/1900x10800.jpg');"></div>
		</div>
		<div class="item">
			<div class="fill" style="background-image:url('images/198989.jpg');"></div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
</header>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h3> Welcome <a href="welcomeadmin.php">Admin</a></h3>			
			<a href="studentdetails.php"><button  href="" type="submit" class="btn btn-success" style="border-radius:0%"><i class="fa fa-graduation-cap"></i> Student Details</button></a>
			<a href="facultydetails.php"><button  href="" type="submit" class="btn btn-success" style="border-radius:0%"><i class="fa fa-users"></i> Faculty Details</button></a>
			<a href="guestdetails.php"><button  href="" type="submit" class="btn btn-success" style="border-radius:0%"><i class="fa fa-user"></i> Guest Details</button></a>
			<a href="logoutadmin.php"><button  href="" type="submit" class="btn btn-danger" style="border-radius:0%">Logout</button></a>
		</div>
	</div>
</div>