<?php
session_start();
if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}
$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<?php include('fhead.php');  ?>
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
			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></h3>
			</a> 
			<a href="mydetailsfaculty.php?myfid=<?php echo $userid ?>"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-user"></i> My Profile</button></a>
			<a href="viewstudentdetails.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-graduation-cap"></i> Student Details</button></a>
			<a href="assessment.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-pencil-square"></i> Assessment Section</button></a>
			<a href="examDetails.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-file"></i> Publish Result</button></a>
			<a href="resultdetails.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-indent"></i> Edit Result</button></a>
			<a href="qureydetails.php"> <button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-question"></i> Student's Query</button>
			<a href="videos.php"> <button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-video-camera"></i> Videos</button>
			<a href="pdfs.php"> <button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class=""></i> PDF_Upload</button>
			<a href="logoutfaculty.php"><button  href="" type="submit" class="btn btn-danger" style="border-radius:0%">Logout</button></a>
		</div>
	</div>
</div>
<?php include('allfoot.php');  ?>