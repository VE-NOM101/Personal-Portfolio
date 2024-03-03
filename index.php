<?php
require('include/db.php');
$query = "SELECT * FROM header,section_control,social_media";
$run = mysqli_query($db, $query);
$user_data = mysqli_fetch_array($run);

session_start();
if (isset($_SESSION['feedback'])) {
    $message = $_SESSION['feedback'];
    unset($_SESSION['feedback']); // Remove the message from session after displaying it
    echo '<script type="text/javascript">
            window.onload = function () { alert(" ' . $message . ' "); }
        </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user_data['title'] ?></title>
    <!--Including style.css-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- nav-bar-link -->
    <link rel="icon" href="images/icon.png" type="image/png" sizes="16x16" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
        .rotate-text span::before {
            content: "";
            position: absolute;
            inset: 20px;
            /* background: #00aaff; */
            background-image: url('<?php echo 'admin/header/uploads/' . $user_data['image']; ?>');
            filter: grayscale(90%);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 50%;
            z-index: 1;
            transition: filter 0.3s ease;
        }
    </style>
</head>

<body class="main-content">

    <!-- Navbar -->
    <div class="navbar desktop-menu">
        <div class="logo">
            <a href="#"><img src="images/logo.png" alt="my-logo" /></a>
        </div>
        <div id="menuSection" class="menu-sec">
            <ul class="nav-menu">
                <li><a class="nav-li active" href="#">HOME</a></li>
                <li><a class="nav-li" href="others.php">OTHERS</a></li>
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
                    <li><a class="nav-li active" href="#">HOME</a></li>
                    <li><a class="nav-li" href="others.php">OTHERS</a></li>
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

    <header class="section sec1 header active" id="home">
        <div class="header-content">
            <div class="left-header">
                <div class="h-shape"></div>
                <div class="image">
                    <!-- <img src="images/myPic2.png" alt=""> -->
                    <div class="rotate-text">
                        <div class="text">
                            <p>$...Choyan...$</p>
                        </div>

                        <span><i></i></span>

                    </div>
                </div>
            </div>
            <div class="right-header">
                <h1 class="name">

                    Hi, I'm <span><?= $user_data['intro_name'] ?></span>.
                    <div class="text-animate">
                        <h2><?= $user_data['short_description'] ?></h2>
                    </div>

                </h1>
                <p>
                    <?= $user_data['description'] ?>
                </p>


                <div class="btn-con">
                    <a href="<?php echo $user_data['cv_link']; ?>" class="main-btn">
                        <span class="btn-text">Download CV</span>
                        <span class="btn-icon"><i class="fa-solid fa-cloud-arrow-down"></i></span>
                    </a>
                </div>
            </div>
        </div>

    </header>
    <main>
        <section class="section sec2 about" id="about">
            <div class="main-title">
                <h2>About <span>me<span> &</span></span><span class="bg-text">my stats</span></h2>
            </div>
            <div class="about-container">
                <div class="left-about">
                    <h4>Information About me</h4>
                    <?php
                        $res=mysqli_query($db,'select * from about_me where id=1');
                        $about_row=mysqli_fetch_array($res);

                    ?>
                    <p>
                        <?php echo$about_row['info_me']; ?>
                    </p>
                    <div class="btn-con">
                        <a href="<?php echo$about_row['cv_link']; ?>" class="main-btn">
                            <span class="btn-text">Download CV</span>
                            <span class="btn-icon"><i class="fas fa-download"></i></span>
                        </a>
                    </div>
                </div>
                <div class="right-about">
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text"><?php echo$about_row['info1']; ?></p>
                            <p class="small-text">Projects <br /> Completed</p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text"><?php echo$about_row['info2']; ?></p>
                            <p class="small-text">Years of <br /> Experience <br /> In Autocad</p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text"><?php echo$about_row['info3']; ?></p>
                            <p class="small-text">Years of <br /> Experience <br /> In App-dev</p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text"><?php echo$about_row['info4']; ?></p>
                            <p class="small-text">3D-MAX <br /> Models</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="about-stats">
                <h4 class="stat-title">My Skills</h4>
                <div class="progress-bars">
                    <div class="progress-bar">
                        <p class="prog-title">html5 <i class="fa-solid fa-code"></i></p>
                        <div class="progress-con">
                            <p class="prog-text">90%</p>
                            <div class="progress">
                                <span class="html"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">css3 <i class="fa-regular fa-file-code"></i></p>
                        <div class="progress-con">
                            <p class="prog-text">70%</p>
                            <div class="progress">
                                <span class="css"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">javascript <i class="fa-solid fa-scroll"></i></p>
                        <div class="progress-con">
                            <p class="prog-text">40%</p>
                            <div class="progress">
                                <span class="js"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">C++ <i class="fa-solid fa-laptop-code"></i></p>
                        <div class="progress-con">
                            <p class="prog-text">95%</p>
                            <div class="progress">
                                <span class="cpp"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">C <i class="fa-solid fa-cubes"></i></p>
                        <div class="progress-con">
                            <p class="prog-text">100%</p>
                            <div class="progress">
                                <span class="c"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">PHP <i class="fa-solid fa-dollar-sign"></i></p>
                        <div class="progress-con">
                            <p class="prog-text">85%</p>
                            <div class="progress">
                                <span class="php"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">Database <i class="fa-solid fa-database"></i></p>
                        <div class="progress-con">
                            <p class="prog-text">90%</p>
                            <div class="progress">
                                <span class="db"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">Android <i class="fa-solid fa-robot"></i></p>
                        <div class="progress-con">
                            <p class="prog-text">92%</p>
                            <div class="progress">
                                <span class="android"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">ASP.net <i class="fa-solid fa-globe"></i></include>
                        </p>
                        <div class="progress-con">
                            <p class="prog-text">65%</p>
                            <div class="progress">
                                <span class="asp"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">Java <i class="fa-solid fa-terminal"></i></i></i></p>
                        <div class="progress-con">
                            <p class="prog-text">65%</p>
                            <div class="progress">
                                <span class="java"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">Git & GitHub <i class="fa-solid fa-code-branch"></i></i></i></i></p>
                        <div class="progress-con">
                            <p class="prog-text">70%</p>
                            <div class="progress">
                                <span class="git"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="stat-title">My Timeline</h4>

            <div class="timeline">
                <?php 
                    $res=mysqli_query($db,'select * from timeline order by id desc');
                    while($row=mysqli_fetch_assoc($res)){
                ?>
                <div class="timeline-item">
                    <div class="tl-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <p class="tl-duration"><?php echo$row['duration']; ?></p>
                    <h5><?php echo$row['role'];?> <span> - <?php echo$row['place'];?></span></h5>
                    <p>
                        <?php echo$row['details_para']; ?>
                    </p>
                </div>
                <?php } ?>
            </div>

        </section>
        <section class="section sec3" id="portfolio">
            <div class="main-title">
                <h2>My <span>Portfolio</span><span class="bg-text">My Work</span></h2>
            </div>
            <p class="port-text">
                Here is some of my work that I've done in various programming languages.
            </p>
            <div class="portfolios">
                <?php
                $res = mysqli_query($db, "SELECT* from projects ORDER by id DESC");
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <div class="portfolio-item">
                        <div class="image">
                            <img src="<?php echo 'admin/projects/uploads/' . $row['project_image']; ?>" alt="">
                        </div>
                        <div class="hover-items">
                            <h3><?php echo $row['project_name']; ?></h3>
                            <div class="icons">
                                <a href="<?php echo $row['github_link']; ?>" class="icon">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="<?php echo $row['youtube_link']; ?>" class="icon">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </section>
        <section class="section sec4" id="blogs">
            <div class="blogs-content">
                <div class="main-title">
                    <h2>My<span>Achievement</span><span class="bg-text">My Winning</span></h2>
                </div>       
                <div class="blogs">
                <?php 
                    $res=mysqli_query($db,'select* from achievement');
                        while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <div class="blog">
                        <img src="<?php echo 'admin/achievement/uploads/'.$row['image']; ?>" alt="">
                        <div class="blog-text">
                            <h4>
                                <?php echo$row['title']; ?>
                            </h4>
                            <p>
                                <?php echo$row['description']; ?>
                            </p>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
        </section>
        <section class="section sec5 contact" id="contact">

            <div class="contact-container">
                <div class="main-title">
                    <h2>Contact <span>Me</span><span class="bg-text">Contact</span></h2>
                </div>
                <div class="contact-content-con">
                    <div class="left-contact">
                        <h4>Contact me here</h4>
                        <?php  
                            $res = mysqli_query($db, "SELECT* from contact where id=1");
                            $contact_row = mysqli_fetch_array($res);
                        ?>
                        <p>
                           <?php echo $contact_row['details']; ?>
                        </p>
                        <div class="contact-info">
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Location</span>
                                </div>
                                <p>
                                    : <?php echo $contact_row['location']; ?>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                    <span>Email</span>
                                </div>
                                <p>
                                    <span>: <?php echo $contact_row['email']; ?></span>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                    <span>Education</span>
                                </div>
                                <p>
                                    <span>: <?php echo $contact_row['education']; ?></span>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-user-tie"></i>
                                    <span>Profession</span>
                                </div>
                                <p>
                                    <span>: <?php echo $contact_row['profession']; ?></span>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fa-solid fa-phone"></i>
                                    <span>Mobile Number</span>
                                </div>
                                <p>
                                    <span>: <?php echo $contact_row['phone']; ?></span>
                                </p>
                            </div>
                            
                        </div>
                        <div class="contact-icons">
                            <div class="contact-icon">
                                <a href="<?php echo $user_data['facebook'];?>" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="<?php echo $user_data['linkedin'];?>" target="_blank">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="<?php echo $user_data['github'];?>" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="vl"></div>
                    <div class="right-contact">
                        <form action="admin/feedback/feedback.php" method="post" class="contact-form">
                            <div class="input-control i-c-2">
                                <input type="text" name="name" required placeholder="NAME">
                                <input type="email" name="email" required placeholder="EMAIL">
                            </div>
                            <div class="input-control">
                                <input type="text" name="subject" required placeholder="SUBJECT">
                            </div>
                            <div class="input-control">
                                <textarea name="description" id="" cols="15" rows="8" placeholder="DESCRIPTION..."></textarea>
                            </div>
                            <div class="submit-btn">
                                <!-- hover e transition hoccena -->
                                <button type="submit" class="sub-main-btn">
                                    <span class="sub-btn-text">Submit</span>
                                    <span class="sub-btn-icon"><i class="fa-regular fa-paper-plane"></i></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <div class="controlls">
        <!-- control.control-$.active-btn*5 -->
        <?php
        if ($user_data['home_section']) {
        ?>
            <div class="control control-1 active-btn" data-id="home">
                <i class="fa-solid fa-house-chimney"></i>
            </div>
        <?php
        }
        if ($user_data['about_section']) {
        ?>
            <div class="control control-2" data-id="about">
                <i class="fa-solid fa-user-tie"></i>
            </div>

        <?php
        }
        if ($user_data['portfolio_section']) {
        ?>
            <div class="control control-3" data-id="portfolio">
                <i class="fa-solid fa-book"></i>
            </div>

        <?php
        }
        if ($user_data['blogs_section']) {
        ?>
            <div class="control control-4" data-id="blogs">
                <i class="fa-regular fa-newspaper"></i>
            </div>
        <?php
        }
        if ($user_data['contact_section']) {
        ?>
            <div class="control control-5" data-id="contact">
                <i class="fa-solid fa-address-card"></i>
            </div>

        <?php
        } ?>
    </div>

    <div class="theme-btn">
        <i class="fa-solid fa-circle-half-stroke"></i>
    </div>




    <!--Script attached-->
    <script src="./script.js">

    </script>
</body>

</html>