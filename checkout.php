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
         <form action="checkout" method="POST">
            <p> First Name <input type="text" name="first_name"></p>
            <p> Last Name <input type="text" name="last_name"></p>
            <p> Address <input type="text" name="address"></p>
            <input type="submit" value="Submit">
        </form>
       
    </body>
</html>