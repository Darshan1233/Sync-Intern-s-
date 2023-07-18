<?php
include('database.php');

if (isset($_GET['viewid'])) {
    $pdf_id = $_GET['viewid'];

    $sql = "SELECT * FROM pdf WHERE pdf_id = '$pdf_id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $pdf_name = $row['pdf_name'];
        $pdf_data = $row['pdf_content'];

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $pdf_name . '"');
        echo $pdf_data;
        exit();
    } else {
        echo "PDF not found.";
    }
} else {
    echo "Invalid request.";
}
?>
