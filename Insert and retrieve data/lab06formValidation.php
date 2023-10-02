<!DOCTYPE html>
<html>

<head>
    <style>
        .error {
            color: #FF0001;
        }
    </style>
</head>

<body>

    <?php
    $nameErr = $emailErr = $passErr = $ipErr = $urlErr = $dobErr = $genderErr = $mobilenoErr = $infofErr = $agreeErr = "";
    $name = $email = $pass = $ip = $url = $dob = $gender = $mobileno = $info = $agree = "";

    //name validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = input_data($_POST["name"]);
            if (!preg_match("/^(?=.{4,20}$)[a-zA-Z]+(?: [a-zA-Z]+){0,2}$/", $name)) {
                $nameErr = "Only alphabets and white space are allowed";
            }
        }

        //Email Validation   
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = input_data($_POST["email"]);

            if (!preg_match("/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/", $email)) {
                $emailErr = "Invalid email format";
            }
        }

        //password validation
        if (empty($_POST["pass"])) {
            $passErr = "password is required";
        } else {
            $pass = input_data($_POST["pass"]);
            if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{7,25}$/", $pass)) {
                $passErr = "inavlid password";
            }
            if (strlen($pass) < 7) {
                $passErr = "password contains atleast 8 charechter";
            }
        }
        //ip validation
        if (empty($_POST["ip"])) {
            $ipErr = "ip address is required";
        } else {
            $ip = input_data($_POST["ip"]);
            if (!preg_match("/^(?:[0-9]{1,3}\.){3}[0-9]{1,3}$/", $ip)) 
            {
                $ipErr = "inavlid ip adress";
            }

        }
        //URL validation
        if (empty($_POST["url"])) {
            $urlErr = "URL is required";
        } else {
            $url = input_data($_POST["url"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
                $urlErr = "Invalid URL";
            }
        }
        //dob validation
        if (empty($_POST["dob"])) {
            $dobErr = "Date of birth is required";
        } else {
            $dob = input_data($_POST["dob"]);
            if (!preg_match("/^(0?[1-9]|[12][0-9]|3[01])-(0?[1-9]|1[0-2])-(19|20)\d{2}$/", $dob)) {
                $dobErr = "Format DD-MM-YYYY";
            }
        }

        //gender Validation  
        if (empty($_POST["gender"])) {
            $genderErr = "";
        } else {
            $gender = input_data($_POST["gender"]);
        }

        //mobile number validation 
        if (empty($_POST["mobileno"])) {
            $mobilenoErr = "";
        } else {
            $mobileno = input_data($_POST["mobileno"]);
            if (!preg_match("/^\+88+(01)+{3,4,5,6,7,8,9}[0-9]$/", $mobileno)) {
                $mobilenoErr = "Only numeric value is allowed.";
            }
            if (strlen($mobileno) != 11) {
                $mobilenoErr = "Mobile no must contain 10 digits.";
            }
        }

        //info validation
        if (empty($_POST["info"])) {
            $infofErr = "";
        } else {
            $info = input_data($_POST["info"]);
            if (!preg_match("/^(?!(?:\b\w+\b\s+){51})([A-Za-z0-9]+\s*){1,50}$/", $info)) {
                $infofErr = "Must contain only alphanumeric characters";
            }
            if (strlen($info) > 50) {
                $infofErr = "Info should not contain more than 50 words.";
            }
        }

        //Checkbox Validation  
        if (!isset($_POST['agree'])) {
            $agreeErr = "Accept terms of services before submit.";
        } else {
            $agree = input_data($_POST["agree"]);
        }
    }
    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>validation Form</h2>
    <span class="error">* required field </span>
    <br><br>
    <form method="post" action="inputform.php">

        <table>
            <tr>
                <td>Name: </td>
                <td> <input type="text" name="name">
                    <span class="error">*
                        <?php echo $nameErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Email: </td>
                <td> <input type="text" name="email">
                    <span class="error">*
                        <?php echo $emailErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="pass">
                    <span class="error">*
                        <?php echo $passErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>IP address of your router: </td>
                <td><input type="text" name="ip">
                    <span class="error">*
                        <?php echo $ipErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Personal web URL: </td>
                <td><input type="text" name="url">
                    <span class="error">*<?php echo $urlErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td><input type="text" name="dob">
                    <span class="error">*<?php echo $dobErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Gender: </td>
                <td> <input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                    <input type="radio" name="gender" value="other"> Other
                    <span class="error">*<?php echo $genderErr; ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td>Mobile No: </td>
                <td><input type="text" name="mobileno">
                    <span class="error">*
                        <?php echo $mobilenoErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>brief Info: </td>
                <td><textarea cols="30" rows="6" name="info"></textarea>
                    <span class="error">*
                        <?php echo $infofErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td> Agree to Terms of Service: </td>
                <td><input type="checkbox" name="agree">
                    <span class="error">*<?php echo $agreeErr; ?></span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit"></td>
                <td></td>
            </tr>
        </table>
    </form>

    <?php
   
// if(isset($_POST['submit']))
// {
//     $name =  $_REQUEST['username'];
//     $pass = $_REQUEST['pass'];
//     $dob=$_REQUEST['dob'];
//     $email = $_REQUEST['email'];
//     $mobileno = $_REQUEST['mobileno'];

//     $sql = "INSERT INTO user  VALUES ('$name','$pass','$dob','$email','$mobileno')";
//     if($query)
//     {
//         echo "<script>alert('Successfully Registered. You can login now');
//         window.location.href = 'user-login.php';
//         </script>";
//         //header('location:user-login.php');
//     }
// }
    ?>

</body>

</html>