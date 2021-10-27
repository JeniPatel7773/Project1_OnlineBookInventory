USE bookstore;

-- insert data into products table
INSERT INTO products VALUES (null, "PHP 6.0", 10.0, 9);
INSERT INTO products VALUES (null, "Android Programming for Beginners", 13.0, 7);
INSERT INTO products VALUES (null, "Web Development and Design Foundations", 7.0, 11);
INSERT INTO products VALUES (null, "Photoshop CC", 5.0, 3);
INSERT INTO products VALUES (null, "MySQL", 8.0, 5);
INSERT INTO products VALUES (null, "Google Analytics", 4.0, 6);

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
INSERT INTO payment_method VALUES (null,"Paypal");

-- insert data into orders table
INSERT INTO orders VALUES (null, 4, 4, 2);
INSERT INTO orders VALUES (null, 2, 3, 4);
INSERT INTO orders VALUES (null, 1, 5, 1);
INSERT INTO orders VALUES (null, 3, 2, 3);
INSERT INTO orders VALUES (null, 6, 1, 1);