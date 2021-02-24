<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fatima's Pizzeria - order page</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "../CSS/place_order.css"> <!-- the ../ moves up a folder, then finds the css-->
    <script src = "script.js" defer></script>  <!--deferring means that JS will be downloaded, but it will not be executed until all the HTML and CSS have been loaded -->

</head>

<body>

<section class = "order_status">
        <hl class = "title">Order Status<h1> 

    <table>
        <tr>
            <th>Customer Name</th>
            <th>Order ID</th>
            <th>Status</th>
        </tr>

            <?php

                $sql = "SELECT * FROM customer INNER JOIN pizza_order ON customer.id = pizza_order.customer_id
                ORDER BY id DESC";

            if ($result = mysqli_query($conn, $sql))
            {
                $count = 0;
                while ($row = mysqli_fetch_row($result))
                {
                    if ($count != 8)
                    {
                        $count++;
                ?>
                    <tr>
                        <td class = "table_cell"><?php echo $row[2];?></td>
                        ($row[2]) -->
                        <td class = "table_cell"><?php echo '(' . $row[5] . ')';?></td>
                        [5]) -->

                        <?php
                            if ($row[11] == 1)
                            {
                        ?>        
                                <td class = "table_cell">
                                    <button id="statusBtn" style = "background-color: #05FF00;">Completed</button>
                                </td>
                            <?php
                            }
                            else
                            {
                            ?>
                                <td class  = "table_cell">
                                    <a href = 'update_fulfilled.php?id=<?php echo $row[5]?>'>
                                        <button id="statusBtn">In Progress</button>
                                    </a>
                                </td>
                            </tr>

                        <?php

                            }

                    }
                }
            }