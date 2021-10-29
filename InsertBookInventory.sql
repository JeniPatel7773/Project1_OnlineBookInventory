USE bookstore;

-- insert data into products table
INSERT INTO products VALUES (null, "PHP 6.0", LOAD_FILE('C:/xampp/htdocs/php/JeniPatel_Project1/images/php.jpg'), 10.0, 9);
INSERT INTO products VALUES (null, "Android Programming for Beginners",LOAD_FILE('C:/xampp/htdocs/php/JeniPatel_Project1/images/android.jpg'), 13.0, 7);
INSERT INTO products VALUES (null, "Web Development and Design Foundations",LOAD_FILE('C:/xampp/htdocs/php/JeniPatel_Project1/images/web.jpg'), 7.0, 11);
INSERT INTO products VALUES (null, "Photoshop CC", LOAD_FILE('C:/xampp/htdocs/php/JeniPatel_Project1/images/photoshop.jpg'),5.0, 3);
INSERT INTO products VALUES (null, "MySQL", LOAD_FILE('C:/xampp/htdocs/php/JeniPatel_Project1/images/MySQL.jpg'), 8.0, 5);
INSERT INTO products VALUES (null, "Google Analytics", LOAD_FILE('C:/xampp/htdocs/php/JeniPatel_Project1/images/google_analytics.jpg'), 4.0, 6);


-- insert data into customers table
INSERT INTO customers VALUES (null, "Alex", "Smith", "Simcoe ON");
INSERT INTO customers VALUES (null, "John", "Wilsion", "Kitchener ON");
INSERT INTO customers VALUES (null, "Kery", "Kapoor", "Windsor ON");
INSERT INTO customers VALUES (null, "David", "Scott", "Haliflex NV");
INSERT INTO customers VALUES (null, "Stacey", "Porter", "Toronto ON");

-- insert data into payment_method table 
INSERT INTO payment_method VALUES (null,"Debit");
INSERT INTO payment_method VALUES (null,"Credit");
INSERT INTO payment_method VALUES (null,"Cash");

-- insert data into orders table
INSERT INTO orders VALUES (null, 4, 2);
INSERT INTO orders VALUES (null, 3, 2);
INSERT INTO orders VALUES (null, 5, 1);
INSERT INTO orders VALUES (null, 2, 3);
INSERT INTO orders VALUES (null, 1, 1);

-- insert data into order_items table
INSERT INTO order_items VALUES (null, 1, 2);
INSERT INTO order_items VALUES (null, 1, 4);
INSERT INTO order_items VALUES (null, 2, 1);
INSERT INTO order_items VALUES (null, 3, 5);
INSERT INTO order_items VALUES (null, 4, 6);
INSERT INTO order_items VALUES (null, 5, 3);