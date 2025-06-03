<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="ayandasecond";

$con=mysqli_connect($host,$user,$password,$db);

if(isset($_SESSION["orderid"])){
$Oid=$_SESSION["orderid"];



$finalsql = "SELECT oi.order_item_id, oi.order_id, o.Email AS customer_email, 
                 o.Date AS order_date, o.Status AS order_status, p.product_title, 
                 oi.quantity, oi.price
          FROM order_items oi
          JOIN orders o ON oi.order_id = o.Id
          JOIN products p ON oi.product_id = p.product_id
          WHERE o.Id = $Oid";
$run_query = mysqli_query($con,$finalsql);
if (!$run_query) {
    echo "Error: " . mysqli_error($con);
}

if (mysqli_num_rows($run_query) > 0) 
{

	echo'<h5>You have Successfully Ordered On Padis Kitchen Delight </h5>';
 echo "<table border='1' id='orderTable'>
            <tr>
                <th>Order ID</th>
                <th>Email</th>
                <th>Date</th>
                <th>Status</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>";
				
					while ($row=mysqli_fetch_array($run_query)) {
						
					
					      echo "<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['customer_email']}</td>
                <td>{$row['order_date']}</td>
                <td>{$row['order_status']}</td>
                <td>{$row['product_title']}</td>
                <td>{$row['quantity']}</td>
                <td>R" . number_format($row['price'], 2) . "</td>
              </tr>";
        
        }
    
    
    }else{

        echo'<h5>You have Successfully Ordered On Padis Kitchen Delight </h5>';
 echo "<table border='1' id='orderTable'>
            <tr>
                <th>Order ID</th>
                <th>Email</th>
                <th>Date</th>
                <th>Status</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>";
				
					while ($row=mysqli_fetch_array($run_query)) {
						
					
					      echo "<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['customer_email']}</td>
                <td>{$row['order_date']}</td>
                <td>{$row['order_status']}</td>
                <td>{$row['product_title']}</td>
                <td>{$row['quantity']}</td>
                <td>R" . number_format($row['price'], 2) . "</td>
              </tr>";
                    }
    }

} else{

	echo'<h5>You have Successfully Ordered On Padis Kitchen Delight </h5>';

    echo ' <table border="1" id="orderTable">
            <tr>
                <th>Order ID</th>
                <th>Email</th>
                <th>Date</th>
                <th>Status</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
</table>';
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>

    
    function saveOrderReview() {
        const orderTable = document.getElementById("orderTable").innerHTML;
        localStorage.setItem("orderReviewData", orderTable);
    }

   
   window.addEventListener("beforeunload", function (event) {
    console.log("Script loaded and running!");
    
 
    if (typeof saveOrderReview === "function") {
        saveOrderReview();
    }


    event.preventDefault();
    event.returnValue = ""; 
});



    window.addEventListener("load", function () {
        const savedData = localStorage.getItem("orderReviewData");
                  console.log("Script loaded and running!");
        if (savedData) {
            document.getElementById("orderTable").innerHTML = savedData;
        }
    });
</script>

    <title>Order Review</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
        text-align: center;
    }

    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: white;
        text-transform: uppercase;
    }

    td {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    h1 {
        color: #333;
    }

    .text {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    h5 {
        color: #007bff;
        font-size: 18px;
    }

    a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    a:hover {
        background-color: #0056b3;
    }
</style>

</head>
<body>
<h1 class="text"> Order Review</h1>

   
    
    <?php 
    
echo '<a href="home.php">Go Back to Padis Kitchen Delight?</a>';
        
session_destroy();
 session_start();
 session_regenerate_id(true);

    ?>

 

</div>



</body>
</html>
