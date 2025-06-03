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






mysqli_query($con,$sql1);


$b=date("Y-m-d H:i:s");
$d=$_SESSION["Address_Id"];


$sql5 = "INSERT INTO `Orders`
			
VALUES ('','$a','$b','Processing','$d')";

$h=mysqli_query($con,$sql5);
if (!$h) {
    echo "Error: " . mysqli_error($con);
}
unset($_SESSION["Address_Id"]);





$sql9="SELECT * from orders where Email='$a' and UserID='$uid'";
$order_id = mysqli_insert_id($con);
$_SESSION["orderid"]=$order_id;
$sql8="SELECT * from checkout where Email='$a' and UserID='$uid'";
$run_query = mysqli_query($con,$sql8);
if (!$run_query) {
    echo "Error: " . mysqli_error($con);
}
		
					while ($row=mysqli_fetch_array($run_query)) {
						
					
						$product_id = $row["prodID"];
						$prodPrice = $row["prodPrice"];
						$product_quantity= $row["Quantity"];
                    
                   
                    $sql10 = "INSERT INTO `order_items`
			
VALUES ('','$order_id','$product_id','$product_quantity','$prodPrice')";

$g=mysqli_query($con,$sql10);

if (!$g) {
    echo "Error: " . mysqli_error($con);
}
                    }
                    
$sql2 = "DELETE FROM checkout WHERE Email = '$a'";
$g=mysqli_query($con,$sql2);

if (!$g) {
    echo "Error: " . mysqli_error($con);
}


header('Location: OrderReview.php');



?>