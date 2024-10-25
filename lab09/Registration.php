<?php
require_once "file.php";
if (isset($_SESSION['user_id']) != "") {
    header("Location: dashboard.php");
}
if (isset($_POST['signup'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
    }
    if ($password != $cpassword) {
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $name_error = "Name must contain only alphabets and space";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }


    if (mysqli_query($conn, "INSERT INTO users(id,password,confirmPassword,name, email) VALUES('" . $id . "', '" . md5($password) . "','" . md5($cpassword) . "', '" . $name . "', '" . $email . "')")) {
        header("location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Registration </h2>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <table>
                        <tr>
                            <div class="form-group">
                                <td>ID </td>
                                <td><input type="text" name="id" class="form-control" value="" maxlength="100"
                                        required="">
                                    <span class="text-danger">
                                        <?php if (isset($name_error))
                                            echo $name_error; ?>
                                    </span>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td>Password</td>
                                <td> <input type="password" name="password" class="form-control" value=""
                                        maxlength="100" required="">
                                    <span class="text-danger">
                                        <?php if (isset($password_error))
                                            echo $password_error; ?>
                                    </span>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td>Confirm Password</td>
                                <td><input type="password" name="cpassword" class="form-control" value=""
                                        maxlength="100" required="">
                                    <span class="text-danger">
                                        <?php if (isset($cpassword_error))
                                            echo $cpassword_error; ?>
                                    </span>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <td>Name</td>
                                <td><input type="text" name="name" class="form-control" value="" maxlength="100"
                                        required="">
                                    <span class="text-danger">
                                        <?php if (isset($name_error))
                                            echo $name_error; ?>
                                    </span>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group ">
                                <td>Email</td>
                                <td><input type="email" name="email" class="form-control" value="" maxlength="30"
                                        required="">
                                    <span class="text-danger">
                                        <?php if (isset($email_error))
                                            echo $email_error; ?>
                                    </span>
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <td> <input type="submit" class="btn btn-primary" name="signup" value="Register"></td>
                            <td><a href="login.php" class="btn btn-default">Login</a></td>
                        </tr>
                </form>
            </div>
        </div>
    </div>
</body>

</html>