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
    <link rel = "stylesheet" href = "../css/order_status.css"> <!-- the ../ moves up a folder, then finds the css-->
    <script src = "script.js" defer></script>  <!--deferring means that JS will be downloaded, but it will not be executed until all the HTML and CSS have been loaded -->

</head>

<body>

    <h1>Order Status</h1> 

    <table>
        <tr>
            <th>Order Name </th> <!-- Could this be changed to a php version, a la 'echo row[0]' ?-->
            <th>Order ID </th>
            <th>Status </th>

        </tr>


            <?php
                
                $sql = "SELECT * FROM customer INNER JOIN customer.id ON customer.LAST_NAME ORDER BY id DESC";

              $host = "localhost";
              $dbusername = "root";
              $dbpassword = "";
              $dbname = "pizzeriadb";
              
              $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
              
              if ($result = mysqli_query($conn, $sql))
              echo "Success";
              else
              echo "Not Success";

            /*  Current Problem(s): 
                Table will not display.

                Possible Cause(s):
                '$result' does not function properly.
                '$conn' does not function proprely.
                '$sql' does not contain the correct values.
                pizzeriadb is not seet up properly.    
            */



            if ($result = $conn->query($sql))
            {
                $count = 0;

                while ($row = mysqli_fetch_array($result)) {

                while ($row = mysqli_fetch_row($result))

                {
                    if ($count != 8)
                    {
                        $count++;
            ?>
                    <tr>
                        <td class = "table_cells"><?php echo $row[0];?></td>

                        <td class = "table_cells"><?php echo '(' . $row[1] .')';?></td>
                        

                        <?php
                            if ($row[11] == 1)
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
//<!-- http://localhost/pizza-shop/php/order_status.php -->
                        }
                    }
                }
            }
        }
            ?>
    </table>
</body>
</html>