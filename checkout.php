
<?php
 session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit(); 
}
 $host="localhost";
 $user="root";
 $password="";
 $db="ayandasecond";
 
 $con=mysqli_connect($host,$user,$password,$db);
 $nameerror=$surnameerror=$streetadresserror=$complexbuildingerror=$suburberror=$citytownerror= $provinceerror=$postalcodeerror=	$success=$cellphoneerror="";
$session=session_id();

 if(isset($session)  &&   isset($_SESSION['username']))
 {



$a=$_SESSION['username'];


	$sql = "Select * from cartt where userID = '$session'";
			

	$run_query = mysqli_query($con,$sql);





	



	while($row = mysqli_fetch_array($run_query)){


$b=$row['prodID'];
$c=$row['prodName'];
$d=$row['prodDescription'];
$e=$row['prodPicture'];
$f=$row['Quantity'];
$g=$row['subTotal'];
$h=$row['prodPrice'];

$sql = "INSERT INTO `checkout`
			
VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$session')";

	mysqli_query($con,$sql);

	}









	$sqlcheck = "Select * from checkout where Email = '$a'";
	$check=mysqli_query($con,$sqlcheck);

	$checker=mysqli_num_rows($check);





	
}




$sql = "Select * from checkout where Email = '$a' and UserID='$session'";
			

$run_query = mysqli_query($con,$sql);




if (mysqli_num_rows($run_query) > 0) 
{

	echo '<style>img {
    max-height: 150px;
    width: auto; /* Keeps the original aspect ratio */
}</style>';

	echo '






<h1>Checkout</h1>










';
	echo "<table class='table table-bordered'>
					<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Image</th>
					<th>Quantity</th> 
					<th>Price</th>
					<th>SubTotal</th>
				
					</tr> ";
				
					while ($row=mysqli_fetch_array($run_query)) {
						
					
						$product_title = $row["prodName"];
						$prodDesc = $row["prodDescription"];
						$product_image= $row["prodPicture"];
						$qty = $row["Quantity"];
						$product_id = $row["subTotal"];
						$product_price=$row["prodPrice"];
						echo 
						'
						
						<tr>
						<td>'.$product_title.'</td>
						<td>'.$prodDesc.'</td>
					    <td><img class="img-fluid" src="product_images/'.$product_image.'"></td>
						<td>'.$qty.'</td>


						<td>'.$product_price.'</td>
						<td>'.$product_price*$qty.'</td>



						
						</tr> ';}





						

    					
					$tot=$_SESSION['total'];

					echo "
					
					<tr> 
					
					<td> <b>Total is: R $tot</td>
					
					</tr>";
					
					

						

	echo '</table>';
					}

























if (isset($_POST['cancel']))
{
	echo"should have deleted";
$sqldel1="DELETE FROM checkout where Email='$a'       ";
$sqldel2="DELETE FROM cartt where userID='$session' ";
$sqldel3="DELETE FROM addresses where Email='$a'";

mysqli_query($con,$sqldel1);

mysqli_query($con,$sqldel2);
mysqli_query($con,$sqldel3);
echo"should have deleted";


header("location:cartt.php");



}














					if(isset($_POST['savedata']))
  
  
			{
			
					 function sanitizer($infomation)
					 {
					   
					   $infomation=trim($infomation);
					   $infomation=stripslashes($infomation);
					   $infomation=htmlspecialchars($infomation);
					   return $infomation;
					   
					 } 
				   
					   $name=$surname=$email=$cellphonenumber=$password=$email="";
				   
				   
				   
					   $cellphone=$_POST['cellphonenumber'];
					 $name = $_POST['nname'];
					 $surname = $_POST['surname'];
					 $streetadress=$_POST['streetaddress'];
					$cellphoneerror="";
					 $complexbuilding=$_POST['complex_building'];

					 $citytown=$_POST['citytown'];
				   $province=$_POST['province'];

				   $postalcode=$_POST['postalcode'];
					$suburb=$_POST['suburb'];

					
				   
					 if(empty($_POST['nname']))
					 
					 {
					   
					   $nameerror="Name field cannot be empty";
					   
					   
					}
					   else
					   
					   {
					   
					   
					   $name=sanitizer($_POST['nname']);
					   if(!preg_match("/^[a-zA-Z-' ]*$/", $name))
					   {
					   
					   $nameerror="Only letters allowed in firstname";
					   
					   
					   }
					 }

					   if(empty($_POST['surname']))
					   
					   {
					   
						 $surnameerror="Surname field cannot be empty";
						 
						 
						 }
						 else
						 
						 {
						 
						 
						 $surname=sanitizer($_POST['surname']);
						 if(!preg_match("/^[a-zA-Z-' ]*$/", $surname))
						 {
						 
						 $surnameerror="Only letters allowed in Surname";
						 
						 
						 }
					   }
				   
						 
					  
					   if(empty($_POST['streetaddress']))
					   
					   {
					   
						 $streetadresserror="Street adress field cannot be empty";
						 
						 
						 }
						 else
						 
						 {
						 
						 
						 $streetadress=sanitizer($_POST['streetaddress']);
						
					   }

						   if(empty($_POST['cellphonenumber']))
						   {
					   
							 $cellphoneerror="cellphone field cannot be empty";
							
							 
							 }
							 else
							 
							 {
							 
							 
							 $cellphonenumber=sanitizer($_POST['cellphonenumber']);
							 if(!preg_match("/^[0-9]*$/", $cellphonenumber))
							 {
							 
							 $cellphoneerror="Only numbers allowed in cellpphone number";
							 
							 
							 }
						   }

						   if(empty($_POST['complex_building']))
					   
						   {
						   
							 $complexbuildingerror="complex/building field cannot be empty";
							 
							 
						}
							 else
							 
							 {
							 
							 
							 $complexbuilding=sanitizer($_POST['complex_building']);
							
						   }


						   if(empty($_POST['citytown']))
					   
						   {
						   
							 $citytownerror="City field cannot be empty";
							 
							 
							 }
							 else
							 
							 {
							 
							 
							 $citytown=sanitizer($_POST['citytown']);
							
						   }





						   if(empty($_POST['province']))
					   
						   {
						   
							 $provinceerror="Province field cannot be empty";
							 
							 
							 }
							 else
							 
							 {
							 
							 
							 $province=sanitizer($_POST['province']);
							 if(!preg_match("/^[a-zA-Z-' ]*$/", $province)) 
							 {
							 
							 
							 $provinceerror="Only letters allowed in province";
							 			 
						   }
						}

						   if(empty($_POST['postalcode']))
					   
						   {
						   
							 $postalcodeerror="Postal Code field cannot be empty";
							 
							 
							 }
							 else
							 
							 {
							 
							 
							 $postalcode=sanitizer($_POST['postalcode']);
							 if(!preg_match("/^[0-9]*$/", $postalcode))
							 {
							 
							 $postalcodeerror="Only numbers allowed in postal code";
							 
							 
							 }
						   }
						   if(empty($_POST['suburb']))
					   
						   {
						   
							 $suburberror="Suburb field cannot be empty";
							 
							 
							 }
							 else
							 
							 {
							 
							 
							 $suburb=sanitizer($_POST['suburb']);
							 if(!preg_match("/^[a-zA-Z-' ]*$/", $suburb))
							 {
							 
							 $suburberror="Only letters allowed in suburb";
							 }
							 
							 }
						   





			  

if($nameerror==""&&$surnameerror==""&&$streetadresserror==""&&$complexbuildingerror==""&&$suburberror==""&&$citytownerror==""&&$cellphoneerror==""&&$provinceerror==""&&$postalcodeerror=="")

{




$success="data saved";


$query ="INSERT INTO addresses VALUES('','$a','$name','$surname','$streetadress','$complexbuilding','$suburb','$citytown','$cellphonenumber','$province','$postalcode','$session')";

$g=	mysqli_query($con,$query);
if (!$g) {
    

}
echo '<style>
.form{
visibility:hidden;
}
</style>';



}
			}
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
 , initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<style>


/* General styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 20px;
    text-align: center;
}

/* Checkout Form */
.form {
    width: 60%;
    max-width: 500px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    margin: auto;
}

/* Input Fields */
.what {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Error Messages */
.error {
    color: red;
    font-size: 14px;
}

/* Buttons */
.submit, .cancel, .paynow {
    width: 100%;
    padding: 10px;
    margin-top: 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.submit {
    background-color: #28a745;
    color: white;
}

.cancel {
    background-color: #dc3545;
    color: white;
}

.paynow {
    background-color: #007bff;
    color: white;
}

/* Button Hover Effects */
.submit:hover, .cancel:hover, .paynow:hover {
    opacity: 0.8;
}



	</style>
 
    
  


    <title>Checkout</title>
</head>
<body>
<?php




if($success=="data saved")
{


$sql4="SELECT * from addresses where Email='$a' and UserID='$session'";


$run_query = mysqli_query($con,$sql4);




if (mysqli_num_rows($run_query) ==1) 
{
	echo '<h1>Delivery Address</h1>';
	echo "<a href='checkout2.php' class='anchor'>Edit</a>
        ";
	echo "<table class='table table-bordered'>
					<tr>
					<th>Reciever Name</th>
					<th>Surname</th>
					<th>Street Address</th>
					<th>Complex</th> 
					<th>City</th>
					<th>Cellphone</th>
					<th>Province</th>
					<th>PostalCode</th>
				
					</tr> ";
				
					while ($row=mysqli_fetch_array($run_query)) 
					{
						
						$Id=$row["Id"];
						$_SESSION["Address_Id"]=$Id;
						$recieverName = $row["ReceiverName"];
						$Surname = $row["Surname"];
						$StreetAddress= $row["Street Address"];
						$Complex = $row["Complex"];
						$City = $row["City"];
						$CellPhone=$row["CellPhone"];
						$Province = $row["Province"];
						$PostalCode=$row["postalCode"];

							echo"
							<tr>							
							<td>$recieverName</td>
							<td>$Surname</td>
							<td>$StreetAddress</td>
							<td>$Complex</td>
							<td>$City</td>
							<td>$CellPhone</td>
							<td>$Province</td>
							<td>$PostalCode</td>
							</tr>
							";
							echo "</table>";
					}
}





echo'

 <form action="https://sandbox.payfast.co.za​/eng/process" method="post">
   <input type="hidden" name="merchant_id" value="10000100">
   <input type="hidden" name="merchant_key" value="46f0cd694581a">
   <input type="hidden" name="amount" value='.$tot.'>
   <input type="hidden" name="item_name" value="Test Product">
<input type="hidden" name="return_url" value="http://localhost/Projects/Project%20Initial/Integration/Deliverable%203/success.php">

   <!-- Optional: Redirect if payment is canceled -->
   <input type="hidden" name="cancel_url" value="http://localhost/Projects/Project%20Initial/Integration/Deliverable%203/cancel.php">


   <input type="submit" class="paynow"value="Pay Now">
</form>


'	;
echo '<style>#cancelling{
text-decoration:none;
}


#cancelling:hover
{

color:white;
}

</style>';
echo ' <a id="cancelling" class="cancel" href="cancel.php" name="cancel">Cancel Checkout</button>';
 }
?>
<?php

	   
		
				
	
$sql5="SELECT * from addresses where UserID='$session' and Email='$a'";


$run_query = mysqli_query($con,$sql5);




if (mysqli_num_rows($run_query) < 1) 
{

  echo '<form name="newForm" class="form" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">
  <h1>Recipient Delivery Information</h1>
  
  <input type="text" name="nname" class="what" placeholder="Receiver Name" value="' . (isset($_POST['nname']) ? htmlspecialchars($_POST['nname']) : '') . '">
  <br>
  <span class="error">' . $nameerror . '</span><br>
  
  <input type="text" name="surname" class="what" placeholder="Receiver Surname" value="' . (isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '') . '">
  <br>
  <span class="error">' . $surnameerror . '</span><br>
  
  <input type="text" name="streetaddress" class="what" placeholder="Street Address" value="' . (isset($_POST['streetaddress']) ? htmlspecialchars($_POST['streetaddress']) : '') . '">
  <br>
  <span class="error">' . $streetadresserror . '</span><br>

  <input type="text" name="complex_building" class="what" placeholder="Complex/Building" value="' . (isset($_POST['complex_building']) ? htmlspecialchars($_POST['complex_building']) : '') . '">
  <br>
  <span class="error">' . $complexbuildingerror . '</span><br>

  <input type="text" name="suburb" class="what" placeholder="Suburb" value="' . (isset($_POST['suburb']) ? htmlspecialchars($_POST['suburb']) : '') . '">
  <br>
  <span class="error">' . $suburberror . '</span><br>

  <input type="text" name="citytown" class="what" placeholder="City/Town" value="' . (isset($_POST['citytown']) ? htmlspecialchars($_POST['citytown']) : '') . '">
  <br>
  <span class="error">' . $citytownerror . '</span><br>

  <input type="text" name="cellphonenumber" class="what" placeholder="Cellphone" value="' . (isset($_POST['cellphonenumber']) ? htmlspecialchars($_POST['cellphonenumber']) : '') . '">
  <br>
  <span class="error">' . $cellphoneerror . '</span><br>

  <input type="text" name="province" class="what" placeholder="Province" value="' . (isset($_POST['province']) ? htmlspecialchars($_POST['province']) : '') . '">
  <br>
  <span class="error">' . $provinceerror . '</span><br>

  <input type="text" name="postalcode" class="what" placeholder="Postal Code" value="' . (isset($_POST['postalcode']) ? htmlspecialchars($_POST['postalcode']) : '') . '">
  <br>
  <span class="error">' . $postalcodeerror . '</span><br>

  <button type="submit" class="cancel" name="cancel">Cancel Checkout</button>
  <button type="submit" class="submit" name="savedata" id="buttonn">Save</button>

</form>';
}

?> 	

		




	

  
  
  
 
  


</body>
</html>


