<?php
	session_start();

	$uid = session_id();
	
    $host="localhost";
    $user="root";
    $password="";
    $db="ayandasecond";
  




    $con=mysqli_connect($host,$user,$password,$db);
   	$sql2= "
			
			SELECT SUM(subTotal) as total
FROM  cartt where userID='$uid';";
$hey=mysqli_query($con,$sql2);

while ($row=mysqli_fetch_array($hey)) {

	$total = $row["total"];



}



	if(isset($_POST["addToCart"]))
	
	{ 


		$p_id = $_POST["proId"];
		$user_id = $uid;

		$sql = "SELECT * FROM cartt WHERE prodID = '$p_id' AND userID = '$user_id'";
	
		$run_query = mysqli_query($con,$sql);
if(!$run_query){
  echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
        exit;

}
		$count = mysqli_num_rows($run_query);
		
		
		if($count > 0){
			
			 echo json_encode(["status" => "exists", "message" => "Product is already in the cart"]);
        exit;
		} 

		else
		 {
			
			$get = "SELECT * FROM products WHERE product_id = '$p_id'";
$query = mysqli_query($con,$get);
		if (mysqli_num_rows($query) > 0) {
while ($row=mysqli_fetch_array($query)) {
	$prodName = $row["product_title"];
						$prodDescription = $row["product_desc"];
						$prodPrice = $row["product_price"];
						$prodPicture = $row["product_image"];
						$sql;
						$sql = "INSERT INTO `cartt`
			VALUES ('$user_id','$p_id','$prodName','$prodDescription','$prodPrice','$prodPicture','1','$prodPrice')";
}
			if(mysqli_query($con,$sql)){
			
				 echo json_encode(["status" => "success", "message" => "Product added to cart"]);
			}
		}
		}	}
if (isset($_POST["Common"])) {
	
echo'<style>

/* Cart table */
table {
    width: 90%;
    max-width: 1000px;
    margin: 30px auto;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
    padding: 20px;
}

table th {
    font-size: 1.2rem;
    color: #007bff;
    padding: 10px;
    text-align: center;
    border-bottom: 2px solid #007bff;
}

table td {
    text-align: center;
    padding: 12px;
    font-size: 1rem;
}

table td img {
    width: 80px;
    height: auto;
    border-radius: 5px;
}

/* Cart total */
.total {
    text-align: center;
    font-size: 1.5rem;
    font-weight: bold;
    margin-top: 30px;
    color: #333;
}



/* Buttons */
button {
    padding: 12px 18px;
    font-size: 1rem;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease-in-out;
}

/* Checkout button */
.checkout {
    background-color: #007bff;
    color: white;
}

.checkout:hover {
    background-color: #0056b3;
}

/* Update button */
.update {
     background-color: #28a745;
    color: white;
	text-decoration:none;
}

.update:hover {
    background-color: #218838;
	text-decoration:none;
}

/* Remove button */
.remove {
      background-color: #dc3545;
    color: white;
	text-decoration:none;
}

.remove:hover {
   background-color: #bb2d3b;
	color:grey;
}

/* Modal buttons */
.modal-footer button {
    transition: 0.3s ease-in-out;
}

.modal-footer button:hover {
    transform: scale(1.05);
}
</style>';
	$sql= "SELECT * FROM cartt where userID='$uid'"; 
	$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
	echo "<table class='table'>
					<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Image</th>
					<th>Quantity</th> 
					<th>Price</th>
					<th>SubTotal</th>
					<th>Action</th>
					</tr> ";
				while ($row=mysqli_fetch_array($query)) {
						
						$product_id = $row["prodID"];
						$product_title = $row["prodName"];
						$product_price = $row["prodPrice"];
						$prodDesc = $row["prodDescription"];
			            $product_image = "product_images/" . $row['prodPicture'];
						$qty = $row["Quantity"];
						$subtotal=$row['subTotal'];

					echo 
							'
							
							<tr id="data">
							<td>'.$product_title.'</td>
							<td>'.$prodDesc.'</td>
							<td><img class="img-responsive" src='.$product_image.'></td>
							<td><input type="text" class="form-control qty" value="'.$qty.'" ></td>


							<td><input type="text" class="form-control price " value="'.$product_price.'" readonly="readonly"></td>
							<td><input type="text" class=" form-control qty" value="'.$product_price*$qty.'" readonly="readonly"></td>



							<td>	<a href="#" remove_id="'.$product_id.'" class="cart-button remove-btn remove"><span>Remove</span></a></td>
							<td>	<a href="#" update_id="'.$product_id.'" class="cart-button update-btn update"><span>Update</span></a></td>
							</tr> ';}

		echo '</table>';
	
echo '
<div class="total"><h3>Total: </h3> <input type="text" class="finaltotal" value='.$total.' readonly="readonly"></div>
'
;
if(isset($_SESSION["username"]))
		{
		$_SESSION['total']=$total;
			echo'	
			<a href="checkout.php">
    <button>Checkout</button>
</a>'
;
		}
		else{     
			echo'	
			
			<a href="login.php">
    <button>Checkout</button>
</a>';
		
		
		}	
						
				}
		}if (isset($_POST["updateCartItem"])) 
		{





			$update_id = $_POST["update_id"];



			$qty = $_POST["qty"];
if($qty==0)
{
	$qty=1;

	 exit;
}

			$price=$_POST['price'];
$subtotal=$price*$qty;





$sql = "UPDATE cartt SET Quantity='$qty',subTotal='$subtotal' WHERE prodID = '$update_id' AND userID = '$uid'";
			
			mysqli_query($con,$sql);
			
		}
		if (isset($_POST["delete"])) 
		{
			$update_id = $_POST["update_id"];
$sql = "Delete from cartt WHERE prodID = '$update_id' AND userID = '$uid'";
			echo $uid;
			mysqli_query($con,$sql);
			
		}




?>