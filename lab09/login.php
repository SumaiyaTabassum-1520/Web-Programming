<?php
session_start();
 
require_once "cse479lab09";
 
if(isset($_SESSION['user_id'])!="") {
    header("Location: dashboard.php");
}
 
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
 
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
    }  
 
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password). "'");
   if(!empty($result)){
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['uid'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_mobile'] = $row['mobile'];
            header("Location: dashboard.php");
        } 
    }else {
        $error_message = "Incorrect Email or Password!!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 
                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>
 
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="" maxlength="8" required="">
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>  
                     
                    <input type="submit" class="btn btn-primary" name="login" value="submit">
                    <br>
                    You don't have account?<a href="registration.php" class="mt-3">Click Here</a>
                     
                     
                </form>
            </div>
        </div>     
    </div>
</body>
</html>