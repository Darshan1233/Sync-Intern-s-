<?php
session_start();
if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}
$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<?php include('fhead.php');  ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>
			<a href="addassessment.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%">Add Assessment</button></a>
			<a href="manageassessment.php"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%">Manage Assessment</button></a>
		</div>
	</div>
</div>
<?php include('allfoot.php');  ?>