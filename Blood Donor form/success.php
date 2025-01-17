<?php include 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('lab6Img1.jpg');
            background-size: cover;
            text-align: center;
            background-color: rgba(108, 99, 101, 0.7); 
            background-blend-mode: overlay; 
            text-align: center;
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
            
            color:   rgb(240, 176, 178); 
            font-size: 36px;
        }
        h2 {
            color:  rgb(240, 176, 178);
        }
        .message {
            font-size: 24px;
            margin-top: 20px;
            color:  black

        }
        .button {
            padding: 10px 20px;
            background-color: #c57579;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 30px;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Congratulations!!!</h1>
    <h2> You are a blood donor now!!!</h2>
    <a href="index.php" class="button">Visit our Website!</a>
</div>
</body>
</html>
