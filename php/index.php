<?php

// input validation function for the form data put in by the user
function test_input($data) {
    $data = trim($data);                //  strip whitespace from beginning and end
    $data = stripslashes($data);        //  unquotes a quoted string
    $data = htmlspecialchars($data);    //  converts special characters to HTML entities, thereby breaking their purpose if used maliciously
    return $data;
}

//  assign these vars the input from the appropriate input boxes on the index.html page (the "name" in the tag)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
}

if (!empty($username)){
    if (!empty($password))
    {

        include "connect.php"; // use the database connection file.

        $managerSql = "SELECT username, password FROM loginform WHERE id = '1';";    // gets the manager row (its id = 1) in the loginform table
                $managerResult = $conn->query($managerSql);
                $row = $managerResult->fetch_array(MYSQLI_ASSOC);           //fetches an array of the contents on the manager row that can be accessed by association?
                $managerUsername = $row['username'];        //  gets the cell in the username column in the manager row
                $managerPassword = $row['password'];     // gets the cell in the password column in the manager row


        $employeeSql = "SELECT username, password FROM loginform WHERE id = '2';";    // gets the employee row (its id = 2) in the loginform table
                $employeeResult = $conn->query($employeeSql);
                $row = $employeeResult->fetch_array(MYSQLI_ASSOC);           //fetches an array of the contents on the employee row that can be accessed by association?
                $employeeUsername = $row['username'];        //  gets the cell in the username column in the employee row
                $employeePassword = $row['password'];     // gets the cell in the password column in the employee row



        //  if the username entered by the user matches the manager username and password in the database...
        if($username == $managerUsername && $password == $managerPassword)
        {
            $enteredUsername = $username;
            $enteredPassword = $password; 
            header("Location: http://localhost/pizza-shop/HTML/transition_page.html"); //  redirects to the "choose task" page that HAS generate report section
        }
        else if($username == $employeeUsername && $password == $employeePassword)
        {
            $enteredUsername = $username;
            $enteredPassword = $password;
            header("Location: http://localhost/pizza-shop/HTML/employee_transition_page.html"); //  redirects to the "choose task" page that DOESN'T have generate report section
        }

        //  if query insertion is failure
        else
        {
            echo "<script type = 'text/javascript'>alert('Not Valid Sign-in!'); </script>";    // display alert message over page
            header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/index.html'); //  redirects to the same login page to try again after .1 second(so it can show the failure message)
        }
        mysqli_close($conn);

    }
    else{
        echo "<script type = 'text/javascript'>alert('Password cannot be empty'); </script>"; // display alert message over page
        header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/index.html'); //  redirects to the same login page to try again after .1 second(so it can show the failure message)
        die();
    }

}
else{
    echo "<script type = 'text/javascript'>alert('Username cannot be empty'); </script>";
    header('Refresh: .1; URL=http://localhost/pizza-shop/HTML/index.html'); //  redirects to the same login page to try again after .1 second(so it can show the failure message)    
    die();
}
?>