<?php
session_start();
?>
<?php
$x = $_POST[ "fid" ];
$y = $_POST[ "pass" ];
include( "database.php" );
$sql = "select * from facutlytable where FID='" . $x . "' and Pass='" . $y . "'";
$result = mysqli_query( $connect, $sql );
if ( $result->num_rows > 0 )
{
	if ( $row = $result->fetch_assoc() ) {
		$_SESSION[ "fidx" ] = $row[ "FID" ];
		$_SESSION[ "fname" ] = $row[ "FName" ];
	}
	header( 'Location:welcomefaculty.php' );
} else {
	echo "<h3><span style='color:red; '>Invalid Faculty ID & Password. Page Will redirect to Login Page after 3 seconds </span></h3>";
	header( "refresh:3;url=facultylogin.php" );
}
$connect->close();
?>