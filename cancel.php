<?php

session_start();
$uid = session_id();
$a=$_SESSION['username'];

$host="localhost";
$user="root";
$password="";
$db="ayandasecond";

$con=mysqli_connect($host,$user,$password,$db);


$sql1 = "DELETE FROM cartt WHERE userID = '$uid'";

$sql2 = "DELETE FROM checkout WHERE Email = '$a' and UserID='$uid'";

$sql3 = "DELETE FROM addresses WHERE Email = '$a' and UserID='$uid'";

mysqli_query($con,$sql1);
$g=mysqli_query($con,$sql2);
mysqli_query($con,$sql3);
if (!$g) {
    echo "Error: " . mysqli_error($con);
}

header('Location: home.php');



?>