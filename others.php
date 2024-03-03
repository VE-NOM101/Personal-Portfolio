<?php
require('include/db.php');
$query = "SELECT * FROM header,section_control,social_media";
$run = mysqli_query($db, $query);
$user_data = mysqli_fetch_array($run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style_others.css">
  <link rel="stylesheet" href="swiper-bundle.min.css" />
  <link rel="icon" href="images/icon.png" type="image/png" sizes="16x16" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
  <!-- Navbar -->
  <div class="navbar desktop-menu">
    <div class="logo">
      <a href="index.php"><img src="images/logo.png" alt="my-logo" /></a>
    </div>
    <div id="menuSection" class="menu-sec">
      <ul class="nav-menu">
        <li><a class="nav-li" href="index.php">HOME</a></li>
        <li><a class="nav-li active" href="#">OTHERS</a></li>
        <li><a class="nav-li" href="login/login.php">LOGIN</a></li>
      </ul>
    </div>
    <div class="social-icons">
    <?php
            if ($user_data['facebook'] != '') {
            ?>
                <a href="<?php echo $user_data['facebook']; ?>"><i class="fab fa-facebook"></i></a>
            <?php
            }
            ?>
            <?php
            if ($user_data['instagram'] != '') {
            ?>
                <a href="<?php echo $user_data['instagram']; ?>"><i class="fab fa-instagram"></i></a>
            <?php
            }
            ?>
            <?php
            if ($user_data['github'] != '') {
            ?>
                <a href="<?php echo $user_data['github']; ?>"><i class="fab fa-github"></i></a>
            <?php
            }
            ?>
            <?php
            if ($user_data['linkedin'] != '') {
            ?>
                <a href="<?php echo $user_data['linkedin']; ?>"><i class="fa-brands fa-linkedin"></i></a>
            <?php
            }
            ?>
            <?php
            if ($user_data['twitter'] != '') {
            ?>
                <a href="<?php echo $user_data['twitter']; ?>"><i class="fa-brands fa-twitter"></i></i></a>
            <?php
            }
            ?>
    </div>
  </div>
  <div onclick="closeMobMenuToggle()" id="mobMenuCont" class="mob-menu-container">
    <img src="images/close.png" alt="close-icon" />
  </div>
  <div id="mobMenuWrap" class="mob-menu-wrap">
    <div class="menu-content">
      <div class="menu-items">
        <ul class="nav-menu">
          <li><a class="nav-li" href="index.php">HOME</a></li>
          <li><a class="nav-li active" href="#">OTHERS</a></li>
          <li><a class="nav-li" href="login/login.php">LOGIN</a></li>
        </ul>
      </div>
      <div class="social-items">
        <div class="social-icons">
          <?php
          if ($user_data['facebook'] != '') {
          ?>
            <a href="<?php echo $user_data['facebook']; ?>"><i class="fab fa-facebook"></i></a>
          <?php
          }
          ?>
          <?php
          if ($user_data['instagram'] != '') {
          ?>
            <a href="<?php echo $user_data['instagram']; ?>"><i class="fab fa-instagram"></i></a>
          <?php
          }
          ?>
          <?php
          if ($user_data['github'] != '') {
          ?>
            <a href="<?php echo $user_data['github']; ?>"><i class="fab fa-github"></i></a>
          <?php
          }
          ?>
          <?php
          if ($user_data['linkedin'] != '') {
          ?>
            <a href="<?php echo $user_data['linkedin']; ?>"><i class="fa-brands fa-linkedin"></i></a>
          <?php
          }
          ?>
          <?php
          if ($user_data['twitter'] != '') {
          ?>
            <a href="<?php echo $user_data['twitter']; ?>"><i class="fa-brands fa-twitter"></i></i></a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="mobile-menu">
    <div class="logo">
      <a href="#"><img src="images/logo.png" alt="my-logo" /></a>
    </div>
    <button onclick="mobMenuToggle()" class="menu">Menu</button>
  </div>
  <!-- nav-bar -->
  <!-- card-view -->
  <h1>Gallery</h1>
  <div class="container-2">
    <div class="slider-wrapper">
      <button id="prev-slide" class="slide-button material-symbols-rounded">
        chevron_left
      </button>
      <ul class="image-list">
        <?php 
          $res=mysqli_query($db,'select* from gallery');
          while($row=mysqli_fetch_assoc($res)){
        ?>
        <img class="image-item" src="<?php echo 'admin/gallery/uploads/'.$row['image'];?>" alt="img-1" />
        <?php } ?>
      </ul>
      <button id="next-slide" class="slide-button material-symbols-rounded">
        chevron_right
      </button>
    </div>
    <div class="slider-scrollbar">
      <div class="scrollbar-track">
        <div class="scrollbar-thumb"></div>
      </div>
    </div>
  </div>
  <div class="container">

    <h1 class="heading">frequently asked questions</h1>

    <div class="accordion-container">

      <div class="accordion active">
        <div class="accordion-heading">
          <h3>What programming languages and technologies do you specialize in for Android development?</h3>
          <i class="fas fa-angle-down"></i>
        </div>
        <p class="accordion-content">
        I specialize in Java and Kotlin for Android app development, leveraging Android Studio as my primary integrated development environment (IDE).
        </p>
      </div>

      <div class="accordion">
        <div class="accordion-heading">
          <h3>Can you describe your experience with AutoCAD and 3D Max?</h3>
          <i class="fas fa-angle-down"></i>
        </div>
        <p class="accordion-content">
        I have a proficient understanding of AutoCAD for 2D drafting and design as well as 3D Max for 3D modeling and animation. These tools allow me to create detailed architectural and mechanical designs with precision.
        I have designed many model in 3D-MAX. It's joyful.
      </p>
      </div>

      <div class="accordion">
        <div class="accordion-heading">
          <h3>Do you have experience in web development? If so, what technologies do you use?</h3>
          <i class="fas fa-angle-down"></i>
        </div>
        <p class="accordion-content">
        Yes, I have experience in web development using HTML, CSS, JavaScript, and various frameworks such as Bootstrap and Laravel. I also work with backend technologies like Node.js and databases like Oracle and MySQL to create dynamic and interactive web applications.
        </p>
      </div>

      <div class="accordion">
        <div class="accordion-heading">
          <h3>What is your approach to troubleshooting and debugging issues in your projects?</h3>
          <i class="fas fa-angle-down"></i>
        </div>
        <p class="accordion-content">
        I adopt a systematic approach to troubleshoot and debug issues, leveraging debugging tools and diagnostic techniques to identify and resolve issues efficiently while maintaining code integrity.
      </div>

      <div class="accordion">
        <div class="accordion-heading">
          <h3>How do you stay updated with the latest trends and technologies in your field?</h3>
          <i class="fas fa-angle-down"></i>
        </div>
        <p class="accordion-content">
        I actively engage in online communities, attend workshops, and read industry blogs and publications to stay informed about the latest trends, updates, and best practices in Android development, design, and web technologies.
        </p>
      </div>

      <div class="accordion">
        <div class="accordion-heading">
          <h3>What inspired you to pursue a career in software engineering and design?</h3>
          <i class="fas fa-angle-down"></i>
        </div>
        <p class="accordion-content">
        I have always been passionate about technology and its potential to solve real-world problems and enhance user experiences. My interest in software engineering and design stems from a desire to create meaningful and impactful solutions that positively impact people's lives.
        </p>
      </div>

    </div>

  </div>


  <script src="./script_others.js" defer> </script>
  <script src="./swiper-bundle.min.js"></script>


</body>

</html>