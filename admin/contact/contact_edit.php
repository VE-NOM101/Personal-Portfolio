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
	<link rel="stylesheet" type="text/css" href="style_contact.css">
	<title>Contact update_success</title>
</head>

<body>
	<?php
	if (isset($_POST['update_submit'])) {
		$details = $_POST['details'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$education = $_POST['education'];
		$profession = $_POST['profession'];
		$phone = $_POST['phone'];
		$result = mysqli_query($db, "UPDATE contact SET details='$details',location='$location',email='$email',education='$education',profession='$profession',phone='$phone' WHERE id=$id");
		if ($result) {
			$_SESSION['contact_edit']="Contact Updated";
			header('Location:../admin.php');
			exit();
		}
	}

	$res = mysqli_query($db, "SELECT* from contact WHERE id=$id");
	if ($row = mysqli_fetch_array($res)) {
		$details = $row['details'];
		$location = $row['location'];
		$email = $row['email'];
		$education = $row['education'];
		$profession = $row['profession'];
		$phone = $row['phone'];
	}
	?>
	<div class="container_header" style="width:500px;">
		<h1> Edit </h1>
		<?php if (isset($update_sucess)) {
			echo '<div class="success">Profile Updated successfully</div>';
		} ?>
		<form action="" method="POST" enctype="multipart/form-data">
			<label for="details">Details</label>
			<input type="text" name="details" id="details" value="<?php echo $details; ?>" class="form-control" style="height: 50px;">

			<br><br>
			<label>Location</label>
			<input type="text" name="location" value="<?php echo $location; ?>" class="form-control">
			<br><br>
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
			<br><br>
			<label>Education</label>
			<input type="text" name="education" value="<?php echo $education; ?>" class="form-control">
			<br><br>
			<label>Profession</label>
			<input type="text" name="profession" value="<?php echo $profession; ?>" class="form-control">
			<br><br>
			<label>Phone</label>
			<input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control">
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