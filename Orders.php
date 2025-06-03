<?php
session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "ayandasecond";

$con = mysqli_connect($host, $user, $password, $db);


if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$a = $_SESSION["username"];


$finalsql = "SELECT oi.order_item_id, oi.order_id, o.Email AS customer_email, 
                    o.Date AS order_date, o.Status AS order_status, p.product_title, 
                    oi.quantity, oi.price
             FROM order_items oi
             JOIN orders o ON oi.order_id = o.Id
             JOIN products p ON oi.product_id = p.product_id
             WHERE o.Email = '$a'";

$run_query = mysqli_query($con, $finalsql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
     
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

       
        .main-content {
            flex: 1;
            padding: 20px;
        }

 
        .table-container {
            width: 100%;
            overflow-x: auto;
            margin: auto;
            padding: 10px;
        }

       
        #image {
            display: block;
            margin: 40px auto;
            width: 250px;
            height: auto;
            opacity: 0.85;
            transition: transform 0.3s ease-in-out;
        }

        #image:hover {
            transform: scale(1.05);
        }
 
        footer {
            padding: 15px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>

    <?php include 'test 5.php'; ?>

    <div class="main-content">
        <h2 class="text-center mb-4">My Orders</h2>

        <?php 
        if (mysqli_num_rows($run_query) > 0) {
            echo "<div class='table-container'>
                    <table class='table table-striped table-bordered'>
                        <thead class='table-primary'>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>";

            while ($row = mysqli_fetch_array($run_query)) {
                echo "<tr>
                        <td>{$row['order_id']}</td>
                        <td>{$row['order_date']}</td>
                        <td>{$row['order_status']}</td>
                        <td>{$row['product_title']}</td>
                        <td>{$row['quantity']}</td>
                        <td>R" . number_format($row['price'], 2) . "</td>
                      </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<div class='text-center mt-4'>
                    <h3>No orders found</h3>
                    <img src='images/noorder.jpeg' id='image' class='img-fluid mt-3'>
                  </div>";
        }
        ?>
    </div>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
