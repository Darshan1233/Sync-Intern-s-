<?php
session_start();
if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin.php' );
}
$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$sEno = $_SESSION[ "seno" ];
$userlname = $_SESSION[ "lname" ];
?>
<?php include('studenthead.php'); ?>
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
			<h3> Welcome Student : <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></h3>
			</a> 
			<a href="mydetailsstudent.php?myds=<?php echo $userid;  ?>"> <button type="submit" class="btn btn-success" style="border-radius:0%;" title="My Details"><i class="fa fa-user"></i> My Profile</button></a>
			<a href="takeassessment.php?seno=<?php echo $sEno; ?>"> <button  type="submit" class="btn btn-success" style="border-radius:0%;" ><i class="fa fa-pencil-square"></i> Take Assessment</button></a>
			<a href="viewresult.php?seno=<?php echo $sEno;  ?>"> <button  href="" type="submit" class="btn btn-success" style="border-radius:0%;"><i class="fa fa-file"></i> View Results</button> </a>
			<a href="askquery.php?eid=<?php echo $userid;  ?>"> <button  href="" type="submit" class="btn btn-success" style="border-radius:0%;"><i class="fa fa-question"></i> Ask Query</button></a>
			<a href="viewquery.php?eid=<?php echo $userid;  ?>"> <button  href="" type="submit" class="btn btn-success" style="border-radius:0%;"><i class="fa fa-question-circle"></i> My Query</button> </a>
			<a href="viewvideos.php?eid=<?php echo $userid;  ?>"> <button  href="" type="submit" class="btn btn-success" style="border-radius:0%;"><i class="fa fa-video-camera"></i> Videos (E-Learn)</button></a>
			<a href="studymaterial.php?eid=<?php echo $userid;  ?>"> <button  href="" type="submit" class="btn btn-success" style="border-radius:0%;"><i class=""></i> Study Material</button></a>
			<a href="logoutstudent.php"><button  href="" type="submit" class="btn btn-danger" style="border-radius:0%;">Logout</button></a>
		</div>
	</div>
</div>
<?php include('allfoot.php'); ?>