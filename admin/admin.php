<?php

$connection = mysqli_connect('localhost', 'root', '', 'myportfolio');
if (!$connection) {
    die("Connection failed!: " . mysqli_connect_error());
} else {
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "UPDATE section_control SET  home_section = 0 , about_section = 0 , portfolio_section = 0 , blogs_section = 0 , contact_section =0 WHERE id = 1";
    $run = mysqli_query($connection, $query);
    // Check if section checkbox array is set
    if (isset($_POST['section'])) {
        // Iterate through selected sections
        foreach ($_POST['section'] as $selected) {
            // Update the selected section to 1
            $query = "UPDATE section_control SET " . $selected . "_section = 1 WHERE id = 1";
            $run = mysqli_query($connection, $query);
        }
    }
}
$dbHost = 'localhost';
$dbName = 'myportfolio';
$dbUsername = 'root';
$dbPassword = '';
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="styles/admin_styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">


    <style>
        .button {
            margin: 0 10px 10px 45rem;
            background-color: white;
            color: black;
            border: 2px solid #f44336;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button:hover {
            background-color: #f44336;
            color: white;
        }

        #submit {
            background-color: #4CAF50;
            /* Green background */
            border: none;
            /* Remove borders */
            color: white;
            /* White text */
            padding: 15px 32px;
            /* Padding */
            text-align: center;
            /* Center text */
            text-decoration: none;
            /* Remove underline */
            display: inline-block;
            /* Make it display as a block element */
            font-size: 16px;
            /* Font size */
            margin: 0 10px 10px 100px;
            /* Margin */
            cursor: pointer;
            /* Cursor on hover */
            border-radius: 8px;
            /* Rounded corners */
        }

        /* On hover, change background color */
        #submit:hover {
            background-color: #45a049;
        }

        /* On click, change background color */
        #submit:active {
            background-color: #3e8e41;
        }

        .switch {
            position: relative;
            display: block;
            vertical-align: top;
            width: 100px;
            height: 30px;
            padding: 3px;
            margin: 0 10px 10px 100px;
            background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
            background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
            border-radius: 18px;
            box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            box-sizing: content-box;
        }

        .switch-input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            box-sizing: content-box;
        }

        .switch-label {
            position: relative;
            display: block;
            height: inherit;
            font-size: 10px;
            text-transform: uppercase;
            background: #eceeef;
            border-radius: inherit;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
            box-sizing: content-box;
        }

        .switch-label:before,
        .switch-label:after {
            position: absolute;
            top: 50%;
            margin-top: -.5em;
            line-height: 1;
            -webkit-transition: inherit;
            -moz-transition: inherit;
            -o-transition: inherit;
            transition: inherit;
            box-sizing: content-box;
        }

        .switch-label:before {
            content: attr(data-off);
            right: 11px;
            color: #aaaaaa;
            text-shadow: 0 1px rgba(255, 255, 255, 0.5);
        }

        .switch-label:after {
            content: attr(data-on);
            left: 11px;
            color: #FFFFFF;
            text-shadow: 0 1px rgba(0, 0, 0, 0.2);
            opacity: 0;
        }

        .switch-input:checked~.switch-label {
            background: #E1B42B;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
        }

        .switch-input:checked~.switch-label:before {
            opacity: 0;
        }

        .switch-input:checked~.switch-label:after {
            opacity: 1;
        }

        .switch-handle {
            position: absolute;
            top: 4px;
            left: 4px;
            width: 28px;
            height: 28px;
            background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
            background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
            border-radius: 100%;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        .switch-handle:before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -6px 0 0 -6px;
            width: 12px;
            height: 12px;
            background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
            background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
            border-radius: 6px;
            box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
        }

        .switch-input:checked~.switch-handle {
            left: 74px;
            box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        /* Transition
========================== */
        .switch-label,
        .switch-handle {
            transition: All 0.3s ease;
            -webkit-transition: All 0.3s ease;
            -moz-transition: All 0.3s ease;
            -o-transition: All 0.3s ease;
        }

        table {
            border-collapse: collapse;
            /* Collapse borders into a single border */
            width: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table,
        th,
        td {
            border: 2px solid white;
            /* Set border for table, th, and td elements */
            padding: 10px;
            /* Add padding to th and td elements for spacing */
            text-align: left;
            /* Align text to the left */
        }

        .btn-primary {
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #337ab7;
            color: #fff;
        }

        .btn_del {
            background-color: #FF5733 !important;
        }

        .container_display {
            margin: 0 auto;
            margin-top: 2rem !important;
            background-color: grey;
            width: 100%;
            padding: 10px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        label {
            font-size: 16px;
        }

        .success {
            margin: 5px auto;
            border-radius: 5px;
            border: 3px solid #fff;
            background: #33CC00;
            color: #fff;
            font-size: 20px;
            padding: 10px;
            box-shadow: 10px 5px 5px grey;
        }
    </style>


</head>

<body class="main-content">
    <header class="container header active" id="home">
        <div class="header-content">

            <div class="right-header">
                <h1 class="name">
                    <span>Control</span> Section
                </h1>
                <form action="admin.php" method="POST">
                    <label class="switch">
                        <input class="switch-input" type="checkbox" name="section[]" value="home" />
                        <span class="switch-label" data-on="Home-on" data-off="Home-off"></span>
                        <span class="switch-handle"></span>
                    </label>
                    <br />
                    <label class="switch">
                        <input class="switch-input" type="checkbox" name="section[]" value="about" />
                        <span class="switch-label" data-on="About-on" data-off="About-off"></span>
                        <span class="switch-handle"></span>
                    </label>
                    <br />
                    <label class="switch">
                        <input class="switch-input" type="checkbox" name="section[]" value="portfolio" />
                        <span class="switch-label" data-on="Portfolio-on" data-off="Portfolio-off"></span>
                        <span class="switch-handle"></span>
                    </label>
                    <br />
                    <label class="switch">
                        <input class="switch-input" type="checkbox" name="section[]" value="blogs" />
                        <span class="switch-label" data-on="Achievement-on" data-off="Achievement-off"></span>
                        <span class="switch-handle"></span>
                    </label>
                    <br />

                    <label class="switch">
                        <input class="switch-input" type="checkbox" name="section[]" value="contact" />
                        <span class="switch-label" data-on="contact-on" data-off="contact-off"></span>
                        <span class="switch-handle"></span>
                    </label>
                    <br />
                    <input type="submit" id="submit" name="submit" value="submit" />
                </form>
                <a href="../login/logout.php"><button class="button">Logout</button></a>
            </div>
        </div>
    </header>
    <main>
        <section class="container about" id="about">
            <div class="main-title">
                <h2>About <span>me</span><span class="bg-text">My profile</span></h2>
            </div>

            <div class="about-stats">
                <h4 class="stat-title">My Skills</h4>

                <div class="container_display">
                    <?php
                    if (isset($_GET['image_success'])) {
                        echo '<div class="success">Profile Uploaded successfully</div>';
                    }

                    if (isset($_GET['action'])) {
                        $action = $_GET['action'];
                        if ($action == 'saved') {
                            echo '<div class="success">Saved </div>';
                        }
                    }
                    ?>
                    <table cellpadding="10px" style="border:1px solid;">
                        <tr>
                            <th>Image</th>
                            <th>Description</th>
                            <th>CV link</th>
                            <th>Action</th>
                        </tr>
                        <?php $res = mysqli_query($db, "SELECT* from header WHERE id = 1");
                        $row = mysqli_fetch_array($res);
                        ?>
                        <td style="padding:10px;"><img src="header/uploads/<?php echo $row['image']; ?>" height="200"></td>
                        <td style="padding:10px;"><?php echo $row['description'] ?></td>
                        <td><?php echo $row['cv_link'] ?></td>
                        <td><a href="header/header_update.php?id= 1 "><button style=" padding: 6px 12px; font-size: 14px; font-weight: 400; cursor: pointer; border: 1px solid transparent; border-radius: 4px; background-color: #337ab7; color: #fff;" class="btn-primary">Edit </button></a>
                            <br>
                        </td>
                        </tr>

                    </table>
                </div>
            </div>
        </section>

        <!-- <section class="container about" id="about">
            <div class="main-title">
                <h2>About <span>me</span><span class="bg-text">my stats</span></h2>
            </div>
            <div class="about-container">
                <div class="left-about">
                    <h4>Information About me</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eveniet labore nihil obcaecati consequatur. Debitis error doloremque,
                        vero eos vel nemo eius voluptatem dicta tenetur modi. <br /> <br /> La musica
                        delectus dolore fugiat exercitationem a,
                        ipsum quidem quo enim natus accusamus labore dolores nam. Unde.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Harum non necessitatibus deleniti eum soluta.
                    </p>
                    <div class="btn-con">
                        <a href="#" class="main-btn">
                            <span class="btn-text">Download CV</span>
                            <span class="btn-icon"><i class="fas fa-download"></i></span>
                        </a>
                    </div>
                </div>
                <div class="right-about">
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text">650+</p>
                            <p class="small-text">Projects <br /> Completed</p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text">10+</p>
                            <p class="small-text">Years of <br /> experience</p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text">300+</p>
                            <p class="small-text">Happy <br /> Clients</p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text">400+</p>
                            <p class="small-text">Customer <br /> reviews</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-stats">
                <h4 class="stat-title">My Skills</h4>
                <div class="progress-bars">
                    <div class="progress-bar">
                        <p class="prog-title">html5</p>
                        <div class="progress-con">
                            <p class="prog-text">80%</p>
                            <div class="progress">
                                <span class="html"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">css3</p>
                        <div class="progress-con">
                            <p class="prog-text">95%</p>
                            <div class="progress">
                                <span class="css"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">javascript</p>
                        <div class="progress-con">
                            <p class="prog-text">75%</p>
                            <div class="progress">
                                <span class="js"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">ReactJS</p>
                        <div class="progress-con">
                            <p class="prog-text">75%</p>
                            <div class="progress">
                                <span class="react"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">NodeJS</p>
                        <div class="progress-con">
                            <p class="prog-text">87%</p>
                            <div class="progress">
                                <span class="node"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">Python</p>
                        <div class="progress-con">
                            <p class="prog-text">70%</p>
                            <div class="progress">
                                <span class="python"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="stat-title">My Timeline</h4>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="tl-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <p class="tl-duration">2010 - present</p>
                    <h5>Web Developer<span> - Vircrosoft</span></h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
                    </p>
                </div>
                <div class="timeline-item">
                    <div class="tl-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <p class="tl-duration">2008 - 2011</p>
                    <h5>Software Engineer<span> - Boogle, Inc.</span></h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
                    </p>
                </div>
                <div class="timeline-item">
                    <div class="tl-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <p class="tl-duration">2016 - 2017</p>
                    <h5>C++ Programmer<span> - Slime Tech</span></h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
                    </p>
                </div>
                <div class="timeline-item">
                    <div class="tl-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <p class="tl-duration">2009 - 2013</p>
                    <h5>Business Degree<span> - Sussex University</span></h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
                    </p>
                </div>
                <div class="timeline-item">
                    <div class="tl-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <p class="tl-duration">2013 - 2016</p>
                    <h5>Computer Science Degree<span> - Brookes University</span></h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
                    </p>
                </div>
                <div class="timeline-item">
                    <div class="tl-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <p class="tl-duration">2017 - present</p>
                    <h5>3d Animation<span> - Brighton University</span></h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
                    </p>
                </div>
            </div>
        </section> -->
        <section class="container" id="portfolio">
            <div class="main-title">
                <h2>My <span>Portfolio</span><span class="bg-text">My Work</span></h2>
            </div>
            <p class="port-text">
                Here is some of my work that I've done in various programming languages.
            </p>
            <div class="portfolios">
                <div class="container_display">
                    <span style="float:right;"><a href="projects/upload.php"><button class="btn-primary">Add new project</button></a></span>
                    <br><br>
                    <?php
                    if (isset($_GET['image_success'])) {
                        echo '<div class="success">Project Uploaded successfully</div>';
                    }

                    if (isset($_GET['action'])) {
                        $action = $_GET['action'];
                        if ($action == 'saved') {
                            echo '<div class="success">Saved </div>';
                        } elseif ($action == 'deleted') {
                            echo '<div class="success">Project Deleted Successfully ... </div>';
                        }
                    }
                    ?>
                    <table cellpadding="10">
                        <tr>
                            <th>Project Image</th>
                            <th>Project Name</th>
                            <th>Youtube Link</th>
                            <th>Github Link</th>
                            <th>Action</th>
                        </tr>
                        <?php $res = mysqli_query($db, "SELECT* from projects ORDER by id DESC");
                        while ($row = mysqli_fetch_array($res)) {
                            echo '<tr> 
                  <td><img src="projects/uploads/' . $row['project_image'] . '" height="200px" width="300px"></td> 
                  <td>' . $row['project_name'] . '</td> 
                  <td>' . $row['youtube_link'] . '</td> 
                  <td>' . $row['github_link'] . '</td> 
                  <td><a href="projects/edit.php?id=' . $row['id'] . '"><button class="btn-primary">Edit </button></a>
                  	<br> <br>
                  	 <a href=\'projects/delete.php?id=' . $row['id'] . '\' onClick=\'return confirm("Are you sure you want to delete?")\'"><button class="btn-primary btn_del">Delete</button></a>
                  </td> 
				</tr>';
                        } ?>

                    </table>
                </div>
            </div>
        </section>
        <section class="container" id="blogs">
            <div class="blogs-content">
                <div class="main-title">
                    <h2>My <span>Blogs</span><span class="bg-text">My Blogs</span></h2>
                </div>
                <div class="blogs">
                    <div class="blog">
                        <img src="img/port6.jpg" alt="">
                        <div class="blog-text">
                            <h4>
                                How to Create Your Own Website
                            </h4>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Doloribus natus voluptas, eos obcaecati recusandae amet?
                            </p>
                        </div>
                    </div>
                    <div class="blog">
                        <img src="img/blog1.jpg" alt="">
                        <div class="blog-text">
                            <h4>
                                How to Become an Expert in Web Design
                            </h4>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Doloribus natus voluptas, eos obcaecati recusandae amet?
                            </p>
                        </div>
                    </div>
                    <div class="blog">
                        <img src="img/blog2.jpg" alt="">
                        <div class="blog-text">
                            <h4>
                                Become a Web Designer in 10 Days
                            </h4>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Doloribus natus voluptas, eos obcaecati recusandae amet?
                            </p>
                        </div>
                    </div>
                    <div class="blog">
                        <img src="img/blog3.jpg" alt="">
                        <div class="blog-text">
                            <h4>
                                Debbuging made easy with Web Inspector
                            </h4>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Doloribus natus voluptas, eos obcaecati recusandae amet?
                            </p>
                        </div>
                    </div>
                    <div class="blog">
                        <img src="img/port1.jpg" alt="">
                        <div class="blog-text">
                            <h4>
                                Get started with Web Design and UI Design
                            </h4>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Doloribus natus voluptas, eos obcaecati recusandae amet?
                            </p>
                        </div>
                    </div>
                    <div class="blog">
                        <img src="img/port3.jpg" alt="">
                        <div class="blog-text">
                            <h4>
                                This is what you need to know about Web Design
                            </h4>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Doloribus natus voluptas, eos obcaecati recusandae amet?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container contact" id="contact">
            <div class="contact-container">
                <div class="main-title">
                    <h2>Contact <span>Me</span><span class="bg-text">Contact</span></h2>
                </div>
                <div class="contact-content-con">
                    <div class="left-contact">
                        <h4>Contact me here</h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            In, laborum numquam? Quam excepturi perspiciatis quas quasi.
                        </p>
                        <div class="contact-info">
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Location</span>
                                </div>
                                <p>
                                    : London, united Kingdom
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                    <span>Email</span>
                                </div>
                                <p>
                                    <span>: maclinzuniversal@gmail.com</span>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                    <span>Education</span>
                                </div>
                                <p>
                                    <span>: Sussex University, East Sussex</span>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                    <span>Mobile Number</span>
                                </div>
                                <p>
                                    <span>: 07522670617</span>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-globe-africa"></i>
                                    <span>Languages</span>
                                </div>
                                <p>
                                    <span>: Afrikaans, English, Spanish</span>
                                </p>
                            </div>
                        </div>
                        <div class="contact-icons">
                            <div class="contact-icon">
                                <a href="www.facebook.com" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right-contact">
                        <form action="" class="contact-form">
                            <div class="input-control i-c-2">
                                <input type="text" required placeholder="YOUR NAME">
                                <input type="email" required placeholder="YOUR EMAIL">
                            </div>
                            <div class="input-control">
                                <input type="text" required placeholder="ENTER SUBJECT">
                            </div>
                            <div class="input-control">
                                <textarea name="" id="" cols="15" rows="8" placeholder="Message Here..."></textarea>
                            </div>
                            <div class="submit-btn">
                                <a href="#" class="main-btn">
                                    <span class="btn-text">Download CV</span>
                                    <span class="btn-icon"><i class="fas fa-download"></i></span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="controls">
        <div class="control active-btn" data-id="home">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="control" data-id="about">
            <i class="fas fa-user"></i>
        </div>
        <div class="control" data-id="portfolio">
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="control" data-id="blogs">
            <i class="far fa-newspaper"></i>
        </div>
        <div class="control" data-id="contact">
            <i class="fas fa-envelope-open"></i>
        </div>
    </div>
    <div class="theme-btn">
        <i class="fas fa-adjust"></i>
    </div>
    <script src="app.js"></script>
</body>

</html>