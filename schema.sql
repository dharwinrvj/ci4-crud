-- database for ci4crud
create database if not exits ci4crud;
use ci4crud;
-- table for users
drop table if exists users;
create table if not exits users(id int(3) auto_increment primary key not null, email varchar(50) not null, pass varchar(255) not null, hint varchar(50) not null);
-- table for information
drop table if exists information;
create table if not exists information(id int auto_increment primary key, name varchar(30) not null, age int not null, ph bigint(10) not null, image varchar(30) not null, createdby int not null);
