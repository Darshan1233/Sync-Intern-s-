<?php
session_start();
if ($_SESSION["sidx"] == "" || $_SESSION["sidx"] == NULL) {
    header('Location: studentlogin');
    exit;
}

include('database.php');
$video_id = $_GET['viewid'];
$sql = "SELECT * FROM video WHERE V_id = $video_id";
$rs = mysqli_query($connect, $sql);

if (!$rs || mysqli_num_rows($rs) == 0) {
    echo "Video not found.";
    exit;
}

$row = mysqli_fetch_assoc($rs);
$userfname = $_SESSION["fname"];
$userlname = $_SESSION["lname"];
?>
<?php include('studenthead.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3> Welcome <a href="welcomestudent.php"><span style="color:red;"><?php echo $userfname . " " . $userlname; ?></span></a></h3>
            <h2>Title: <?php echo $row['V_Title']; ?></h2>
            <br>
            <div class="embed-responsive embed-responsive-16by9" style="max-width: 800px;">
                <iframe class="embed-responsive-item" src="<?php echo $row['V_Url']; ?>"></iframe>
            </div>
            <br>
            <p>Video Description: <?php echo $row['V_Remarks']; ?></p>
            <br>
            <a href="viewvideos.php" class="btn btn-info" style="border-radius: 0%;">Back</a>
        </div>
    </div>
</div>
<?php include('allfoot.php'); ?>
