
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
 , initial-scale=1.0">


    <link rel="stylesheet" href="testaa.css">
    
    <link rel="stylesheet" href="povalla.css">


    <title>Logout</title>
</head>
<body>
    

<?php include 'test 5.php';?>


  <h1 class="">Logging OUT</h1>






</body>
<?php
session_start();
session_unset();
session_destroy();


header('Location: login.php');

?>
</html>