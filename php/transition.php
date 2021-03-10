<?php
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fatima's Pizzeria - transitional page</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "../css/transitionpage_styles.css"> <!-- the ../ moves up a folder, then finds the css-->
    <script src = "script.js" defer></script>  <!--deferring means that JS will be downloaded, but it will not be executed until all the HTML and CSS have been loaded -->

    <link rel = "stylesheet" href = "../css/transitionpage_styles.css">
</head>

<body>
<section class = "transition_page">
    <h1 class = "title">Choose Task</h1>
    <table>
         <tr>
            <th>Place Order</th>
            <th>Order Status</th>
            <th>Generate Report</th>

    <?php
        
    ?>

<h1>Choose Task</h1>

    <!--buttons on the page-->
    <a class="btn placeOrder_btn" href="place_order.html">Place Order</a>    

    <a class="btn generic_btn" href="order_status.html">Check Order Status</a>    

    <a class="btn generic_btn" href="generate_report.html">Generate Report</a>    

    <a class="btn generic_btn" style = "background: #DE9E37" href="index.html">Sign Out</a>   <!--added a inline style bc this button was the only one that needed that specific color-->
    </a>
   
</body> 

</html>