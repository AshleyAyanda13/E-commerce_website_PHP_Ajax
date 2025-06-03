<?php 
session_start();
$host="localhost";
$user="root";
$password="";
$db="ayandafirst";

$con=mysqli_connect($host,$user,$password,$db);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;


}


else
{

$email2=$_SESSION['email'];;

if(isset(($_POST['submitb'])))
{



    $password1=$_POST['pass'];
    $password2=$_POST['passreenter'];


    if($password1==$password2)
    {
     $query4="UPDATE signup SET password='$password1' WHERE email='$email2';";
    mysqli_query($con,$query4);
    echo "<script>Alert(You have successsfully changed your password );</script>";
    unset($_SESSION["email"]);


    }
    else{


      echo "<script>Passwords dont match.</script>";
    }


  }




}

$token=uniqid(md5(time()));





?>

<form name="form"  method="POST">


<input type="text" name="pass" class="what" required placeholder="New Password">
 
  <input type="text" name="passreenter" class="what" required placeholder="Re-enter Password">
  <button type="submit" class="btn" name="submitb" id="button">Set new password</button>
</form>








