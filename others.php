<?php
require('include/db.php');
$query = "SELECT * FROM header,section_control,social_media";
$run = mysqli_query($db,$query);
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

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style_others.css">
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <link rel="icon" href="images/icon.png" type="image/png" sizes="16x16" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
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
        </div>
      </div>
      <div
        onclick="closeMobMenuToggle()"
        id="mobMenuCont"
        class="mob-menu-container"
      >
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
            <img class="image-item" src="images/img-1.jpg" alt="img-1" />
            <img class="image-item" src="images/img-2.jpg" alt="img-2" />
            <img class="image-item" src="images/img-3.jpg" alt="img-3" />
            <img class="image-item" src="images/img-4.jpg" alt="img-4" />
            <img class="image-item" src="images/img-5.jpg" alt="img-5" />
            <img class="image-item" src="images/img-6.jpg" alt="img-6" />
            <img class="image-item" src="images/img-7.jpg" alt="img-7" />
            <img class="image-item" src="images/img-8.jpg" alt="img-8" />
            <img class="image-item" src="images/img-9.jpg" alt="img-9" />
            <img class="image-item" src="images/img-10.jpg" alt="img-10" />
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
                <h3>accordion heading 01</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae vel adipisci voluptas ut deserunt magnam tempora esse, necessitatibus sit soluta minima quos atque porro, explicabo saepe expedita quibusdam consectetur? Nemo!
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>accordion heading 02</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae vel adipisci voluptas ut deserunt magnam tempora esse, necessitatibus sit soluta minima quos atque porro, explicabo saepe expedita quibusdam consectetur? Nemo!
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>accordion heading 03</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae vel adipisci voluptas ut deserunt magnam tempora esse, necessitatibus sit soluta minima quos atque porro, explicabo saepe expedita quibusdam consectetur? Nemo!
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>accordion heading 04</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae vel adipisci voluptas ut deserunt magnam tempora esse, necessitatibus sit soluta minima quos atque porro, explicabo saepe expedita quibusdam consectetur? Nemo!
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>accordion heading 05</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae vel adipisci voluptas ut deserunt magnam tempora esse, necessitatibus sit soluta minima quos atque porro, explicabo saepe expedita quibusdam consectetur? Nemo!
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>accordion heading 06</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae vel adipisci voluptas ut deserunt magnam tempora esse, necessitatibus sit soluta minima quos atque porro, explicabo saepe expedita quibusdam consectetur? Nemo!
            </p>
        </div>

    </div>

</div>


<script src="./script_others.js" defer> </script>
<script src="./swiper-bundle.min.js"></script>

    
</body>
</html>