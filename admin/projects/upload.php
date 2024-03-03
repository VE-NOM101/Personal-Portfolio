<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="section_styles.css">
    <title>Image Upload in PHP and MYSQL database</title>
</head>

<body>
    <?php
    if (isset($_POST['form_submit'])) {
        $project_name=$_POST['project_name'];
        $project_image=$_POST['project_image'];
        $youtube_link=$_POST['youtube_link'];
        $github_link=$_POST['github_link'];
        $folder = "uploads/";
        $image_file = $_FILES['project_image']['name'];
        $file = $_FILES['project_image']['tmp_name'];
        $path = $folder . $image_file;
        $target_file = $folder . basename($image_file);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        //Allow only JPG, JPEG, PNG & GIF etc formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
        }
        //Set image upload size 
        if ($_FILES["project_image"]["size"] > 1048576) {
            $error[] = 'Sorry, your image is too large. Upload less than 1 MB KB in size.';
        }
        if (!isset($error)) {
            // move image in folder 
            move_uploaded_file($file, $target_file);
            $result = mysqli_query($db, "INSERT INTO projects(project_image,project_name,youtube_link,github_link) VALUES('$image_file','$project_name','$youtube_link','$github_link')");
            if ($result) {
                header("location:../admin.php?image_success=1");
            } else {
                echo 'Something went wrong';
            }
        }
    }
    if (isset($error)) {

        foreach ($error as $error) {
            echo '<div class="message">' . $error . '</div><br>';
        }
    }
    ?>
    <div class="container_section">
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Project Image</label>
            <input type="file" name="project_image" class="form-control" required>
            <label>Project Name</label>
            <input type="text" name="project_name" class="form-control" required>
            <label>Youtube Link</label>
            <input type="text" name="youtube_link" class="form-control" required>
            <label>Github Link</label>
            <input type="text" name="github_link" class="form-control" required>
            <br><br>
            <button name="form_submit" class="btn-primary"> Upload</button>
        </form>
    </div>
</body>

</html>