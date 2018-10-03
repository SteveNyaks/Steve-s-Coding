<?php
    try{
        require 'database.php';
        $conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $usrname = $password = $email = '';
        $usrequired = $passrequired = $erequired = '';
        
        if(empty($_POST["usrname"])){
            $usrequired = "This field is required";
        }else{
            $usrname = validate($_POST["usrname"]);
        }
                
        if(empty($_POST["password"])){
            $passrequired = "This field is required";
        }else{
            $password = validate($_POST["password"]);
        }
        
        if(empty($_POST["email"])){
            $erequired = "";
        }else{
            $email = validate($_POST["email"]);
        }
        
        if(isset($_POST['submit'])){            
            if(empty($usrname) || empty($password)){
                $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
            }else{
                $sql = "INSERT INTO tbl_login (username, password, email) VALUES ('$usrname', '$password', '$email')";
                $conn->exec($sql);
                $reply = '<div class="alert alert-success" role="alert">ACCOUNT SUCCESSFULLY CREATED!</div>';
            }           
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body class="swag">
        <section class="container skr">
            <?php
                if(isset($reply)){
                    echo $reply;
                }
            ?>            
            <div class="center display-4">SignUp Form</div><br/><br/>
            <h5 class="center">Fill The Form Below To Create An Admin Account.</h5><br/>
            <div class="col-lg-9 formspace">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="usrname"><b>Username:&nbsp;</b><span class="red">*<?php echo $usrequired;?></span></label>
                    <input value="Username" type="text"  name="usrname" class="form-control"><br/>
                    <label for="password"><b>Password:&nbsp;&nbsp;</b><span class="red">*<?php echo $passrequired;?></span></label>
                    <input value="Password" type="password" name="password" class="form-control"><br/>
                    <label for="email"><b>Email:&nbsp;&nbsp;</b><span class="red"><?php echo $erequired;?></span></label>
                    <input value="example@hostname.com" type="email" name="email" class="form-control"><br/>
                    <input type="submit" name="submit" value="SignUp" class="btn btn-primary right">
                </form>
            <p>Already have an account? <a href="login.php" class="logout">Login Here.</a></p>
            </div>
        </section>
    </body>
</html>