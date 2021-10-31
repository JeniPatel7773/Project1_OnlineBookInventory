<html>
    <head>
        <title>Book Store - checkout</title>
    </head>
    <body>
        <?php
             require("mysqli_connect.php");
             session_start();
             if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
                 if(!empty($_REQUEST['first_name']) and !empty($_REQUEST['last_name']) and !empty($_REQUEST['address'])){
                     
                    $first_name = strip_tags($_POST['first_name']);
                    $last_name = strip_tags($_POST['last_name']);
                    $address = strip_tags($_POST['address']);
                    $payment = $_POST['payment'];

                    // insert into customer table
	                $q = 'INSERT INTO customers VALUES (null, ?, ?, ?)';
                    $stmt = mysqli_prepare($dbc, $q);
	                mysqli_stmt_bind_param($stmt, 'sss', $first_name, $last_name, $address);
                    mysqli_stmt_execute($stmt);

                    // Print a message based upon the result:
                    if (mysqli_stmt_affected_rows($stmt) == 1) {
                        echo '<p>Your message has been posted.</p>';
                    } else {
                        echo '<p style="font-weight: bold; color: #C00">Your message could not be posted.</p>';
                        echo '<p>' . mysqli_stmt_error($stmt) . '</p>';
                    }

                    mysqli_stmt_close($stmt);


                    //insert data into orders table (order_id, customer_id, payment_id)
                    $q = 'SELECT customer_id FROM customers WHERE first_name="' . $first_name . '" and last_name="' . $last_name . '";';
                    $result = mysqli_query($dbc, $q) OR mysqli_error($dbc);
                    $row = mysqli_fetch_array($result);
                    $customer_id = $row['customer_id'];
                    
                    $q = 'INSERT INTO orders VALUES (null, ?, ?)';
                    $stmt = mysqli_prepare($dbc, $q);
	                mysqli_stmt_bind_param($stmt, 'ii', $customer_id, $payment);
                    mysqli_stmt_execute($stmt);

                    mysqli_stmt_close($stmt);

                    //insert data into order_items table (item_id, order_id, product_id)
                    //update stock in products table
                    $q = 'SELECT order_id FROM orders WHERE customer_id="' . $customer_id . '" and payment_id="' . $payment . '";';
                    $result = mysqli_query($dbc, $q) OR mysqli_error($dbc);
                    $row = mysqli_fetch_array($result);
                    $order_id = $row['order_id'];

                    if(!empty($_SESSION['cart']))
                    {
                        foreach($_SESSION['cart'] as $keys=>$values)
                        {
                            $product_id = $values['product_id'];
                            $stock = $values['stock'];

                            $q = 'INSERT INTO order_items VALUES (null, ?, ?)';
                            $stmt = mysqli_prepare($dbc, $q);
                            mysqli_stmt_bind_param($stmt, 'ii', $order_id, $product_id);
                            mysqli_stmt_execute($stmt);

                            $q = 'UPDATE products SET stock=' . $stock - 1 . ' WHERE product_id=' . $product_id . ';';
                            $result = mysqli_query($dbc, $q) OR mysqli_error($dbc);

                        } 
                    }
                    // Print a message based upon the result:
                    if (mysqli_stmt_affected_rows($stmt) == 1) {
                        echo '<p>Your message has been posted.</p>';
                    } else {
                        echo '<p style="font-weight: bold; color: #C00">Your message could not be posted.</p>';
                        echo '<p>' . mysqli_stmt_error($stmt) . '</p>';
                    }

                 }
                 else{
                     echo "Error: All fields are required.<br><br>";
                 }
             }
            
           

        ?>

        <h2>Enter Your Information</h2>

         <form action="checkout.php" method="POST">
            <p><label>First Name: <input type="text" name="first_name" value=<?php
                if(isset($_POST["first_name"])){
                    echo $_POST["first_name"];
                }
            ?>>
            </label></p>
            
            <p><label>Last Name: <input type="text" name="last_name" value=<?php
                if(isset($_POST["last_name"])){
                    echo $_POST["last_name"];
                }
            ?>>
            </label></p>

            <p><label>Address: <input type="text" name="address" value=<?php
                if(isset($_POST["address"])){
                    echo $_POST["address"];
                }
            ?>>
            </label></p>

            <p><label>Payment: </label>
            <input type="radio" name="payment" value="1"/>Debit Card
            <input type="radio" name="payment" value="2"/>Credit Card
            <input type="radio" name="payment" value="3"/>Cash
            </p>
 
            <input type="submit" name="submit" value="Submit">
        </form>
       
    </body>
</html>
    
