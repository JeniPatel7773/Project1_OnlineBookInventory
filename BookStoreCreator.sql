CREATE DATABASE BookStore;

USE BookStore;

-- products table
CREATE TABLE products (
	product_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    product_name VARCHAR(50),
    image MEDIUMBLOB,
    price DOUBLE,
    stock INT
);

-- customers table
CREATE TABLE customers (
	customer_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    address VARCHAR(100)
);

-- payment_method table
CREATE TABLE payment_method (
	payment_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    payment_type VARCHAR(50)
);

-- orders table
CREATE TABLE orders (
	order_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    customer_id INT,
    payment_id INT,
    FOREIGN KEY(customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY(payment_id) REFERENCES payment_method(payment_id)
);

-- order_items table
 CREATE TABLE order_items (
	item_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	order_id INT,
    product_id INT,
    FOREIGN KEY(order_id) REFERENCES orders(order_id),
    FOREIGN KEY(product_id) REFERENCES products(product_id)
);