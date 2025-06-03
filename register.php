<?php 
session_start();
$loginerror = $nameerror = $surnameerror = $emailerror = $cellphoneerror = $passworderror = $passwordretypeerror = $existingusererror = "";
$signupsubject = "James Website Registration Confirmation";

$host = "localhost";
$user = "root";
$password = "";
$db = "ayandasecond";

$con = mysqli_connect($host, $user, $password, $db);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
} else {
  if(isset($_POST['submita'])) {
    function sanitizer($infomation) {
      return htmlspecialchars(stripslashes(trim($infomation)));
    }

    $name = sanitizer($_POST['nname']);
    $surname = sanitizer($_POST['surname']);
    $email = sanitizer($_POST['email']);
    $phone = sanitizer($_POST['cellphonenumber']);
    $password = sanitizer($_POST['password']);
    $retypepassword = sanitizer($_POST['retypepassword']);

  
    if(empty($name) || !preg_match("/^[a-zA-Z-']*$/", $name)) $nameerror = "Only letters allowed in name";
    if(empty($surname) || !preg_match("/^[a-zA-Z-']*$/", $surname)) $surnameerror = "Only letters allowed in surname";
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $emailerror = "Invalid email format";
    if(empty($phone) || !preg_match("/^[0-9]*$/", $phone)) $cellphoneerror = "Only numbers allowed in phone";
    if(empty($password)) $passworderror = "Password required";
    if($password !== $retypepassword) {
      $passworderror = $passwordretypeerror = "Passwords do not match";
    }

    if(!$nameerror && !$surnameerror && !$emailerror && !$cellphoneerror && !$passworderror && !$passwordretypeerror) {
      $query2 = "SELECT * FROM userinfo WHERE email='$email'";
      $databasechecker = mysqli_query($con, $query2);
      if(mysqli_num_rows($databasechecker) > 0) {
        $existingusererror = "This email is already in use.";
      } else {


     $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO userinfo VALUES('$email','$name','$surname','','$phone','$hashedPassword')";
        mysqli_query($con, $query);
        $signupmessage = "Hi $email, welcome to James Hair Salon! Your username is $email.";
        mail($email, $signupsubject, $signupmessage);


         header("Location: login.php");
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<body>
    
<?php include 'test 5.php';?>

<div class="container mt-4">
    <h1 class="text-center">Sign Up</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="p-4 border rounded bg-light">
        <div class="form-group">
            <input type="text" name="nname" class="form-control" placeholder="Name"value="<?php echo isset($_POST['nname']) ? htmlspecialchars($_POST['nname']) : ''; ?>">
            <small class="text-danger"><?php echo $nameerror;?></small>
        </div>

        <div class="form-group">
            <input type="text" name="surname" class="form-control" placeholder="Surname"value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
            <small class="text-danger"><?php echo $surnameerror;?></small>
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <small class="text-danger"><?php echo $emailerror;?> <?php echo $existingusererror;?></small>
        </div>

        <div class="form-group">
            <input type="text" name="cellphonenumber" class="form-control" placeholder="Phone" value="<?php echo isset($_POST['cellphonenumber']) ? htmlspecialchars($_POST['cellphonenumber']) : ''; ?>">
            <small class="text-danger"><?php echo $cellphoneerror;?></small>
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" >
            <small class="text-danger"><?php echo $passworderror;?></small>
        </div>

        <div class="form-group">
            <input type="password" name="retypepassword" class="form-control" placeholder="Retype Password">
            <small class="text-danger"><?php echo $passwordretypeerror;?></small>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submita">Sign Up</button>
    </form>

    <p class="text-center mt-3">
        <a href="login.php" class="btn btn-link">Already have an account? Log in</a>
    </p>
</div>

<?php include 'footer.php';?>

</body>
</html>
