<?php

$conn = mysqli_connect("localhost", "root", "", "summer2023");

if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$name =  $_REQUEST['name'];
$email = $_REQUEST['email'];
$pass = $_REQUEST['pass'];
$ip = $_REQUEST['ip'];
$url=$_REQUEST['url'];
$dob=$_REQUEST['dob'];
$gender =  $_REQUEST['gender'];
$mobileno = $_REQUEST['mobileno'];
$info=$_REQUEST['info'];

// if($name!="" && $email!="" && $pass!="" && $ip !="" && $url !="" && $dob !="" && $gender !="" && $mobileno !="" && $info!=""){

$sql = "INSERT INTO users(name,email,pass,ip,url,dob,gender,mobileno,info)  VALUES ('$name','$email','$pass','$ip','$url','$dob','$gender','$mobileno','$info')";

if(mysqli_query($conn, $sql)){
    echo "Successful";

} else{
    echo "ERROR: not Successful $sql. "
        . mysqli_error($conn);
}

mysqli_close($conn);
?>
 