<html>
    <head>
        <title>Book Store</title>
    </head>
    <body>
        <?php
            require('mysqli_connect.php');

            session_start();

            if(isset($_POST['add-to-cart'])){

                if(isset($_SESSION['cart'])){

                    $book_cart_id = array_column($_SESSION['cart'], 'product_id');
                    if(!in_array($_GET['productid'], $book_cart_id)){

                        $count = count($_SESSION['cart']);

                        $book_cart = array(
                            'product_id' => $_GET['productid'],
                            'product_name' => $_POST['hidden_name'],
                            'price' => $_POST['hidden_price'],
                            'stock' => $_POST['hidden_stock']
                        );

                        $_SESSION['cart'][$count] = $book_cart;
    
                    }
                    else {
                        echo " <p>Item already added!</p>";
                        header('location:store.php');
                    }

                }
                else{
                    $book_cart = array(
                        'product_id' => $_GET['productid'],
                        'product_name' => $_POST['hidden_name'],
                        'price' => $_POST['hidden_price'],
                        'stock' => $_POST['hidden_stock']
                    );

                    $_SESSION['cart'][0] = $book_cart;
                    
                }
            }

            

            header("location: book_cart.php")

        ?>
    </body>
</html>
    
