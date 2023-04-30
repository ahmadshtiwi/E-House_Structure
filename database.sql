create table accounts
(
    id_person INT AUTO_INCREMENT primary key ,
    name varchar(255) not null ,  
     username varchar(255) not null unique ,
    password varchar(255) not null,
    birthday varchar(50) not null,
    gender varchar(50) not null,
    phone varchar(10) not null ,
    city varchar(255) not null,
    type_account varchar(10)
)

create table designs
(
    id_design INT AUTO_INCREMENT,
    price INT,
    area INT,
    room INT,
    bathroom int ,
    balcony int ,
    garden int ,
    city varchar(50),
    image_design varchar(255),
    id_person INT,
    PRIMARY KEY(id_design)
)

