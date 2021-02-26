<!DOCTYPE html>
<html lang = "en-US";>

<section class = "orderStatus">
    <h1 class = "title">Order Status</h1>

    <table>
        <tr>
            <th>Last Name</th>
            <th>Order ID</th>
            <th>Status</th>
        </tr>
    </table>
</section>
</html>

<?php

$order1ID = $_POST["order1"];
$order2ID = $_POST["order2"];
$order3ID = $_POST["order3"];
$order4ID = $_POST["order4"];
$order5ID = $_POST["order5"];
$order6ID = $_POST["order6"];
$order7ID = $_POST["order7"];
$order8ID = $_POST["order8"]; 

    include "connect.php";

    $cSql = "SELECT * FROM customer ORDER BY id DESC LIMIT 1";
    $cResult = $conn->query($cSql);
    $customerID_fk = $cResult->fetch_array()['id'] ?? '';
    $customerID_fk++;

    $pSql = "SELECT * FROM pizza ORDER BY id DESC LIMIT 1";
    $pResult = $conn->query($pSql);
    $pizzaID_fk = $pResult->fetch_array()['id'] ?? '';
    $pizzaID_fk++;

    $sql = "SELECT * FROM  customer INNER JOIN  pizza_order ON customer.id = pizza_order.customer_id
    ORDER BY id DESC";

    if ($result = mysqli_query($conn, $sql)) {
        $count = 0;
        while ($row = mysqli_fetch_row($result)) {
            if ($count != 8) {
                $count++;
            }
        }
    }
?>

<tr>
    <td class = "table_cell"><?php echo $row[2];?></td>

    <td class = "table_cell"><?php echo '(' . $row[5] . ')';?></td>

    <?php 
        if ($row[11] == 1) {

    ?>
        <td class = "table_cell">
            <button id = "statusBtn" style = "background-color: #05FF00;">Completed</button>
        </td>
        
    <?php
        }
        
        else {
    ?>
    
    <td class = "table_cell">
        <a href = 'update_fulfilled.php?id = <?php echo $row[5]?>'>

        <button id = "statusBtn">In Progress</button>
        </a>
    </td>
</tr>

<?php
            }
?>