create table if not exists customers
(
	customerid int unsigned not null auto_increment primary key,
	name char(30) not null,
	address varchar(255) not null,
	unit varchar(10) not null,
	postal int(10) not null,
	email varchar(255) not null,
	phone int(10) not null
);
