<html>
    <head>
        <title>Book Store - Cart</title>
    </head>
    <body>
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
        <h1>Your Cart</h1>
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
                        echo "<td>Total</td>";
                        echo "<td>$" . number_format($total, 2) . "</td><td></td>";
                        echo "</tr>";

                    }
                ?>
                
            </table>

            
            <a href='store.php'><input type="submit" name="continue_shopping" value="Continue Shopping"></a>
            <a href='checkout.php'><input type="submit" name="checkout" value="Checkout"></a>
        </div>
    </body>
</html>

    
