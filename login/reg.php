<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="style_login.css">
</head>

<body>
<main>
    <?php
        // Write your code to insert data
        if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            $connection=mysqli_connect('localhost','root','','myportfolio');
            if(!$connection){
                die("Connection failed!: ".mysqli_connect_error());
            }
            // echo "Connected Successfully <br />";

            // Check for empty fields
            if(empty($username) || empty($email) || empty($password)) {
                echo "All fields are required.";
                exit(); // Stop further execution
            }
            // Check password structure (At least 6 characters, containing letters and numbers and atleast one special symbol)
            if(strlen($password) < 6 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
                echo "Password must be at least 6 characters long and contain letters and numbers and atleast one special symbol.";
                exit(); // Stop further execution
            }

             // Check if username already exists
            $check_query = "SELECT * FROM reg_table WHERE username='$username'";
            $result = mysqli_query($connection, $check_query);
            if(mysqli_num_rows($result) > 0) {
                echo "Username already exists. Please choose a different one.";
                exit(); // Stop further execution
            }

            $insert_query="insert into reg_table(username,email,password) values('$username','$email','$password')";
            $insert =mysqli_query($connection,$insert_query);
            if(!$insert){
                die("Not inserted". mysqli_error($connection));
            }
            header("location: login.php");  
            mysqli_close($connection);
        }
    ?>

<header>
<h4>Sing Up</h4>
</header>
  <form action="reg.php" method="POST">
    <div class="form_wrapper">
      <input id="input" name="username" type="text" required>
      <label for="input">Username</label>
      <i class="material-icons">person</i>
    </div>
    <div class="form_wrapper">
      <input id="input" name="email" type="text" required>
      <label for="input">Email</label>
      <i class="material-icons">mail</i>
    </div>
    <div class="form_wrapper">
      <input id="password" name="password" type="password" required>
      <label for="password">Password</label>
      <i class="material-icons">lock</i>
    </div>
    <input class="sub_btn" type="submit" name="submit" value="Submit">
  </form>
  </main>
</body>

</html>