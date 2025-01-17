<?php include 'connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Already Donor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('lab6Img1.jpg');
            text-align: center;
            background-color: rgba(108, 99, 101, 0.7); 
            background-blend-mode: overlay; 
            background-size: cover;
            padding: 50px;
        }
        .container {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px white;
            display: inline-block;
            background-color: white;
        }
        h1 {
            color:rgb(240, 176, 178);
        }
        h2 {
            color:  rgb(240, 176, 178);
        }
        .btn {
            background-color: #c57579;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #a85f5f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Good News!!!</h1>
        <h2>You are already our blood donor!!</h2>
        <a href="index.php" class="btn">Sign In</a>
    </div>
</body>
</html>
