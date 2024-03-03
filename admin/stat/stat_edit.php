<?php
$dbHost = 'localhost';
$dbName = 'myportfolio';
$dbUsername = 'root';
$dbPassword = '';
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

session_start();

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
	<link rel="stylesheet" type="text/css" href="style_stat.css">
	<title>Stat update_success</title>
</head>

<body>
	<?php
	// if (isset($_POST['update_submit'])) {
	// 	$info_me = $_POST['info_me'];
	// 	$info1 = $_POST['info1'];
	// 	$info2 = $_POST['info2'];
	// 	$info3 = $_POST['info3'];
	// 	$info4 = $_POST['info4'];
	// 	$cv_link = $_POST['cv_link'];
	// 	$result = mysqli_query($db, "UPDATE about_me SET info_me='$info_me',info1='$info1',info2='$info2',info3='$info3',info4='$info4',cv_link='$cv_link' WHERE id=$id ;");
	// 	if ($result) {
	// 		$_SESSION['stat_edit']="Stat Updated";
	// 		header('Location:../admin.php');
	// 		exit();
	// 	}
	// }
	if (isset($_POST['update_submit'])) {
		// Assuming $db is your MySQLi connection
		$info_me = mysqli_real_escape_string($db, $_POST['info_me']);
		$info1 = mysqli_real_escape_string($db, $_POST['info1']);
		$info2 = mysqli_real_escape_string($db, $_POST['info2']);
		$info3 = mysqli_real_escape_string($db, $_POST['info3']);
		$info4 = mysqli_real_escape_string($db, $_POST['info4']);
		$cv_link = mysqli_real_escape_string($db, $_POST['cv_link']);
	
		// Construct the SQL query
		$query = "UPDATE about_me SET info_me='$info_me', info1='$info1', info2='$info2', info3='$info3', info4='$info4', cv_link='$cv_link' WHERE id=$id";
	
		// Execute the query
		$result = mysqli_query($db, $query);
		
		// Check if the query executed successfully
		if ($result) {
			$_SESSION['stat_edit'] = "Stat Updated";
			header('Location:../admin.php');
			exit();
		} else {
			// Handle errors
			echo "Error: " . mysqli_error($db);
		}
	}
	

	$res = mysqli_query($db, "SELECT* from about_me WHERE id=$id");
	if ($row = mysqli_fetch_array($res)) {
		$info_me = $row['info_me'];
		$info1 = $row['info1'];
		$info2 = $row['info2'];
		$info3 = $row['info3'];
		$info4 = $row['info4'];
		$cv_link = $row['cv_link'];
	}
	?>
	<div class="container_header" style="width:500px;">
		<h1> Edit </h1>
		<?php if (isset($update_sucess)) {
			echo '<div class="success">Stat Updated successfully</div>';
		} ?>
		<form action="" method="POST" enctype="multipart/form-data">
			<label for="info_me">Information</label>
			<input type="text" name="info_me" id="info_me" value="<?php echo $info_me; ?>" class="form-control" style="height: 50px;">

			<br><br>
			<label>No of Projects</label>
			<input type="text" name="info1" value="<?php echo $info1; ?>" class="form-control">
			<br><br>
			<label>Autocad</label>
			<input type="text" name="info2" value="<?php echo $info2; ?>" class="form-control">
			<br><br>
			<label>Android</label>
			<input type="text" name="info3" value="<?php echo $info3; ?>" class="form-control">
			<br><br>
			<label>No of 3D-MAX Projects</label>
			<input type="text" name="info4" value="<?php echo $info4; ?>" class="form-control">
			<br><br>
			<label>CV Link</label>
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