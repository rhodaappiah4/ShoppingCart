create schema ecommerce;
use ecommerce;

create table customer(
customer_id int primary key auto_increment,
firstname varchar(60),
lastname varchar(60),
gender varchar(10),
date_of_birth date,
home_address text,
email_address varchar(50),
phone_number varchar(20),
username varchar(30),
customer_password varchar(30)
);

create table category(
category_id int primary key auto_increment,
category_name varchar(100)
);

create table color(
color_id int primary key auto_increment,
color_name varchar(30)
);

create table product(
product_id int primary key auto_increment,
product_name varchar(100),
description text,
imagelocation varchar(40),
fk_category_id int,
quantity int,
fk_color_id int,
price decimal(10,2),
last_updated datetime,
foreign key (fk_category_id) references category(category_id),
foreign key (fk_color_id) references color(color_id)
);

create table order_table(
order_id int primary key auto_increment,
order_status varchar(30),
order_date date 
);

create table order_details(
details_id int primary key auto_increment,
fk_customer_id int,
fk_order_id int,
fk_product_id int,
foreign key (fk_customer_id) references customer (customer_id),
foreign key (fk_order_id) references order_table (order_id),
foreign key (fk_product_id) references product (product_id)
);