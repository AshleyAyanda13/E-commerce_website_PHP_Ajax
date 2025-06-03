<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padi's Kitchen Delight</title>
    <link rel="stylesheet" href="padiStyle.css">
<style>
    .pkgOptionImg img {
    height: 200px; 
    object-fit: cover; 
    width: 100%; 
}
    </style>
</head>
<body>
    <?php include_once 'test 5.php'; ?>

   

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Mobile Menu Fix
            const hamburger = document.querySelector(".hamburger");
            const navMenu = document.querySelector(".navMenu");

            if (hamburger && navMenu) {
                hamburger.addEventListener("click", function () {
                    hamburger.classList.toggle("active");
                    navMenu.classList.toggle("active");
                });
            }

            // Sticky Header on Scroll
            const header = document.querySelector("header");
            if (header) {
                window.addEventListener("scroll", function () {
                    header.classList.toggle("sticky", window.scrollY > 0);
                });
            }

            // Counter Animation on Scroll
            const counters = document.querySelectorAll(".counter");

            const slowCounter = (counter) => {
                let count = 0;
                const target = +counter.getAttribute("data-target");
                const step = Math.ceil(target / 200); 

                const interval = setInterval(() => {
                    count += step;
                    counter.innerText = count;

                    if (count >= target) {
                        counter.innerText = target; 
                        clearInterval(interval);
                    }
                }, 100); 
            };

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        slowCounter(entry.target);
                        observer.unobserve(entry.target); 
                    }
                });
            }, { threshold: 0.5 }); 

            counters.forEach(counter => {
                observer.observe(counter);
            });
        });
    </script>
<div class="container">
    <section class="homeMainSect">
        <div class="homeDetails">
            <p>One of the best food services</p>
            <h1>FOOD CATERING</h1>
            <div class="homeMainDesc">
                <p>Delicious meals prepared with love, perfect for any occasion!</p>
            </div>
            <a href="onshowtest.php">
                <button type="submit" class="Orderbtn">Order Now</button>
            </a>
        </div>
    </section>

    <section class="homeIntro"> 
        <div class="container"> 
            <div class="content">
                <div class="left">
                    <img src="images/homeIntro.jpg" alt="Chef preparing food">
                </div>
                <div class="right">
                    <div class="heading">
                        <h4>What we do</h4>
                        <h1>WE'LL MAKE SURE YOUR EVENT IS PERFECT</h1>
                    </div>
                    <p>From weddings to corporate events, we cater with elegance and excellence.</p>
                </div>
            </div> 
        </div>
    </section>

    <section class="ourServices">
        <div class="container">
            <div class="heading">
                <h4>Our tasty offers</h4>
                <h1>OUR SERVICES</h1>
            </div>
            <div class="content">
                <div>
                    <img class="image" src="images/starters.jpeg" alt="Assorted Starters">
                    <h4>STARTERS SELECTION</h4>
               
                </div>
                <div>
                    <img class="image" src="images/main.jfif" alt="Main Course Meals">
                    <h4>MAIN COURSES</h4>
                    
                </div>
                <div>
                    <img class="image" src="images/dessert.jfif" alt="Desserts">
                    <h4>DESSERTS</h4>
                   
                </div>
            </div>
        </div>
    </section>

    <section class="figures" id="sectionCounter">
        <div class="content">
            <div class="happyCustomers">
                <img src="images/account.png" alt="Happy Clients Icon">
                <div>
                    <p>Happy Clients</p>
                    <p class="counter" data-target="100">0</p>
                </div>
            </div>
            <div class="businessYears">
                <img src="images/account.png" alt="Business Years Icon">
                <div>
                    <p>Years in Business</p>
                    <div class="plus">
                        <p class="counter" data-target="10">0</p><span>+</span>
                    </div>
                </div>
            </div>
        </div>     
    </section>

    <section class="specialOccasion">
        <div class="container">
            <div class="heading">
                <h4>Celebrate with class</h4>
                <h1>SPECIAL OCCASIONS</h1>
            </div>
            <div class="container">
  <div class="row">
    <div class="col-sm">
          <div class="packageOption">
             <div class="pkgOptionHeading text-center">
                        <h4>Parties</h4>
                    </div>
                    <div class="pkgOptionImg">
                        <img src="images/pexels-cottonbro-3171736.jpg" alt="Party Catering">
                    </div>            
                   
                </div>
    </div>
    <div class="col-sm">
       <div class="packageOption">
         <div class="pkgOptionHeading text-center">
                        <h4>Weddings</h4>
                    </div>
                    <div class="pkgOptionImg">
                        <img src="images/wedding.jpeg" alt="Wedding Catering">
                    </div>            
                   
                </div>
    </div>
    <div class="col-sm">
             <div class="packageOption">
                <div class="pkgOptionHeading text-center">
                        <h4>Picnics</h4>
                    </div>
                    <div class="pkgOptionImg">
                        <img src="images/picnic.jpeg" alt="Party Catering">
                    </div>            
                    
                </div>
    </div>
     <div class="col-sm">
               <div class="packageOption">
                <div class="pkgOptionHeading text-center">
                        <h4>Conferences</h4>
                    </div>
                    <div class="pkgOptionImg">
                        <img src="images/R.jpeg" alt="Picnic Catering">
                    </div>
                    
                </div>
    </div>
  </div>
</div>
       
    </section>
   
    <?php include_once 'footer.php'; ?>
</body>
</html>
