<?php

$customer_fname = $_POST['customer_fname'];
$customer_lname = $_POST['customer_lname'];
$customer_address = $_POST['customer_address'];
$customer_zip = $_POST['customer_zip'];
$customer_quantity = $_POST['customer_quantity'];
$customer_date = $_POST['customer_date'];

if (isset($_POST['orderType']))
{
    $orderType = $_POST['orderType'];
}

if (isset($_POST['toppingType']))
{
    $toppingType = $_POST['toppingType'];
}

if (!empty($customer_fname)) {
    if (!empty($customer_lname)) {
        if (!empty($customer_address)) {
            if (!empty($customer_zip)) {
                if (!empty($customer_quantity)) {
                    if (!empty($customer_date)) {

                        include "connect.php";

                        $cSQL = "SELECT * FROM customer ORDER BY id DESC LIMIT 1";
                        $cResult = $conn->query($cSQL);
                        $customerID_fk = $cResult->fetch_array()['id'] ?? '';
                        $customerID_fk++;

                        $pSQL = "SELECT * FROM pizza ORDER BY id DESC LIMIT 1";
                        $pResult = $conn->query($pSQL);
                        $pizzaID_fk = $pResult->fetch_array()['id'] ?? '';
                        $pizzaID_fk++;

                        $query1 = "INSERT INTO customer (First_Name, Last_Name, Address, ZIP) VALUES ('$customer_fname', '$customer_lname', '$customer_address', '$customer_zip')";
                        $query2 = "INSERT INTO pizza (topping_type) VALUES ('$toppingType')";
                        $query3 = "INSERT INTO pizza_order (order_type, customer_id, pizza_id, order_date, quantity) VALUES ('$orderType', '$customerID_fk', '$pizzaID_fk', '$customer_date', '$customer_quantity')";

                        if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2) && mysqli_query($conn, $query3))
                        {
                            echo "<script type = 'text/javascript'>alert('Success'); </script>";
                            echo $pizzaID_fk;
                        }

                        else
                        {
                            echo "<script type = 'text/javascript'>alert('Failure'); </script>";
                        }
                        mysqli_close($conn);
                        header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/transition_page.html');
                    }
                    else {
                        echo "<script type = 'text/javascript'>alert('date cannot be empty'); </script>";
                        header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/place_order.html');
                        die();
                    }
                }
                else {
                    echo "<script type = 'text/javascript'>alert('quantity cannot be empty'); </script>";
                    header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/place_order.html');
                    die();
                }
            }
            else {
                echo "<script type = 'text/javascript'>alert('ZIP cannot be empty'); </script>";
                header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/place_order.html');
                die();
            }
        }
        else {
            echo "<script type = 'text/javascript'>alert('Address cannot be empty'); </script>";
            header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/place_order.html');
            die();
        }
    }
    else {
        echo "<script type = 'text/javascript'>alert('Last Name cannot be empty'); </script>";
        header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/place_order.html');
        die();
    }
}
 else {
     echo "<script type = 'text/javascript'>alert('First Name cannot be empty'); </script>";
     header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/place_order.html');
     die();
 }
?>