create database `sparks_collection`;

-- use nvarchar, if not then change the encoding to utf8_general_ci in gui
create table if not exists `sparks` (
`spark_id` INT(2) NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255) NOT NULL,
`source` VARCHAR(255) NOT NULL,
`description` TEXT NOT NULL,
`deleted` INT(1) NOT NULL,
PRIMARY KEY (spark_id)
);

-- testing purpose, the column name only accepts ``
insert into `sparks` (`spark_id`, `name`, `source`, `description`, `deleted`) values 
("", "Test1", "Book", "Some description for Test1", 0)