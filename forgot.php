<?php // formtest2.php
session_start();
$loginerror=$nameerror=$surnameerror=$emailerror=$cellphoneerror=$passworderror=$passwordretypeerror=$existingusererror="";
$forgottenpasswordsubject="Password Reset";
$link=" Please copy and paste the following link on a browser: forgot2.php";



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
if(isset($_POST['submit']))
{

  
  function sanitizer($infomation)
  {$infomation=trim($infomation);
    $infomation=stripslashes($infomation);
    $infomation=htmlspecialchars($infomation);
    return $infomation;
    }
 $email=$_POST['email'];
 if(empty($_POST['email']))
    {
$emailerror="Email field has to be atleast two letters and not empty";
        } else
        
        {
         $email=sanitizer($_POST['email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
          {
          
          $emailerror="Email address is incorrect";
          }

        

          if( $emailerror=="" )
          {


            $query3="Select * from signup where email='$email'";

            $signindatabase=mysqli_query($con,$query3);
                      
            $databaserowschecker=mysqli_num_rows($signindatabase);
            echo "<script>alert('Success! if you have an existing account you will recieve a email')</script>";

          
          
            if($databaserowschecker==1)
            {
                echo "<script>alert('you have an account!')</script>";
                $_SESSION["email"]=$email;


                header("Location:forgot2.php");



//             mail(TO,Subject,message);




                //  mail($email,$forgottenpasswordsubject,$link);
          
          
          
            
            }
          }
}
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='testa.css'>
</head>
<body>
  <?php include 'header.php'?>
  <div id="container">
<div id="main">
 <div id="hold">
 <h1 id="password">Forgot Password.</h1>
 <div id="mess">
<form method="POST">





<?php
$token=md5("Ayanda");



echo $token;





?>


<p>Have you forgotten your password? Enter your Email below. </p>
<br>
<label for="gmail">Email Address:</label><br>
<input type="text" id="fname" required name="email"><br>
<span id="error"><?php echo $emailerror?></span> 
<br>

  <input type="submit" name="submit"value="Submit">
</form>
</div>
</div>
</div>
</div>
<?php include 'te.php' ?>
</body>
</html>