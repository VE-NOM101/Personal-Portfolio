<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="section_styles.css">
    <title>Upload image, display, edit and delete in PHP </title>
    <style>
        table {
            border-collapse: collapse;
            /* Collapse borders into a single border */
            width: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table,
        th,
        td {
            border: 2px solid black;
            /* Set border for table, th, and td elements */
            padding: 10px;
            /* Add padding to th and td elements for spacing */
            text-align: left;
            /* Align text to the left */
        }
        
    </style>
</head>

<body>
    <div class="container_display">
        <span style="float:right;"><a href="upload.php"><button class="btn-primary">Add new project</button></a></span>
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
                  <td><img src="uploads/' . $row['project_image'] . '" height="200px" width="300px"></td> 
                  <td>' . $row['project_name'] . '</td> 
                  <td>' . $row['youtube_link'] . '</td> 
                  <td>' . $row['github_link'] . '</td> 
                  <td><a href="edit.php?id=' . $row['id'] . '"><button class="btn-primary">Edit </button></a>
                  	<br> <br>
                  	 <a href=\'delete.php?id=' . $row['id'] . '\' onClick=\'return confirm("Are you sure you want to delete?")\'"><button class="btn-primary btn_del">Delete</button></a>
                  </td> 
				</tr>';
            } ?>

        </table>
    </div>
</body>

</html>