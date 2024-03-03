<?php require_once("config.php");
$id = $_GET['id']; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="section_styles.css">
	<title>Image Upload and edit in PHP and MYSQL database</title>
	
</head>

<body>
	<?php
	if (isset($_POST['update_submit'])) {
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
		if ($file != '') {
			//Set image upload size 
			if ($_FILES["project_image"]["size"] > 5000000) {
				$error[] = 'Sorry, your image is too large. Upload less than 5000 KB in size.';
			}
			//Allow only JPG, JPEG, PNG & GIF 
			if (
				$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif"
			) {
				$error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
			}
		}
		if (!isset($error)) {
			if ($file != '') {
				$res = mysqli_query($db, "SELECT* from projects WHERE id=$id limit 1");
				if ($row = mysqli_fetch_array($res)) {
					$deleteimage = $row['project_image'];
				}
				unlink($folder . $deleteimage);
				move_uploaded_file($file, $target_file);
				$result = mysqli_query($db, "UPDATE projects SET project_image='$image_file',project_name='$project_name',youtube_link='$youtube_link',github_link='$github_link' WHERE id=$id");
			} else {
				$result = mysqli_query($db, "UPDATE projects SET project_name='$project_name',youtube_link='$youtube_link',github_link='$github_link' WHERE id=$id");
			}
			if ($result) {
				header("location:../admin.php?action=saved");
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
	$res = mysqli_query($db, "SELECT* from projects WHERE id=$id limit 1");
	if ($row = mysqli_fetch_array($res)) {
		$project_image = $row['project_image'];
		$project_name=$row['project_name'];
        $youtube_link=$row['youtube_link'];
        $github_link=$row['github_link'];
	}
	?>
	<div class="container_section" style="width:500px;">
		<h1> Edit </h1>
		<?php if (isset($update_sucess)) {
			echo '<div class="success">Project Updated successfully</div>';
		} ?>
		<form action="" method="POST" enctype="multipart/form-data">
			<label>Project Image</label><br>
			<img src="uploads/<?php echo $project_image; ?>" height="100px" width="150px"><br>
			<label>Change Project Image </label>
			<input type="file" name="project_image" class="form-control">
			<label>Project Name</label>
			<input type="text" name="project_name" value="<?php echo $project_name; ?>" class="form-control">
			<label>Youtube Link</label>
			<input type="text" name="youtube_link" value="<?php echo $youtube_link; ?>" class="form-control">
			<label>Github Link</label>
			<input type="text" name="github_link" value="<?php echo $github_link; ?>" class="form-control">
			<br><br>
			<button name="update_submit" class="btn-primary">Update</button>
		</form>
	</div>
</body>

</html>