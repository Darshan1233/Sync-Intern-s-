<?php
session_start();
if (empty($_SESSION["fidx"]) || $_SESSION["fidx"] == null) {
    header('Location: facultylogin');
    exit();
}

$userid = $_SESSION["fidx"];
$fname = $_SESSION["fname"];

include('database.php');

if (isset($_POST['submit'])) {
    $title = $_POST['pdf_name'];
    $pdfContent = file_get_contents($_FILES['pdf_org']['tmp_name']);
    $pdfSize = $_FILES['pdf_org']['size'];
    $pdfType = $_FILES['pdf_org']['type'];
    $info = $_POST['pdf_remark'];

    $query = "INSERT INTO `pdf` (`pdf_name`, `pdf_content`, `pdf_size`, `pdf_type`, `pdf_remark`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "ssiss", $title, $pdfContent, $pdfSize, $pdfType, $info);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $successMessage = "PDF added successfully.";
    } else {
        $errorMessage = "Failed to add PDF.";
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
                <legend>Add PDF</legend>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table table-hover">
                        <tr>
                            <td><strong>PDF Title</strong></td>
                            <td>
                                <input type="text" class="form-control" name="pdf_name" required>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Upload PDF</strong></td>
                            <td>
                                <input type="file" name="pdf_org" required>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>PDF Description</strong></td>
                            <td>
                                <textarea name="pdf_remark" class="form-control" rows="5" cols="150"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" name="submit" class="btn btn-success" style="border-radius:0%">Add PDF</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
</div>

<?php include('allfoot.php'); ?>
