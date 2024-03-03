<?php
if (isset($_COOKIE['loggedin'])) {
    header("Location:../admin/admin.php"); // Redirect to welcome page if user is already logged in
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password against database

    $connection = mysqli_connect('localhost', 'root', '', 'myportfolio');
    if (!$connection) {
        die("Connection failed!: " . mysqli_connect_error());
    }

    $check_query = "SELECT * FROM reg_table WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($result) == 0) {
        echo "No such username or password is found";
        exit(); // Stop further execution
    }

    /*Cookies are set for 1hour for testing purpose*/
    setcookie('username',$username, time() + 3600*24, "/");
    setcookie('loggedin', true, time() + 3600*24, "/");
    header("Location:../admin/admin.php"); // Redirect to welcome page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login form</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="style_login.css" />
  </head>
  <body>
<main>
  <header>
    <h4>Login</h4>
  </header>
  <form action="login.php" method="POST">
    <div class="form_wrapper">
      <input id="input" name="username" type="text" required>
      <label for="input">Username</label>
      <i class="material-icons">person</i>
    </div>
    <div class="form_wrapper">
      <input id="password" name="password" type="password" required>
      <label for="password">Password</label>
      <i class="material-icons">lock</i>
    </div>
    <input class="sub_btn" type="submit" name="submit" value="Submit">
    <div class="new_account">
      Don't have account ? <a href="reg.php">Sign up</a>
    </div>
  </form>
</main>
  </body>
</html>
