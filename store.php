<html>
    <head>
        <title>Book Store - store</title>
    </head>
    <body>
        <?php
            require('mysqli_connect.php');

            

            $q = "SELECT * FROM products";
            $result = mysqli_query($dbc, $q) OR mysqli_error($dbc);

            echo "<ul>";
            while($row = mysqli_fetch_array($result)) {

                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $image = $row['image'];
                $price = $row['price'];
                $stock = $row['stock'];

                echo "<div>";
                    echo "<p><b> Product " . $product_id . "</b></p>";
                    echo "<p>Product Name: " . $product_name . "</p>";
                    echo "<p><img src='data:image/jpeg;base64 ,". base64_encode( $image ) ." 'width='330' height='420'></p>";
                    echo "<p>Price: ". $price . "</p>";
                    echo "<p>Stock: ". $stock . "</p>";
                
                echo "<form method='POST' action='product_order.php?productid= " . $product_id . "'>";
                    echo "<input type='hidden' name='hidden_name' value='" . $product_name . "'>";
                    echo "<input type='hidden' name='hidden_price' value='" . $price . "'>";
                    echo "<input type='hidden' name='hidden_stock' value='" . $stock . "'>";
                    echo "<input type='submit' name='add-to-cart' value='Add To Cart'>";
                echo "</form>";
                echo "</div><hr>";
            }
            echo "</ul>";

        ?>
    </body>
</html>