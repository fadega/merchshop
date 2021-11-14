
CREATE TABLE IF NOT EXISTS user (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userid varchar(255) not null,
	name VARCHAR(30) not null,
	email VARCHAR(50) not null unique,
	phone VARCHAR(15),
	password VARCHAR(80),
	role varchar(10),
    address VARCHAR(150),
    date DATE NOT NULL,	
    UNIQUE(userid)
    );

CREATE TABLE IF NOT EXISTS category ( 
     id int NOT NUll AUTO_INCREMENT PRIMARY KEY,
     categoryName VARCHAR(50) NOT NULL,
	 status TINYINT, 
     UNIQUE(categoryName)
    
); 
CREATE TABLE IF NOT EXISTS product (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	description VARCHAR(255),
	price DECIMAL(10,2),
	category int not null,
	quantity int not null,
	enteredby varchar(255),
	image1 VARCHAR(500),
	image2 VARCHAR(500),
	image3 VARCHAR(500),
	image4 VARCHAR(500),
	image5 VARCHAR(500),
	enteredon DATETIME NOT NULL,
    modifiedon DATETIME,
	slag VARCHAR(200),
    foreign key(enteredby) references user(userid) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(category) references category(id) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS inventory (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    productid int NOT NULL,
    quantity int NOT NULL,
    modifieddate DATE,
    foreign key(productid) references product(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS cart (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	count int,
	totalpay DECIMAL(10,2),
	product_id int,
	foreign key(product_id) references product(id) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS orders (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_id int,
	cart_id int,
	order_date date,
	order_amount float,
	product_id int,
	foreign key(user_id) references user(id) ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(cart_id) references cart(id) ON UPDATE CASCADE ON DELETE CASCADE
);


