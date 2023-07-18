<?php
session_start();
if ($_SESSION["fidx"] == "" || $_SESSION["fidx"] == NULL) {
    header('Location:facultylogin');
    exit();
}
$userid = $_SESSION["fidx"];
$fname = $_SESSION["fname"];
?>
<?php include('fhead.php');  ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Welcome Faculty: <a href="welcomefaculty.php"><span style="color:#FF0004"> <?php echo $fname; ?></span></a></h3>
            <?php
            include("database.php");
            if (isset($_REQUEST['deleteid'])) {
                $deleteid = $_GET['deleteid'];
                $sql = "DELETE FROM `pdf` WHERE pdf_id = $deleteid";
                if (mysqli_query($connect, $sql)) {
                    echo "
						<br><br>
						<div class='alert alert-success fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Success!</strong> PDF details deleted.
						</div>
						";
                } else {
                    echo "<br><Strong>PDF Details Deletion Failure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error($connect);
                }
            }
            mysqli_close($connect);
            ?>
            <?php
            include('database.php');
            $sql = "SELECT * FROM pdf";
            $rs = mysqli_query($connect, $sql);
            echo "<h2 class='page-header'>PDF Details</h2>";
            echo "<table class='table table-striped' style='width:100%'>
				<tr>
					<th>#</th>
					<th>PDF Title</th>
					<th>Description</th>
					<th>Actions</th>		
				</tr>";
            $count = 1;
            while ($row = mysqli_fetch_array($rs)) {
                ?>
                <tr>
                    <td>
                        <?php echo $count; ?>
                    </td>
                    <td>
                        <?php echo $row['pdf_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['pdf_remark']; ?>
                    </td>
                    <td>
                        <a href="managepdfs.php?deleteid=<?php echo $row['pdf_id']; ?>">
                            <input type="button" Value="Delete" class="btn btn-danger btn-sm" style="border-radius:0%" data-toggle="modal" data-target="#myModal">
                        </a>
                        <a href="managepdfs2.php?editassid=<?php echo $row['pdf_id']; ?>">
                            <input type="button" Value="Edit" class="btn btn-success btn-sm" style="border-radius:0%" data-toggle="modal" data-target="#myModal">
                        </a>
                    </td>
                </tr>
                <?php
                $count++;
            }
            ?>
            </table>
        </div>
    </div>
</div>
<?php include('allfoot.php');  ?>
