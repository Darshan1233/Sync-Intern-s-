<?php
session_start();
?>
<?php
$x = $_POST[ "sid" ];
$y = $_POST[ "pass" ];
include( "database.php" );
$sql = "select * from studenttable where Eid='" . $x . "' and Pass='" . $y . "'";
$result = mysqli_query( $connect, $sql );
if ( $result->num_rows > 0 )
{
	if ( $row = $result->fetch_assoc() ) {
		$_SESSION[ "sidx" ] = $row[ "Eid" ];
		$_SESSION[ "fname" ] = $row[ "FName" ];
		$_SESSION[ "lname" ] = $row[ "LName" ];
		$_SESSION[ "seno" ] = $row[ "Eno" ];
	} 
	header( 'Location:welcomestudent.php' );
} else {
	echo "<h3><span style='color:red; '>Invalid Student ID & Password. Page Will redirect to Login Page after 2 seconds </span></h3>";
	header( "refresh:3;url=studentlogin.php" );
}
$connect->close();
?>