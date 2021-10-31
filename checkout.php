<html>
    <head>
        <title>Book Store - checkout</title>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
                        echo "<script>alert('Order placed successfully')</script>";
                        
                    } else {
                        echo "<script>alert('Your order could not be posted.')</script>";
                        echo '<p>' . mysqli_stmt_error($stmt) . '</p>';
                    }

                 }
                 else{
                     echo "<script>alert('Error: All fields are required.')</script>";
                 }
             }
            
           

        ?>

        <!-- Wrapper -->
			<div id="wrapper">

                <!-- Header -->
                <header id="header">
                    <div class="inner">

                        <!-- Logo -->
                            <a href="index.php" class="logo">
                                    <span class="fa fa-book"></span> <span class="title">Online Book Store</span>
                                </a>

                        <!-- Nav -->
                            <nav>
                                <ul>
                                    <li><a href="#menu">Menu</a></li>
                                </ul>
                            </nav>

                    </div>
                </header>

                <!-- Menu -->
                <nav id="menu">
                    <h2>Menu</h2>
                    <ul>
                        <li><a href="index.php" >Home</a></li>

                        <li><a href="store.php">Store</a></li>

                        <li><a href="book_cart.php">Cart</a></li>

                    </ul>
                </nav>

                <!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Checkout</h1>

                            <h3>Enter Your Information</h3>

                            <form action="checkout.php" method="POST">

                                <label>First Name: <input type="text" name="first_name" value=<?php
                                    if(isset($_POST["first_name"])){
                                        echo $_POST["first_name"];
                                    }
                                ?>>
                                </label>
                                
                                <label>Last Name: <input type="text" name="last_name" value=<?php
                                    if(isset($_POST["last_name"])){
                                        echo $_POST["last_name"];
                                    }
                                ?>>
                                </label>

                                <label>Address: <input type="text" name="address" value=<?php
                                    if(isset($_POST["address"])){
                                        echo $_POST["address"];
                                    }
                                ?>>
                                </label>

                                <label>Payment: </label>
                                <p><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="radio1" value="1">
                                    <label class="form-check-label" for="radio1">Debit Card</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="radio2" value="2">
                                    <label class="form-check-label" for="radio2">Credit Card</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="radio3" value="3"/>
                                    <label class="form-check-label" for="radio3">Cash</label>
                                </div>
                                </p>

                                <label>Card Number: <input type="text" name="card_number" value=<?php
                                    if(isset($_POST["card_number"])){
                                        echo $_POST["card_number"];
                                    }
                                ?>>
                                </label>
                                
                    
                                <input type="submit" name="submit" value="Submit">
                            </form>
						</div>
                        <footer id="footer">
						<div class="inner">

							<ul class="copyright text-center">
								<li>Copyright © 2020 Book Store </li>
								<li><a href="mailto:jenipatel@gmail.com">jenipatel@gmail.com</a></li>
							</ul>
						</div>
					</footer>
					</div>

                    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>
       
    </body>
</html>
    
