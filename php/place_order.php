<?php

$customer_name = $_POST['customer_name'];
$customer_address = $_POST['customer_address'];

if (isset($_POST['dropdown']))
{
    $dropdown = $_POST['dropdown'];
}

if (isset($_POST['dropdown2']))
{
    $dropdown2 = $_POST['dropdown2'];
}

if (!empty($customer_name)) {
    if (!empty($customer_address)) {

        include "connect.php";

        $cSQL = "SELECT FROM customer_name ORDER BY id ASC  1";
        $cresult = $conn->query($cSQL);
        $customerID_fk = $cResult->fetch_array()['id'] ?? '';

        $pSQL = "SELECT FROM pizza_order ORDER BY id ASC  1";
        $presult = $conn->query($pSQL);
        $pizzaID_fk = $pResult->fetch_array()['id'] ?? '';
        
        if (mysqli_query($conn, $query1))
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
    else
    {
        echo "<script type = 'text/javascript'>alert('Customer Address cannot be empty.'); </script>";
        header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/place_order.html');
        die();
    }
    else // parse error that needs to be fixed
    {
        echo = "<script type = 'text/javascript'>alert('Customer Name cannot be empty.'); </script>";
        header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/place_order.html');
        die();
    }
}
?>