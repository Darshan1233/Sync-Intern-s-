<?php
session_start();
if (empty($_SESSION["fidx"]) || $_SESSION["fidx"] == null) {
    header('Location: facultylogin');
    exit();
}

$userid = $_SESSION["fidx"];
$fname = $_SESSION["fname"];

include('database.php');

if (isset($_POST['update'])) {
    $make = $_GET['editassid'];
    $title = $_POST['pdf_name'];
    $pdfContent = file_get_contents($_FILES['pdf_org']['tmp_name']);
    $pdfSize = $_FILES['pdf_org']['size'];
    $pdfType = $_FILES['pdf_org']['type'];
    $info = $_POST['pdf_remark'];

    $query = "UPDATE `pdf` SET `pdf_name`=?, `pdf_content`=?, `pdf_size`=?, `pdf_type`=?, `pdf_remark`=? WHERE `pdf_id`=?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "sssisi", $title, $pdfContent, $pdfSize, $pdfType, $info, $make);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $successMessage = "PDF updated successfully.";
    } else {
        $errorMessage = "Failed to update PDF.";
    }

    mysqli_stmt_close($stmt);
}

include('fhead.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Welcome Faculty: <a href="welcomefaculty.php"><span style="color:#FF0004"><?php echo $fname; ?></span></a></h3>

            <?php if (isset($successMessage)): ?>
                <div class="alert alert-success fade in" style="margin-top:10px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                    <strong><h3 style="margin-top: 10px; margin-bottom: 10px;"><?php echo $successMessage; ?></h3></strong>
                </div>
            <?php endif; ?>

            <?php if (isset($errorMessage)): ?>
                <div class="alert alert-danger fade in" style="margin-top:10px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                    <strong><h3 style="margin-top: 10px; margin-bottom: 10px;"><?php echo $errorMessage; ?></h3></strong>
                </div>
            <?php endif; ?>

            <fieldset>
                <legend>Update PDF</legend>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table table-hover">
                        <?php
                        $make = $_GET['editassid'];
                        $query = "SELECT * FROM `pdf` WHERE `pdf_id`=?";
                        $stmt = mysqli_prepare($connect, $query);
                        mysqli_stmt_bind_param($stmt, "i", $make);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_assoc($result);
                        mysqli_stmt_close($stmt);
                        ?>

                        <tr>
                            <td><strong>PDF ID</strong></td>
                            <td><?php echo $row['pdf_id']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>PDF Title</strong></td>
                            <td><textarea name="pdf_name" rows="1" cols="50" class="form-control"><?php echo $row['pdf_name']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td><strong>Upload PDF</strong></td>
                            <td><input type="file" name="pdf_org" required></td>
                        </tr>
                        <tr>
                            <td><strong>PDF Description</strong></td>
                            <td><textarea name="pdf_remark" rows="5" cols="150" class="form-control"><?php echo $row['pdf_remark']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" name="update" class="btn btn-success" style="border-radius:0%;">Update</button></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
</div>

<?php include('allfoot.php'); ?>
