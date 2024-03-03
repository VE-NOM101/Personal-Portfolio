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

session_start();
if (isset($_SESSION['contact_edit'])) {
    $message = $_SESSION['contact_edit'];
    unset($_SESSION['contact_edit']); // Remove the message from session after displaying it
    echo '<script type="text/javascript">
            window.onload = function () { alert(" ' . $message . ' "); }
        </script>';
}
if (isset($_SESSION['stat_edit'])) {
    $message = $_SESSION['stat_edit'];
    unset($_SESSION['stat_edit']); // Remove the message from session after displaying it
    echo '<script type="text/javascript">
            window.onload = function () { alert(" ' . $message . ' "); }
        </script>';
}

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
            <a href="../login/logout.php"><button class="button">Logout</button></a>
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
                    <input type="submit" id="submit" name="submit" value="Submit" />
                </form>
                
            </div>
        </div>
    </header>
    <main>
        <section class="container about" id="about">
            <div class="main-title">
                <h2>About <span>me</span><span class="bg-text">My profile</span></h2>
            </div>

            <div class="about-stats">
                <h4 class="stat-title">Profile</h4>

                <div class="table_container">
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
                        <td style="padding:10px;"><?php echo $row['cv_link'] ?></td>
                        <td><a href="header/header_update.php?id= 1"><button style=" padding: 6px 12px; font-size: 14px; font-weight: 400; cursor: pointer; border: 1px solid transparent; border-radius: 4px; background-color: #337ab7; color: #fff;" class="btn-primary">Edit </button></a>
                            <br>
                        </td>
                        </tr>

                    </table>
                </div>
            </div>
        </section>

        <section class="container about" id="timeline">
            <div class="main-title">
                <h2>About <span>me</span><span class="bg-text">my stats</span></h2>
            </div>
            <br><br><br>
            <div class="about">
                <div class="table-container" style="display:inline;">
                    <table cellpadding="10px">
                        <caption>
                            <h3>Stat</h3>
                        </caption>
                        <tr>
                            <th>Information</th>
                            <th>Projects</th>
                            <th>Autocad</th>
                            <th>Android</th>
                            <th>3D-MAX</th>
                            <th>CV Link</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $res = mysqli_query($db, "SELECT* from about_me where id=1");
                        $about_row = mysqli_fetch_array($res);
                        ?>
                        <td style="padding:10px;"><?php echo $about_row['info_me'] ?></td>
                        <td style="padding:10px;"><?php echo $about_row['info1'] ?></td>
                        <td style="padding:10px;"><?php echo $about_row['info2'] ?></td>
                        <td style="padding:10px;"><?php echo $about_row['info3'] ?></td>
                        <td style="padding:10px;"><?php echo $about_row['info4'] ?></td>
                        <td style="padding:10px;"><?php echo $about_row['cv_link'] ?></td>
                        <td><a href="stat/stat_edit.php?id= 1 "><button style=" padding: 6px 12px; font-size: 14px; font-weight: 400; cursor: pointer; border: 1px solid transparent; border-radius: 4px; background-color: #337ab7; color: #fff;" class="btn-primary">Edit </button></a>
                            <br>
                        </td>
                        </tr>
                    </table>
                </div>
                <br><br>
                <div class="table-container" style="display:inline;">

                    <?php
                    if (isset($_GET['image_success'])) {
                        echo '<div class="success">Timepoint Uploaded successfully</div>';
                    }

                    if (isset($_GET['action'])) {
                        $action = $_GET['action'];
                        if ($action == 'saved') {
                            echo '<div class="success">Updated </div>';
                        } elseif ($action == 'deleted') {
                            echo '<div class="success">Timepoint Deleted Successfully ... </div>';
                        }
                    }
                    ?>
                    <table cellpadding="10">
                        <caption>
                            <h3>Timeline</h3>
                        </caption>
                        <tr>
                            <th colspan="5"> <span style="float:right;"><a href="timeline/upload.php"><button class="btn-primary">Add new timepoint</button></a></span></th>
                        </tr>
                        <tr>
                            <th>Duration</th>
                            <th>Role</th>
                            <th>Place</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        <?php $res = mysqli_query($db, "SELECT* from timeline ORDER by id DESC");
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                            <tr>
                                <td><?php echo $row['duration']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <td><?php echo $row['place']; ?></td>
                                <td><?php echo $row['details_para']; ?></td>
                                <td><a href="timeline/edit.php?id=<?php echo $row['id']; ?>"><button class="btn-primary">Edit </button></a>
                                    <br> <br>
                                    <a href="timeline/delete.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"><button class="btn-primary btn_del">Delete</button></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>

        </section>

        <section class="container" id="portfolio">
            <div class="main-title">
                <h2>My <span>Portfolio</span><span class="bg-text">My Work</span></h2>
            </div>
            <br>
            <div class="portfolios">
                <div class="table_container">

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
                            <th colspan='5'> <span style="float:right;"><a href="projects/upload.php"><button class="btn-primary">Add new project</button></a></span></th>
                        </tr>
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
                    <h2>My <span>Achievement</span><span class="bg-text">My Winning</span></h2>
                </div>

                <div class="table-container" style="display:inline;">

                    <?php
                    if (isset($_GET['image_success'])) {
                        echo '<div class="success">Achievement Uploaded successfully</div>';
                    }

                    if (isset($_GET['action'])) {
                        $action = $_GET['action'];
                        if ($action == 'saved') {
                            echo '<div class="success">Updated </div>';
                        } elseif ($action == 'deleted') {
                            echo '<div class="success">Achievement Deleted Successfully ... </div>';
                        }
                    }
                    ?>
                    <br><br>
                    <table cellpadding="10">
                        <caption>
                            <h3>Achievement</h3>
                        </caption>
                        <tr>
                            <th colspan="4"> <span style="float:right;"><a href="achievement/upload.php"><button class="btn-primary">Add Achievement</button></a></span></th>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        <?php $res = mysqli_query($db, "SELECT* from achievement ORDER by id DESC");
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                            <tr>
                                <td><img src="<?php echo 'achievement/uploads/' . $row['image']; ?>" width="130px" height="130px" /></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><a href="achievement/edit.php?id=<?php echo $row['id']; ?>"><button class="btn-primary">Edit </button></a>
                                    <br> <br>
                                    <a href="achievement/delete.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"><button class="btn-primary btn_del">Delete</button></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
                <div class="table-container" style="display:inline;">

                    <?php
                    if (isset($_GET['image_success'])) {
                        echo '<div class="success">Gallery Uploaded successfully</div>';
                    }

                    if (isset($_GET['action'])) {
                        $action = $_GET['action'];
                        if ($action == 'saved') {
                            echo '<div class="success">Updated </div>';
                        } elseif ($action == 'deleted') {
                            echo '<div class="success">Gallery Deleted Successfully ... </div>';
                        }
                    }
                    ?>
                    <br><br>
                    <table cellpadding="10">
                        <caption>
                            <h3>Gallery</h3>
                        </caption>
                        <tr>
                            <th colspan="2"> <span style="float:right;"><a href="gallery/upload.php"><button class="btn-primary">Add Image</button></a></span></th>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <?php $res = mysqli_query($db, "SELECT* from gallery ORDER by id DESC");
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                            <tr>
                                <td><img src="<?php echo 'gallery/uploads/' . $row['image']; ?>" width="250px" height="300px" /></td>
                                <td><a href="gallery/edit.php?id=<?php echo $row['id']; ?>"><button class="btn-primary">Edit </button></a>
                                    <br> <br>
                                    <a href="gallery/delete.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?')"><button class="btn-primary btn_del">Delete</button></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>

            </div>
        </section>
        <section class="container contact" id="contact">
            <div class="contact-container">
                <div class="main-title">
                    <h2>Contact <span>Me</span><span class="bg-text">Contact</span></h2>
                </div>
                <div class="contact-content-con" style="display:inline;">
                    <div class="table-container">
                        <table cellpadding="10px">
                            <caption>
                                <h3>Feedback</h3>
                            </caption>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Description</th>
                            </tr>
                            <?php $res = mysqli_query($db, "SELECT* from feedback ORDER by id DESC");
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <td style="padding:10px;"><?php echo $row['name'] ?></td>
                                <td style="padding:10px;"><?php echo $row['email'] ?></td>
                                <td style="padding:10px;"><?php echo $row['subject'] ?></td>
                                <td style="padding:10px;"><?php echo $row['description'] ?></td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                    <br><br>
                    <div class="table-container" style="display:inline;">
                        <table cellpadding="10px">
                            <caption>
                                <h3>Contact</h3>
                            </caption>
                            <tr>
                                <th>Details</th>
                                <th>Location</th>
                                <th>Email</th>
                                <th>Education</th>
                                <th>Profession</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $res = mysqli_query($db, "SELECT* from contact where id=1");
                            $contact_row = mysqli_fetch_array($res);
                            ?>
                            <td style="padding:10px;"><?php echo $contact_row['details'] ?></td>
                            <td style="padding:10px;"><?php echo $contact_row['location'] ?></td>
                            <td style="padding:10px;"><?php echo $contact_row['email'] ?></td>
                            <td style="padding:10px;"><?php echo $contact_row['education'] ?></td>
                            <td style="padding:10px;"><?php echo $contact_row['profession'] ?></td>
                            <td style="padding:10px;"><?php echo $contact_row['phone'] ?></td>
                            <td><a href="contact/contact_edit.php?id= 1 "><button style=" padding: 6px 12px; font-size: 14px; font-weight: 400; cursor: pointer; border: 1px solid transparent; border-radius: 4px; background-color: #337ab7; color: #fff;" class="btn-primary">Edit </button></a>
                                <br>
                            </td>
                            </tr>
                        </table>
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

        <div class="control" data-id="timeline">
            <i class="fas fa-stream"></i>
        </div>

        <div class="control" data-id="blogs">
            <i class="far fa-newspaper"></i>
        </div>

        <div class="control" data-id="contact">
            <i class="fas fa-envelope-open"></i>
        </div>

    </div>
    <script src="app.js"></script>
</body>

</html>