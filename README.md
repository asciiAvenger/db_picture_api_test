# db_picture_api_test

PHP sample code for storing and loading pictures in/from a MySQL database.

I decided to style the index page using [MaterializeCSS](https://materializecss.com) in favor of not having to write any CSS-Code and keeping things simple.

The MySQL database is created as follows (or in the `create_db_script.sql`):

```mysql
create database picture_db;

use picture_db;

create table images (
    image_id int unsigned primary key auto_increment,
    image_name varchar(100) not null,
    image_type varchar(255) not null,
    image_data mediumblob not null
);
```

I hope this helps and thanks for visiting my repository! :)