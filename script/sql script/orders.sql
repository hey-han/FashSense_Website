create table if not exists orders
(
	orderid int unsigned not null,
	productid int not null,
	clothessize text not null,
	quantity int unsigned not null,
	orderdate datetime not null
);
