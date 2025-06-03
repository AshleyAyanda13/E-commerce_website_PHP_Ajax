<?php 
session_start();
$loginerror="";

$host="localhost";
$user="root";
$password="";
$db="ayandasecond";

$con=mysqli_connect($host,$user,$password,$db);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}
$storedHashedPasswordd="";
if(isset($_POST['submitb'])) {
    $username=$_POST['username'];
    $signinpassword=$_POST['signinpassword'];
$query3 = "SELECT password FROM userinfo WHERE email='$username'";

    $storedHashedPassword ;
   $signindatabase=mysqli_query($con,$query3);
    $databaserowschecker=mysqli_num_rows($signindatabase);
    if($databaserowschecker==1){

  $storedHashedPassword= mysqli_fetch_assoc($signindatabase);

   $storedHashedPasswordd = $storedHashedPassword["password"]; 
    }

  
    
    if(password_verify($signinpassword, $storedHashedPasswordd)&&$databaserowschecker==1) {
        $_SESSION["username"] = $username;
       header('Location:signedin.php');
        exit;
    } else {    
        $loginerror = "Invalid login attempt";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
<style>
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 350px;
    }

    h2 {
        color: #343a40;
        margin-bottom: 20px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
    }

    button {
        background: #007bff;
        color: #fff;
        padding: 10px;
        width: 100%;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #0056b3;
    }

    .error {
        color: red;
        font-size: 14px;
    }

    p {
        margin-top: 15px;
    }

    .anchor {
        text-decoration: none;
        color: #007bff;
    }

    .anchor:hover {
        text-decoration: underline;
    }
</style>


</head>
 <?php include_once 'test 5.php';?>
<body>
<div class="wrapper">
        <div class="login-container">
        <h2 class="mb-3">Login</h2>

        <form action="" method="POST">
            <small class="error d-block mb-3"><?php echo $loginerror;?></small>

            <div class="mb-3">
                <input type="email" name="username" class="form-control"  placeholder="Email" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            </div>

            <div class="mb-3">
                <input type="password" name="signinpassword" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" name="submitb" class="btn btn-primary">Login</button>
        </form>

        <p class="mt-3">
            <a href="register.php" class="anchor">Don't have an account? Sign up</a>
        </p>
    </div>
</div>
</body>

    <?php include 'footer.php'; ?>

  

</body>
</html>
