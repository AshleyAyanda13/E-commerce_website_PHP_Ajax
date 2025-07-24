<?php


?>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>
      localStorage.removeItem("orderReviewData");

    </script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-2">
    <div class="container">
        <a href="home.php">
            <img class="logoImg" src="images/logo.png" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="onshowtest.php">Shop</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="about.php">About</a></li>
                
                <?php

    if(isset($_SESSION['username']))
    {
           echo' <li class="nav-item"><a class="nav-link text-white" href="signedin.php">Account</a></li>';
    }else{
       echo '    <li class="nav-item"><a class="nav-link text-white" href="login.php">Account</a></li>';




    }
    if(isset($_SESSION['username']))
    {
           echo' <li class="nav-item"><a class="nav-link text-white" href="Orders.php">Orders</a></li>';
    }else{
       echo '    <li class="nav-item"><a class="nav-link text-white" href="Orders.php">Orders</a></li>';




    }




                ?>
    
                <li class="nav-item"><a class="nav-link text-white" href="cartt.php">Cart</a></li>
            </ul>
        </div>
    </div>
</nav>

<style>
.logoImg {
    max-height: 50px;
    width: auto;
}
</style>
