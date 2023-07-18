<?php
session_start();
if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}
$userid = $_SESSION[ "umail" ];
?>
<?php include('adminhead.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h3 class="page-header">Welcome <a href="welcomeadmin.php">Admin</a> </h3>
			<h4 class="page-header">Add New Guest </h4>
			<?php
			include( "database.php" );
			?>
			<form action="" method="POST" name="update">
				<div class="form-group">
					<label for="Faculty Name">Guest email id : <span style="color: #ff0000;">*</span></label>
					<input type="text" name="fname" class="form-control" id="fname" required>
				</div>
				<div class="form-group">
					<label for="Father Name">Guest name :<span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" id="faname" name="faname" required>
				</div>
				<div class="form-group">
					<input type="submit" value="Add New Guest" name="addnewguest" style="border-radius:0%" class="btn btn-success">
				</div>
			</form>
			<?php
			if ( isset( $_POST[ 'addnewguest' ] ) ) {
				$tempfname = $_POST[ 'fname' ];
				$tempfaname = $_POST[ 'faname' ];
				$sql = "insert guest (GuEid, Gname) values ('$tempfname', '$tempfaname')";
				if ( mysqli_query( $connect, $sql ) ) {
					echo "<br>
					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> New guest Addded guest ID is : <strong>" . mysqli_insert_id( $connect ) . "</strong></div>";
				} else {
					echo "<br><Strong>New guest Adding Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
				mysqli_close( $connect );
			}
			?>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<?php include('allfoot.php'); ?>