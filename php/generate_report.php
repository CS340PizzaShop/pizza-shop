<?php
include "connect php";

$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$allDate = $_POST["allDate"];
$orderType = $_POST["orderType"];
?>

<!DOCTYPE html>
<html lang ="en-US">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fatima's Pizzeria - Generate report</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "../css/generate_report.css"> <!-- the ../ moves up a folder, then finds the css-->
    <script src = "script.js" defer></script>  <!--deferring means that JS will be downloaded, but it will not be executed until all the HTML and CSS have been loaded -->

</head>

<body>
    <section class = "orderTypes">
        <p> Enter Order: </p>

        <table>

        <tr>
            <th> Order Type </th>
            <th> Date </th> 

</tr>

<?php

$query1 = "INSERT INTO generate_Report (startDate, endDate, allDates, orderType) VALUES ('$startDate', '$endDate', '$allDate', '$orderType');

if($mysqli_$query($conn, $query1)) 
{
    echo "<script type = 'text/javascript'> alert ('Success') </script>"; 
}

else 

{
    echo "<script type = 'text/javascript'> alert ('Fail') </script>";
}

<?php

    $sql = "SELECT * FROM generate_Report  INNER JOIN pizza_order ON customer.id = pizza_order.customer_id
    ORDER BY id DESC";

    if ($result = mysqli_query($conn, $sql))
    {
    $count = 0;
    }

    while ($row = mysqli_fetch_row($result))
    {
    if ($count != 8)
        $count++;
    
    }
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



