 <?php   include_once 'test 5.php'  ?>
<?php

$host="localhost";
$user="root";
$password="";
$db="ayandasecond";

$con=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['submita'])){
$error="";
if(empty($_POST['nname']))
  
{
$error="Search string Required";

}
else
{
function sanitizer($infomation)
 {
   
   $infomation=trim($infomation);
   $infomation=stripslashes($infomation);
   $infomation=htmlspecialchars($infomation);
   return $infomation;
 }
 if(isset($_POST['nname'])){
$a=$_POST['nname'];
}
	
                $sqlimage  = "SELECT *
                FROM products
                WHERE product_title LIKE '%$a%';";

              $imageresult1 = mysqli_query($con,$sqlimage);
              
               $grand_total = 0;

               $signindatabase=mysqli_query($con,$sqlimage);
            
               $databaserowschecker=mysqli_num_rows($signindatabase);
               if ($databaserowschecker==0)

               {

                echo '<p>
                No products found
                </p>';
               }
               while($row=mysqli_fetch_assoc($imageresult1))

              {
              
  	




      










      
            
           $a=$row['product_id'];
           
           
           
           $b=$row['product_title'];
           
           $c=$row['product_price'];

     

           $d=$row['product_image'];
           $e=$row['product_desc'];
           
             echo"
         
             <div class='col-sm-6 col-md-4 col-lg-3 mb-2'>
 
             <div class='card p-2 border-secondary mb-2'>
            <img src='product_images/$d'class='w-100 product'>
             <h4>$b</h4>
               <p><i>$e is R$c </i></p>
               <button type='button' pid='$a' class='addtocart'id='addtocartbutton'>&nbsp;&nbsp;Add to
               cart</button>
            </div>
      </div>
         
           ";
              }
     


}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padi's Kitchen Delight</title>
    <link rel="stylesheet" href="padiStyle.css">

    <link rel="stylesheet" href="bootstrap.min.css" />
    <script src="bootstrap.bundle.min.js"></script>
    <style>

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}


.search {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 25px;
}


.search input {
    width: 350px;
    padding: 12px;
    border: 2px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    transition: 0.3s ease-in-out;
}


.search input:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
}

.search button {
    padding: 12px 18px;
    margin-left: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: 0.3s ease-in-out;
}


.search button:hover {
    background-color: #0056b3;
}


.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin: 30px auto;
}


.card {
    width: 100%;
    max-width: 280px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
    text-align: center;
    padding: 15px;
    transition: 0.3s ease-in-out;
    background: #ffffff;
}

.card:hover {
    transform: translateY(-5px);
}


.card img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}


.card h4 {
    font-size: 1.3rem;
    color: #333;
    font-weight: bold;
    margin-top: 15px;
}


.card p {
    font-size: 1rem;
    color: #555;
}


button.addtocart {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 12px 15px;
    border-radius: 6px;
    font-size: 1rem;
    cursor: pointer;
    transition: 0.3s ease-in-out;
}

button.addtocart:hover {
    background-color: #218838;
}


p.no-products {
    text-align: center;
    font-size: 1.5rem;
    color: #dc3545;
    font-weight: bold;
    margin-top: 30px;
}


a[href="#top"] {
    display: block;
    text-align: center;
    margin-top: 30px;
    font-size: 1.2rem;
    color: #007bff;
    text-decoration: none;
}

a[href="#top"]:hover {
    color: #0056b3;
}


        </style>
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
</head>
<body>
<div id="cartMessage"></div> 


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

      <div class="search">

               <form name="newForm" action="toets.php" method="POST">
             
               <input type="text" name="nname">
             
   <small class="error d-block mb-3"><?php echo $error;?></small>
               <button type="submit"class="submit" name="submita" id="buttonn">Search</button>
  </form>
               </div>


 <div class="row mt-2 pb-3">
    <br>

                  
              </div>  <a href="#top">Top<i class="fa-solid fa-circle-up"></i></a>
              </div>
              </div>
              
</div>
              <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {



    
      


    $("body").delegate(".addtocart","click",function(event){
		var pid = $(this).attr("pid");

    
		event.preventDefault();

		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid},
			success : function(data){
				

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
		})
	})
});

function closeMessage() {
    $("#cartMessage").fadeOut(500, function() { $(this).html("").fadeIn(); });
}
  </script>

 <?php   include_once 'footer.php'  ?>
 <script src="bootstrap.bundle.min.js"></script>
  
</body>
</html>
