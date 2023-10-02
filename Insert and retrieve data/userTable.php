<?php
$link = mysqli_connect("localhost", "root", "", "summer2023");
 
if(!$link){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "CREATE TABLE users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    UserName VARCHAR(30) NOT NULL,
    Email VARCHAR(70) NOT NULL UNIQUE,
    IP_address VARCHAR(30) NOT NULL,
    Web_address VARCHAR(30) NOT NULL,
    Age date NOT NULL,
    Gender VARCHAR(30) NOT NULL,
    Mobile VARCHAR(30) NOT NULL,
    Information VARCHAR(30) NOT NULL
    
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>