 <?php
    session_start();
    if(isset($_SESSION['username'])){
        $id = $surname = $firstname = $othername = $gender = $phone_number = $DOB = $email = $campus = $student_pic = $course = $hallofresidence = $yearofenterance = $yearofdeparture = $student_level = $guardian_number = '';

        $idrequired = $snrequired = $fnrequired = $onrequired = $grequired = $pnrequired = $DOBrequired = $erequired = $crequired = $prequired = $prrequired = $rrequired = $endrequired = $exdrequired = $hrequired = $wrequired = '';

        try{
            require 'database.php';
            $conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(empty($_POST["id"])){
                $idrequired = "This field is required";
            }else{
                $id = validate($_POST["id"]);
            }

            if(empty($_POST["surname"])){
                $snrequired = "This field is required";
            }else{
                $surname = validate($_POST["surname"]);     
            }

            if(empty($_POST["firstname"])){
                $fnrequired = "This field is required";
            }else{
                $firstname = validate($_POST["firstname"]);
            }

            if(empty($_POST["othername"])){
                $onrequired = "";
                $othername = "";
            }else{
                $othername = validate($_POST["othername"]);
            }

            if(empty($_POST["gender"])){
                $grequired = "This field is required";
            }else{
                $gender = validate($_POST["gender"]);
            }

            if(empty($_POST["phone_number"])){
                $pnrequired = "This field is required";
            }else{
                $phone_number = validate($_POST["phone_number"]);
            }

            if(empty($_POST["DOB"])){
                $DOBrequired = "This field is required";
            }else{
                $DOB = validate($_POST["DOB"]);
            }

            if(empty($_POST["email"])){
                $erequired = "This field is required";
            }else{
                $email = validate($_POST["email"]);
            }

            if(empty($_POST["campus"])){
                $crequired = "";
            }else{
                $campus = validate($_POST["campus"]);
            }

            if(empty($_POST["student_pic"])){
                $prequired = "";
                $student_pic = "";
            }else{
                $student_pic = validate($_POST["student_pic"]);
            }

            if(empty($_POST["course"])){
                $prrequired = "This field is required";
            }else{
                $course = validate($_POST["course"]);
            }

            if(empty($_POST["hallofresidence"])){
                $rrequired = "This field is required";
            }else{
                $hallofresidence = validate($_POST["hallofresidence"]);
            }

            if(empty($_POST["yearofenterance"])){
                $endrequired = "This field is required";
            }else{
                $yearofenterance = validate($_POST["yearofenterance"]);
            }

            if(empty($_POST["yearofdeparture"])){
                $exdrequired = "This field is required";
            }else{
                $yearofdeparture = validate($_POST["yearofdeparture"]);
            }

            if(empty($_POST["student_level"])){
                $hrequired = "This field is required";
            }else{
                $student_level = validate($_POST["student_level"]);
            }

            if(empty($_POST["guardian_number"])){
                $wrequired = "This field is required";
            }else{
                $guardian_number = validate($_POST["guardian_number"]);
            }
            
            if(isset($_POST['submit'])){
                if($idrequired || $snrequired || $fnrequired || $grequired || $pnrequired || $DOBrequired || $erequired || $prrequired || $rrequired || $endrequired || $exdrequired){
                    $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
                }else{
                    $sql = "INSERT INTO tbl_studentinfo(id, surname, firstname, othername, gender, phone_number, DOB, email, campus, student_pic, course, hallofresidence, yearofenterance, yearofdeparture, student_level, guardian_number) VALUES ('$id', '$surname', '$firstname', '$othername', '$gender', '$phone_number', '$DOB', '$email', '$campus', '$student_pic', '$course', '$hallofresidence', '$yearofenterance', '$yearofdeparture', '$student_level', '$guardian_number')";
                    $conn->exec($sql);
                    $reply = '<div class="alert alert-success" role="alert">NEW STUDENT SUCCESSFULLY ADDED!</div>';
                }
            }            
        }catch(PDOException $e){
            echo $sql . "<br/>" . $e->getMessage();
        }
    }else{
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Student</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>        
        <div class="col-lg-9 right wksp">
            <h3 class="center">Fill The Form To Add Student Data.</h3>
            <?php
                if(isset($reply)){
                    echo $reply;
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="id"><b>ID:&nbsp;</b><span class="red">*<?php echo $idrequired;?></span></label>
                        <input value="<?php echo $id; ?>" type="text" name="id" class="col-lg-3 form-control">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="surname"><b>Surname:&nbsp;</b><span class="red">*<?php echo $snrequired;?></span></label>
                        <input value="<?php echo $surname;?>" type="text" name="surname" class="form-control">
                    </div>
                    <div class="col">
                        <label for="firstname"><b>Firstname:&nbsp;</b><span class="red">*<?php echo $fnrequired;?></span></label>
                        <input value="<?php echo $firstname; ?>" type="text" name="firstname" class="form-control">
                    </div>
                    <div class="col">
                        <label for="othernames"><b>Othernames:&nbsp;</b><span class="red"><?php echo $onrequired;?></span></label>
                        <input value="<?php echo $othername; ?>" type="text" name="othername" class="form-control">
                    </div>
                </div><br/>                
                
                <div class="form-row">
                    <div class="col">
                        <label for="gender"><b>Gender:&nbsp;</b><span class="red">*<?php echo $grequired;?></span></label>
                        <input value="<?php echo $gender; ?>" type="text" name="gender" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="phone_number"><b>Phone Number:&nbsp;</b><span class="red">*<?php echo $pnrequired;?></span></label>
                        <input value="<?php echo $phone_number; ?>" type="text"  name="phone_number" class="form-control">
                    </div>
                        
                    <div class="col">
                        <label for="DOB"><b>Date of Birth:&nbsp;</b><span class="red">*<?php echo $DOBrequired;?></span></label>
                        <input value="<?php echo $DOB; ?>" type="date" name="DOB" class="form-control">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="email"><b>Email:&nbsp;</b><span class="red">*<?php echo $erequired;?></span></label>
                        <input value="<?php echo $email; ?>" type="email" name="email" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="campus"><b>Campus:&nbsp;</b><span class="red"><?php echo $crequired;?></span></label>
                        <input value="<?php echo $campus; ?>" type="text" name="campus" class="form-control">
                    </div>
                    
                    <div class="col custom-file">
                        <label for="student_pic"><b>Profile student_picture:&nbsp;</b><span class="red"><?php echo $prequired;?></span></label>
                        <input type="file" name="student_pic" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="course"><b>course:&nbsp;</b><span class="red">*<?php echo $prrequired;?></span></label>
                        <input value="<?php echo $course; ?>" type="text" name="course" class="form-control">
                    </div>

                    <div class="col">
                        <label for="hallofresidence"><b>hallofresidence:&nbsp;</b><span class="red">*<?php echo $rrequired;?></span></label>
                        <input value="<?php echo $hallofresidence; ?>" type="text" name="hallofresidence" class="form-control">
                    </div>

                    <div class="col">
                        <label for="yearofenterance"><b>Year of Enterance:&nbsp;</b><span class="red">*<?php echo $endrequired;?></span></label>
                        <input type="text" name="yearofenterance" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="yearofdeparture"><b>Year of Departure:&nbsp;</b><span class="red">*<?php echo $exdrequired;?></span></label>
                        <input type="text" name="yearofdeparture" class="form-control">
                    </div>

                    <div class="col">
                        <label for="student_level"><b>student_level:&nbsp;</b><span class="red"><?php echo $hrequired;?></span></label>
                        <input value="<?php echo $student_level; ?>" type="number" name="student_level" class="form-control">
                    </div>

                    <div class="col">
                        <label for="guardian_number"><b>guardian_number:&nbsp;</b><span class="red"><?php echo $wrequired;?></span></label>
                        <input value="<?php echo $guardian_number; ?>" type="number" name="guardian_number" class="form-control">
                    </div>
                </div><br/>

                <input type="submit" name="submit" value="Add To Database" class="btn btn-primary right">
            </form>        
        </div>
        <?php
            include 'sidebar.php';
        ?>
        
    </body>
</html>