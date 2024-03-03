<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="section_styles.css">
    <title>Achievement Upload in PHP and MYSQL database</title>
</head>

<body>
    <?php
    if (isset($_POST['form_submit'])) {
        $title=$_POST['title'];
        $description=$_POST['description'];
        $folder = "uploads/";
        $image_file = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
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
        if ($_FILES["image"]["size"] > 104857600) {
            $error[] = 'Sorry, your image is too large. Upload less than 1 MB KB in size.';
        }
        if (!isset($error)) {
            // move image in folder 
            move_uploaded_file($file, $target_file);
            $result = mysqli_query($db, "INSERT INTO achievement(image,title,description) VALUES('$image_file','$title','$description')");
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
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
            <label>Description</label>
            <input type="text" name="description" class="form-control" required>
            <br><br>
            <button name="form_submit" class="btn-primary"> Upload</button>
        </form>
    </div>
</body>

</html>