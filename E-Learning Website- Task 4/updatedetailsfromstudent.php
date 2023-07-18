<?php
session_start();
if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}
$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
?>
<?php include('studenthead.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h3> Welcome <a href="welcomestudent"><?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></a></h3>
			<?php
			include( "database.php" );
			$new3 = $_GET[ 'eno' ];
			$sql = "select * from  studenttable where Eno=$new3";
			$result = mysqli_query( $connect, $sql );
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<form action="" method="POST" name="update">
				<div class="form-group">
					Enrolment number : <?php echo $row['Eno']; ?>
				</div>
				<div class="form-group">
					First Name : <input type="text" name="fname" class="form-control" value="<?php echo $row['FName']; ?>">
				</div>
				<div class="form-group">
					Last Name : <input type="text" name="lname" class="form-control" value="<?php echo $row['LName']; ?>"><br>
				</div>
				<div class="form-group">
					Father Name : <input type="text" name="faname" class="form-control" value="<?PHP echo $row['FaName'];?>"><br>
				</div>
				<div class="form-group">
					Addres : <input type="text" name="addrs" class="form-control" value="<?PHP echo $row['Addrs'];?>"><br>
				</div>
				<div class="form-group">
					Gender : <input type="text" name="gender" class="form-control" value="<?PHP echo $row['Gender'];?>"><br>
				</div>
				<div class="form-group">
					Course : <input type="text" name="course" class="form-control" value="<?PHP echo $row['Course'];?>"><br>
				</div>
				<div class="form-group">
					D.O.B. : <input type="text" name="DOB" class="form-control" value="<?PHP echo $row['DOB'];?>" readonly><br>
				</div>
				<div class="form-group">
					Phone Number : <input type="text" name="phno" class="form-control" value="<?PHP echo $row['PhNo'];?>" maxlength="10"><br>
				</div>
				<div class="form-group">
					Email : <input type="text" name="email" class="form-control" value="<?PHP echo $row['Eid'];?>" readonly><br>
				</div>
				<div class="form-group">
					Password : <input type="text" name="pass" class="form-control" value="<?PHP echo $row['Pass'];?>"><br>
				</div><br>
				<div class="form-group">
					<input type="submit" value="Update!" name="update" class="btn btn-primary" style="border-radius:0%">
				</div>
			</form>
			<?php
			}
			?>
			<?php
			if ( isset( $_POST[ 'update' ] ) ) {
				$tempfname = $_POST[ 'fname' ];
				$templname = $_POST[ 'lname' ];
				$tempfaname = $_POST[ 'faname' ];
				$tempaddrs = $_POST[ 'addrs' ];
				$tempgender = $_POST[ 'gender' ];
				$tempcourse = $_POST[ 'course' ];
				$tempphno = $_POST[ 'phno' ];
				$tempeid = $_POST[ 'email' ];
				$temppass = $_POST[ 'pass' ];
				$sql = "UPDATE `studenttable` SET FName='$tempfname', LName='$templname', FaName='$tempfaname', Gender='$tempgender', Course='$tempcourse', Addrs='$tempaddrs', PhNo=$tempphno, Eid='$tempeid', Pass='$temppass'  WHERE Eno=$new3";
				if ( mysqli_query( $connect, $sql ) ) {
					echo "
				<br><br>
				<div class='alert alert-success fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Success!</strong> Student Details has been updated.
				</div>
				";
				} else {
					echo "<br><Strong>Student Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
				mysqli_close( $connect );
			}
			?>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<?php include('allfoot.php'); ?>