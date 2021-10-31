<html>
    <head>
    <head>
        <title>BookStore - Cart</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    </head>
    <body>
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
                    <li><a href="index.php">Home</a></li>

                    <li><a href="store.php" class="active">Store</a></li>

                    <li><a href="book_cart.php">Cart</a></li>
                    
                </ul>
            </nav>
            <!-- Main -->
            <div id="main">

            <div class="image main">
                <img src="images/banner-image-6-1920x500.jpg" class="img-fluid" alt="" />
            </div>
        <?php
        session_start();

            if(isset($_GET['action']))
            {
                if($_GET["action"] == 'delete')
                {
                    foreach($_SESSION['cart'] as $keys => $values){
                        if($values['product_id'] == $_GET['id'])
                        {
                            unset($_SESSION['cart'][$keys]);
                            header('location:book_cart.php');
                        }
                    }
                }
            }

        ?>
        <h1 class="text-center">Your Cart</h1>
        <div>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Book Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php
                    //session_start();
                    if(!empty($_SESSION['cart']))
                    {
                        $total = 0;
                        $i = 1;
                        foreach($_SESSION['cart'] as $keys=>$values)
                        {
                            echo "<tr>";
                            echo "<td> " . $i . "</td>";
                            echo "<td>" . $values['product_name'] . "</td>";
                            echo "<td>" . $values['price'] . "</td>";
                            echo "<td><a href='book_cart.php?action=delete&id=" . $values['product_id'] . "'>Remove</a></td>";
                            echo "</tr>";

                            $total = $total + $values['price'];
                            $i++;
                        }

                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td><b>Total</b></td>";
                        echo "<td><b>$" . number_format($total, 2) . "</b></td><td></td>";
                        echo "</tr>";

                    }
                ?>
                
            </table>

            <div class="text-center">
            <a href='store.php' style='text-decoration: none'><input type="submit" name="continue_shopping" value="Continue Shopping"></a>
            <a href='checkout.php'><input type="submit" name="checkout" value="Checkout"></a>
                </div>
                <br>
                <br>

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

    
