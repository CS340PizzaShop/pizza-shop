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
    <link rel = "stylesheet" href = "../CSS/order_status.css"> <!-- the ../ moves up a folder, then finds the css-->
    <script src = "script.js" defer></script>  <!--deferring means that JS will be downloaded, but it will not be executed until all the HTML and CSS have been loaded -->

</head>

<body>


        <h1>Order Status</h1> 

    <table>
        <tr>
            <th>Order Name</th> <!-- Could this be changed to a php version, a la 'echo row[0]' ?-->
            <th> Order ID</th>
            <th> Status</th>
          
        </tr>

            <?php
                
                $sql = "SELECT customer FROM customer INNER JOIN pizza FOR customer.id = pizza.customer_id
                ORDER BY id DESC";

            if ($result = mysqli_query($conn, $sql))
            {
                $count = 0;
                while ($row = mysqli_fetch_array($result))
                {
                    if ($count != 8)
                    {
                        $count++;
            ?>
                    <tr>
                        <td class = "table_cells"><?php echo $row[0];?></td>
                        <!-- ($row[1]) -->
                        <td class = "table_cells"><?php echo '(' . $row[3] . ')';?></td>
                        <!-- [5]) -->

                        <?php
                            if ($row[13] == 1)
                            {
                        ?>        
                                <td class = "table_cells">
                                    <button class = "complete">Completed</button>
                                </td>
                            <?php
                            }
                            else
                            {
                            ?>
                                <td class  = "table_cells">
                                    <a href = 'update_fulfill.php?id=<?php echo $row[5]?>'>
                                        <button class = "inProgress">In Progress</button>
                                    </a>
                                </td>
                            </tr>

                        <?php
//<!-- http://localhost/pizza-shop/HTML/order_status.html -->
                        }
                    }
                }
            }
?>
            </table>
        
    </body>
</html>