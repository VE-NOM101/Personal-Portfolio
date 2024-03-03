<?php
$dbHost = 'localhost';
$dbName = 'myportfolio';
$dbUsername = 'root';
$dbPassword = '';
$db= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'id' is set and is numeric
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!is_numeric($id)) {
    die("Invalid ID");
}

$update_success = ""; // Define the variable for success message

// Your form handling code goes here...
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="header_style.css">
	<title>Image Upload and edit in PHP and MYSQL database</title>
</head>

<body>
	<?php
	if (isset($_POST['update_submit'])) {
		//$title = $_POST['title'];
		$description = $_POST['description'];
		$cv_link=$_POST['cv_link'];
		$folder = "uploads/";
		$image_file = $_FILES['image']['name'];
		$file = $_FILES['image']['tmp_name'];
		$path = $folder . $image_file;
		$target_file = $folder . basename($image_file);
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		if ($file != '') {
			//Set image upload size 
			if ($_FILES["image"]["size"] > 5000000) {
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
				$res = mysqli_query($db, "SELECT* from header WHERE id=$id limit 1");
				if ($row = mysqli_fetch_array($res)) {
					$deleteimage = $row['image'];
				}
				unlink($folder . $deleteimage);
				move_uploaded_file($file, $target_file);
				$result = mysqli_query($db, "UPDATE header SET image='$image_file',description='$description',cv_link='$cv_link' WHERE id=$id");
			} else {
				$result = mysqli_query($db, "UPDATE header SET description='$description',cv_link='$cv_link' WHERE id=$id");
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
	$res = mysqli_query($db, "SELECT* from header WHERE id=$id");
	if ($row = mysqli_fetch_array($res)) {
		$image = $row['image'];
		$description = $row['description'];
		$cv_link = $row['cv_link'];
	}
	?>
	<div class="container_header" style="width:500px;">
		<h1> Edit </h1>
		<?php if (isset($update_sucess)) {
			echo '<div class="success">Profile Updated successfully</div>';
		} ?>
		<form action="" method="POST" enctype="multipart/form-data">
			<label>Profile Picture </label><br>
			<img src="uploads/<?php echo $image; ?>" height="100"><br><br>
			<label>Change Profile Picture </label>
			<input type="file" name="image" class="form-control">
			<label>Description</label>
			<input type="text" name="description" value="<?php echo $description; ?>" class="form-control">
			<br><br>
			<label>CV link</label>
			<input type="text" name="cv_link" value="<?php echo $cv_link; ?>" class="form-control">
			<br><br>
			<button name="update_submit" class="btn-primary">Update </button>
		</form>
	</div>
</body>

</html>

<?php
// Close the database connection after use
mysqli_close($db);
?>