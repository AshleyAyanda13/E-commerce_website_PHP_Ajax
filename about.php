<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

       
        .wrapper {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        
        h1.title {
            text-align: center;
            font-size: 28px;
            color: #D32F2F;
            margin-bottom: 20px;
        }

       
        .transbox {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        
        .transbox p {
            font-size: 18px;
            text-align: center;
        }

      
        .transbox p:last-child {
            font-weight: bold;
        }

        .homeIntro {
            margin-top: 30px;
        }

        #pageHeading h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .left img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .right {
            flex: 1;
            padding-left: 20px;
        }

        .right h2 {
            color: #D32F2F;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .right p {
            font-size: 16px;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            background-color: #D32F2F;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                text-align: center;
            }

            .right {
                padding-left: 0;
            }
        }
    </style>
</head>
<body>
    <?php include 'test 5.php';?>

    <div class="wrapper">
        <div class="transbox">
            <h1 class="title">About Us</h1>
        </div>

        <section class="homeIntro" id="aboutUs">
            
            <div class="container">
                <div class="content">
                    <div class="left">
                        <img src="images/weddingBack2.jpg" alt="Our Story">
                    </div>
                    <div class="right">
                        <h2>OUR STORY</h2>
                        <p>
                            Padi's Kitchen Delight was established in 2010. Our focus is on great food and 
                            immaculate service, coupled with our proven commercial ability. We boast a 100% 
                            client retention rate because we stay rooted in our motto: "To gain leadership 
                            through Quality Services."
                        </p>
                        <p>
                            We understand that every event is unique, which is why we tailor our menus to 
                            address the specific needs of each client. We start by discussing with our clients 
                            their specific needs. The information we gather, coupled with our extensive knowledge 
                            and experience, allows us to provide the desired service. Our innovative recipes 
                            and event planning styles complement the healthy, flavorful products tailored 
                            specifically to our clients' needs.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include 'footer.php';?>
</body>
</html>
