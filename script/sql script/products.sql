create table if not exists products
(
	productid int unsigned not null auto_increment primary key,
	name varchar(255) not null,
	category text not null,
	description text not null,
	clothessize text not null,
	quantity int not null,
	price double not null,
	img_front text not null,
	img_side1 text not null,
	img_side2 text not null,
	img_top text not null,
	img_bottom text not null,
	DNA text not null
);

INSERT INTO products (productid, name, category, description, clothessize, quantity, price, img_front, img_side1, img_side2, img_top, img_bottom, DNA)
VALUES
(NULL, 'PMO COAT #1 BLACK', 'men', '100% COTTON Original artwork appplique and printed. Side Pockets', 'S,M,L', 10, 1000, 'pics/pmojac/pmojac1.png', 'pics/pmojac/pmojac2.png', 'pics/pmojac/pmojac3.png', 'pics/pmojac/pmojac4.png', 'pics/pmojac/pmojac5.png','<ul><li>HAND WASH COLD/ DONOT BLEACH/ DO NOT TUMBLE DRY/ IRON INSIDE OUT</li><li>DESIGNED AND MANUFACTURED BY FASHSENSE</li><li>MADE IN SINGAPORE. 2022/08</li></ul>'),

(Null, 'PPMO COTTON T-SHIRT #BLACK', 'men', '100% COTTON','FREE SIZE', 10, 850,'pics/pmoshirt/pmoshirt1.png','pics/pmoshirt/pmoshirt2.png','pics/pmoshirt/pmoshirt3.png','pics/pmoshirt/pmoshirt4.png','pics/pmoshirt/pmoshirt5.png', '<ul><li>HAND WASH COLD/ DONOT BLEACH/ DO NOT TUMBLE DRY/ IRON INSIDE OUT</li><li>DESIGNED AND MANUFACTURED BY FASHSENSE</li><li>MADE IN SINGAPORE. 2022/08</li></ul>'),

(Null, 'PMO DAISY SHORT PANTS #3 RED', 'unisex','100% NYLON', 'S,M,L', 10, 400, 'pics/pmoshorts/pmoshorts1.png', 'pics/pmoshorts/pmoshorts2.png', 'pics/pmoshorts/pmoshorts3.png', 'pics/pmoshorts/pmoshorts4.png','pics/pmoshorts/pmoshorts5.png', '<ul><li>HAND WASH COLD/ DONOT BLEACH/ DO NOT TUMBLE DRY/ IRON INSIDE OUT</li><li>DESIGNED AND MANUFACTURED BY FASHSENSE</li><li>MADE IN SINGAPORE. 2022/08</li></ul>'),

(Null, 'PMO 5 PANEL BALL CAP #3 BLACK', 'unisex','100% COTTON', 'FREE SIZE', 10, 300, 'pics/pmohat/pmohat1.png', 'pics/pmohat/pmohat2.png', 'pics/pmohat/pmohat3.png', 'pics/pmohat/pmohat4.png','pics/pmohat/pmohat5.png', '<ul><li>HAND WASH COLD/ DONOT BLEACH/ DO NOT TUMBLE DRY/ IRON INSIDE OUT</li><li>DESIGNED AND MANUFACTURED BY FASHSENSE</li><li>MADE IN SINGAPORE. 2022/08</li></ul>'),

(Null, 'PMO RAYON SHIRT #2 BLACK', 'women', '100% RAYON', 'FREE SIZE', 10, 2000, 'pics/pmobshirt/pmobshirt1.png', 'pics/pmobshirt/pmobshirt2.png','pics/pmobshirt/pmobshirt3.png', 'pics/pmobshirt/pmobshirt4.png', 'pics/pmobshirt/pmobshirt5.png', '<ul><li>HAND WASH COLD/ DONOT BLEACH/ DO NOT TUMBLE DRY/ IRON INSIDE OUT</li><li>DESIGNED AND MANUFACTURED BY FASHSENSE</li><li>MADE IN SINGAPORE. 2022/08</li></ul>');


