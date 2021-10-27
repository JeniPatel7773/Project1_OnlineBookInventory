<html>
    <head>
        <title>Book Store</title>
    </head>
    <body>
        <?php
            require('mysqli_connect.php');

            session_start();

            $product_id = $_GET['productid'];

            $q = "SELECT * FROM products WHERE product_id = '$product_id' ";
            $result = mysqli_query($dbc, $q) OR mysqli_error($dbc);

            $row = mysqli_fetch_array($result);

            $_SESSION['product_name'] = $row['product_name'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['price'] = $row['price'];
            $_SESSION['stock'] = $row['stock'];

            header("location: checkout.php")

        ?>
    </body>
</html>