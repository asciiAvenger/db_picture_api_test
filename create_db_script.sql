create database picture_db;

use picture_db;

create table images (
    image_id int unsigned primary key auto_increment,
    image_name varchar(100) not null,
    image_type varchar(255) not null,
    image_data mediumblob not null
);