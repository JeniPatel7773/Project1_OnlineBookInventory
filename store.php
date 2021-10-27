<html>
    <head>
        <title>Book Store - store</title>
    </head>
    <body>
        <?php
            require('mysqli_connect.php');

            //session_start();

            $q = "SELECT * FROM products";
            $result = mysqli_query($dbc, $q) OR mysqli_error($dbc);

            echo "<ul>";
            while($row = mysqli_fetch_array($result)) {

                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $image = $row['image'];
                $price = $row['price'];
                $stock = $row['stock'];

                echo "<a href='product_order.php?productid= " . $product_id . "' style='text-decoration: none'><div>";
                echo "<p><b> Product " . $product_id . "</b></p>";
                echo "<p>Product Name: " . $product_name . "</p>";
                echo "<p><img src='data:image/jpeg;base64 ,". base64_encode( $image ) ." 'width='330' height='420'></p>";
                echo "<p>Price: ". $price . "</p>";
                echo "<p>Stock: ". $stock . "</p>";
                echo "</div>";
                echo "</a><hr>";
            }
            echo "</ul>";

        ?>
    </body>
</html>