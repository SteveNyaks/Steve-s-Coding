<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="col-lg-3 side">
            <div class="right">&nbsp;<a class="logout wl" href="logout.php">Logout</a></div>
            <?php
                if(isset($_SESSION['username'])){
                    echo "<div class='wl'>Welcome, <b>".$_SESSION['username']."</b>.</div>"; 
                }else{
                    header('location: home.php');
                }
            ?>
            <br/><br/>
            <ul>
                <li>
                    <h2 class="display-4">Dashboard</h2>
                </li>
                <li>
                    <a href="addStudent.php">Add Student</a>
                </li>
                <li>
                    <a href="editStudent.php">Edit Student</a>
                </li>
                <li>
                    <a href="deleteStudent.php">Delete Student</a>
                </li>
                <li>
                    <a href="viewStudent.php">View Student</a>
                </li>
            </ul>
        </div>
    </body>
</html>