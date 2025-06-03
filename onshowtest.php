<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "ayandasecond";

$con = mysqli_connect($host, $user, $password, $db);

// Function to sanitize input
function sanitizer($info) {
    return htmlspecialchars(stripslashes(trim($info)));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padi's Kitchen Delight</title>
    <link rel="stylesheet" href="bootstrap.min.css">

    <style>
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Search Bar */
        .search {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }

        .search input {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search button {
            padding: 8px 12px;
            margin-left: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .search button:hover {
            background-color: #0056b3;
        }

        /* Product Grid */
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px auto;
        }

        /* Card Styling */
        .card {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 15px;
            transition: 0.3s;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .card h4 {
            font-size: 1.2rem;
            color: #333;
            margin-top: 10px;
        }

        .card p {
            font-size: 1rem;
            color: #555;
        }

        /* Product Image Container */
        .image-container {
            width: 100%;
            height: 250px;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Add to Cart Button */
        button.addtocart {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        button.addtocart:hover {
            background-color: #218838;
        }

        /* Back to Top */
        a[href="#top"] {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1.2rem;
            color: #007bff;
            text-decoration: none;
        }

        a[href="#top"]:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<?php include_once 'test 5.php'; ?>

<div id="cartMessage"></div> <!-- Message display container -->

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Product added to the cart successfully! 🛒
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Search Bar -->
<div class="search">
    <form action="toets.php" method="POST">
        <input type="text" name="nname"  placeholder="Search for Products"required>
        <button type="submit" name="submita">Search</button>
    </form>
</div>

<!-- Products Grid -->
<div class="row mt-2 pb-3">
    <?php
    $sqlimage = "SELECT * FROM products";
    $imageresult1 = mysqli_query($con, $sqlimage);

    while ($row = mysqli_fetch_assoc($imageresult1)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $product_image = "product_images/" . $row['product_image'];
        $product_desc = $row['product_desc'];

        echo "
        <div class='col-sm-6 col-md-4 col-lg-3 mb-2'>
            <div class='card p-2 border-secondary mb-2'>
                <div class='image-container'>
                    <img src='$product_image' class='img-fluid product'>
                </div>
                <h4>$product_title</h4>
                <p><i>$product_desc is R$product_price </i></p>
                <button type='button' pid='$product_id' class='addtocart'>&nbsp;&nbsp;Add to cart</button>
            </div>
        </div>";
    }
    ?>
</div>

<a href="#top">Top<i class="fa-solid fa-circle-up"></i></a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $(".addtocart").click(function(event) {
        var pid = $(this).attr("pid");
        event.preventDefault();

        $.ajax({
            url: "action.php",
            method: "POST",
            data: { addToCart: 1, proId: pid },
            success: function(data) {
 
                let response = JSON.parse(data);
                let messageDiv = $("#cartMessage");

                messageDiv.html(""); 
                
                if (response.status === "exists") {
                    messageDiv.html(`<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <span>${response.message}</span>
                        <button type='button' class='close' onclick='closeMessage()'>&times;</button>
                    </div>`);
                    setTimeout(closeMessage, 3000);
                } else {
                    window.location.href = "cartt.php";
                }
            }
        });
    });
});

function closeMessage() {
    $("#cartMessage").fadeOut(500, function() { $(this).html("").fadeIn(); });
}
</script>

<?php include_once 'footer.php'; ?>
<script src="bootstrap.bundle.min.js"></script>

</body>
</html>
