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
		$duration = $_POST['duration'];
		$role = $_POST['role'];
		$place = $_POST['place'];
		$details_para = $_POST['details_para'];
		$result = mysqli_query($db, "UPDATE timeline SET duration='$duration',role='$role',place='$place',details_para='$details_para' WHERE id=$id");
		if ($result) {
			header("location:../admin.php?action=saved");
		} else {
			echo 'Something went wrong';
		}
	}

	$res = mysqli_query($db, "SELECT* from timeline WHERE id=$id limit 1");
	if ($row = mysqli_fetch_array($res)) {
		$duration = $row['duration'];
		$role = $row['role'];
		$place = $row['place'];
		$details_para = $row['details_para'];
	}
	?>
	<div class="container_section" style="width:500px;">
		<h1> Edit </h1>
		<?php if (isset($update_sucess)) {
			echo '<div class="success">Project Updated successfully</div>';
		} ?>
		<form action="" method="POST" enctype="multipart/form-data">
			<label>Duration </label>
			<input type="text" name="duration" value="<?php echo $duration; ?>" class="form-control">
			<br>
			<label>Role</label>
			<input type="text" name="role" value="<?php echo $role; ?>" class="form-control">
			<label>Place</label>
			<input type="text" name="place" value="<?php echo $place; ?>" class="form-control">
			<label>Details</label>
			<input type="text" name="details_para" value="<?php echo $details_para; ?>" class="form-control">
			<br><br>
			<button name="update_submit" class="btn-primary">Update</button>
		</form>
	</div>
</body>

</html>