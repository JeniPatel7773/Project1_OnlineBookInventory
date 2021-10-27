<html>
    <head>
        <title>Book Store - checkout</title>
    </head>
    <body>
        <?php
            require('mysqli_connect.php');

            session_start();
            $product_name = $_SESSION['product_name'];
            echo $product_name;

        ?>

       
    </body>
</html>