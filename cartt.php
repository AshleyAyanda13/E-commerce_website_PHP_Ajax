

<?php  

session_start();

$uid = session_id();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <script src="cartbuild.js"> </script>
 

    <title>Products</title>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}


h1#cartheading {
    text-align: center;
    font-size: 2rem;
    color: #007bff;
    margin-top: 20px;
    font-weight: bold;
}


.caart {
    width: 90%;
    max-width: 1000px;
    margin: auto;
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    text-align: center;
}


h1#cartheadingg {
    font-size: 1.8rem;
    color: #dc3545;
    font-weight: bold;
    margin-top: 15px;
}


img#image {
    display: block;
    margin: 20px auto;
    width: 180px;
    height: auto;
    opacity: 0.8;
}

button {
    padding: 12px 18px;
    font-size: 1rem;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s ease-in-out;
}


button.update {
    background-color: #28a745;
    color: white;
}

button.update:hover {
    background-color: #218838;
}


button.remove {
    background-color: #dc3545;
    color: white;
}

button.remove:hover {
    background-color: #c82333;
}

	</style>

	
</head>
<?php 
include_once 'test 5.php';?>
<body>

 


<div class="modal fade" id="removemodal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Removed!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Product removed from the cart successfully! 🛒
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Success!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Cart updated successfully! 🛒
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>






   
<div class="caart"style="overflow-x: auto; max-width: 100%;">



    <?php 

$host="localhost";
$user="root";
$password="";
$db="ayandasecond";
$con=mysqli_connect($host,$user,$password,$db);
$sqlimage  = "SELECT * FROM cartt where userID='$uid'";

$imageresult1 = mysqli_query($con,$sqlimage);


$rowchecker=mysqli_num_rows($imageresult1);





if($rowchecker==0)
{

   echo "<style>
   .caart{
   height:400px;
   
border-radius:2%;


   }
   
   
   </style>";
    echo "<h1 id='cartheadingg'>The Cart is empty.</h1>";
   echo "<br>";
    echo "<img src='emptycart.gif' id='image' height='200px' width='200px'>";

}


else


{
  



	


echo "



<div id='ccart' </div>
";
}
	?>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() 
  
  
  {
    checkOutDetails();
	function checkOutDetails(){
		$('#cart').show();
		   $.ajax({
			   url : "action.php",
			   method : "POST",
			   data : {Common:1},
			   success : function(data){
				
				   $("#ccart").html(data);
					  
			   }
		   })
	   }



    $("body").delegate(".update","click",function(event){
		var update = $(this).parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();

		var price = update.find(".price").val();




if (qty==0)
{
  alert("Quantity cannot be 0!")
}


		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{updateCartItem:1,update_id:update_id,qty:qty,price:price},
			success	:	function(data){
				$("#cart_msg").html(data);
       
				checkOutDetails();
				  $("#updatemodal").modal("show"); // Show success popup
			}
		})


	})

  $("body").delegate(".remove","click",function(event){
		var update = $(this).parent().parent();
		var update_id = update.find(".update").attr("update_id");




if(confirm("Are you sure you want to remove this item?")) {
			$("#removemodal").modal("show"); // Show success popup
		} else {
			return false; // Cancel the action if user clicks "Cancel"
		}
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{delete:1,update_id:update_id},
			success	:	function(data){
		
   
				checkOutDetails();
				
				   location.reload();
			}
		})

	
	})

  });
</script>
</div>
<?php   include_once 'footer.php'  ?>
</body>
</html>