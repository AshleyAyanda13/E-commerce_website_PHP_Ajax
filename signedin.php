<?php 
session_start();


if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>My Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            
            margin: 40px;
        }
        h1 {
            color: #333;
            font-size: 2em;
        }
        .containerr {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        img {
            max-width: 100%;
            height: auto;
        }
        .logout {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #ff4d4d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .logout:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>

<?php include 'test 5.php'; ?>

<div class="containerr">
    <h1>MY ACCOUNT</h1>
    <img src="images/account.png" alt="Account Image">
    
    <?php 
    $email = $_SESSION["username"];
    echo "<p>Hi! <strong>$email</strong></p>";
    ?>

    <p>HAPPY SHOPPING!!!</p>

    <a href="logout.php" class="logout">Log Out</a>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
