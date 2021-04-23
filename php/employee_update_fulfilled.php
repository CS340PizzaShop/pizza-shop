<?php

    include "connect.php";

    if(isset($_GET['id']))
    {
        $order_id = $_GET['id'];
        echo $order_id;

        $sql = "UPDATE pizza_order SET fulfilled='1' WHERE order_id='$order_id'";
        if(mysqli_query($conn, $sql))
        {
            header('Refresh: .1; URL=http://localhost/pizza-shop/php/employee_order_status.php');
        }
        else
        {
            echo "<script type = 'text/javascript'>alert('the fulfilled value wasnt changed'); </script>";
            header('Refresh: .1; URL=http://localhost/pizza-shop/php/employee_order_status.php');
            die();
        }
    }
    else
    {
        echo "failed isset";
        header('Refresh: .1; URL=http://localhost/pizza-shop/php/employee_order_status.php');
    }