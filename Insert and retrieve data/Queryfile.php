<?php

$link = mysqli_connect("localhost", "root", "", "summer2023");
if(!$link){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT Username, mobile, email FROM users ORDER BY mobile DESC" ;

if(mysqli_query($link, $sql)){
    echo "query execute succesfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 
mysqli_close($link);
?>
