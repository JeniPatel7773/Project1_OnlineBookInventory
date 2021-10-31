<html>
    <head>
        <title>BookStore - store</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
                <h1 class="text-center">Products</h1>
						<div class="services">
							<div class="container">
							    <div class="row">
                                <?php
                                        require('mysqli_connect.php');

                                        

                                        $q = "SELECT * FROM products WHERE stock > 0";
                                        $result = mysqli_query($dbc, $q) OR mysqli_error($dbc);

                                        
                                        while($row = mysqli_fetch_array($result)) {

                                            $product_id = $row['product_id'];
                                            $product_name = $row['product_name'];
                                            $image = $row['image'];
                                            $price = $row['price'];
                                            $stock = $row['stock'];

                                            echo "<div class='col-md-4'>";
                                                echo " <div class='service-item'>";
                                                    echo "<img src='data:image/jpeg;base64 ,". base64_encode( $image ) ." 'width='330' height='420'>";
                                                    echo "<div class='down-content'>";
                                                    //echo "<p><b> Product " . $product_id . "</b></p>";
                                                        echo "<h4>" . $product_name . "</h4>";
                                                        echo "<div style='margin-bottom:10px;'>";
                                                        echo "<span>";
                                                            echo "<b>Price:</b>  $". $price ;
                                                        echo "</span><br>";
                                                        echo "<span>";
                                                            echo "<b>Quantity:</b>  " . $stock ;
                                                        echo "</span>";
                                                    echo "</div>";

                                                    echo "<form method='POST' action='product_order.php?productid= " . $product_id . "'>";
                                                    echo "<input type='hidden' name='hidden_name' value='" . $product_name . "'>";
                                                    echo "<input type='hidden' name='hidden_price' value='" . $price . "'>";
                                                    echo "<input type='hidden' name='hidden_stock' value='" . $stock . "'>";
                                                    echo "<input type='submit' name='add-to-cart' value='Add To Cart'>";
                                                    echo "</form>";
                                                    
                                                echo "</div>";
                                            echo "</div><br></div>"; 
                                        }

                                    ?>
					  
								    
							</div>
						</div>
							
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