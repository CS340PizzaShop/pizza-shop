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

                $sql = "SELECT customer FROM customer INNER JOIN pizza FOR customer.id = pizza.customer_id
                ORDER BY id ASC";

            if ($result = mysqli_query($conn, $sql))
            {
                $count = 1;
                while ($row = mysqli_fetch_array($result))
                {
                    if ($count != 8)
                    {
                        $count++;
                ?>
                    <tr>
                        <td class = "table_cells"><?php echo $row[0];?></td>
                        ($row[1]) -->
                        <td class = "table_cells"><?php echo '(' . $row[3] . ')';?></td>
                        [5]) -->

                        <?php
                            if ($row[13] == 1)
                            {
                        ?>        
                                <td class = "table_cells">
                                    <button id="btn" style = "color: #05AA00;">Completed</button>
                                </td>
                            <?php
                            }
                            else
                            {
                            ?>
                                <td class  = "table_cells">
                                    <a href = 'update_fulfill.php?id=<?php echo $row[9]?>'>
                                        <button id="btn">In Progress</button>
                                    </a>
                                </td>
                            </tr>

                        <?php

                            }

                    }
                }
            }