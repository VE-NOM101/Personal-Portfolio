<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="section_styles.css">
    <title>Timeline Upload in PHP and MYSQL database</title>
</head>

<body>
    <?php
    if (isset($_POST['form_submit'])) {
        $duration = $_POST['duration'];
        $role = $_POST['role'];
        $place = $_POST['place'];
        $details_para = $_POST['details_para'];
        $result = mysqli_query($db, "INSERT INTO timeline(duration,role,place,details_para) VALUES('$duration','$role','$place','$details_para')");
        if ($result) {
            header("location:../admin.php?image_success=1");
        } else {
            echo 'Something went wrong';
        }
    }
    ?>
    <div class="container_section">
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control" required>
            <label>Role</label>
            <input type="text" name="role" class="form-control" required>
            <label>Place</label>
            <input type="text" name="place" class="form-control" required>
            <label>Details</label>
            <input type="text" name="details_para" class="form-control" required>
            <br><br>
            <button name="form_submit" class="btn-primary"> Upload</button>
        </form>
    </div>
</body>

</html>