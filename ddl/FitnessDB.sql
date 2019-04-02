# MySQL

CREATE DATABASE Fitness;

USE Fitness;

CREATE TABLE Categories (id int auto_increment primary key, Name text, Description text);

CREATE TABLE SubCategories (id int auto_increment primary key, Category int(4) not null, Name text, Description text);

CREATE TABLE Products (id int auto_increment primary key, Name text, Description text, Price double(7, 2), SalePrice double(7, 2), Active int(1) default 1, OnSale int(1) default 1, Category int(4) not null, SubCategory int(4), ProductImage text);

ALTER TABLE Categories ENGINE=InnoDB;
ALTER TABLE SubCategories ENGINE=InnoDB;
ALTER TABLE Products ENGINE=InnoDB;

ALTER TABLE SubCategories ADD CONSTRAINT fk_SubCategories_Category FOREIGN KEY(Category) REFERENCES Categories(id);
ALTER TABLE Products ADD CONSTRAINT fk_Products_Category FOREIGN KEY(Category) REFERENCES Categories(id);
ALTER TABLE Products ADD CONSTRAINT fk_Products_SubCategory FOREIGN KEY(SubCategory) REFERENCES SubCategories(id);