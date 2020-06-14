INSERT INTO categories (name, code) VALUES ('Доски и лыжи', 'boards');
INSERT INTO categories (name, code) VALUES ('Крепления', 'attachment');
INSERT INTO categories (name, code) VALUES ('Ботинки', 'boots');
INSERT INTO categories (name, code) VALUES ('Одежда', 'clothing');
INSERT INTO categories (name, code) VALUES ('Инструменты', 'tools');
INSERT INTO categories (name, code) VALUES ('Разное', 'other');

INSERT INTO lots (name, add_date, description, image_link, start_price, expiration_date, step_sum, author_id, winner_id, category_id) 
VALUES ('2014 Rossignol District Snowboard', '2020-05-01 07:05:05', 'Качественный сноуборд от известной фирмы', 'img/lot-1.jpg', 10999, '2020-05-20 00:00:00', 500, 2, 3, 1);
INSERT INTO lots (name, add_date, description, image_link, start_price, expiration_date, step_sum, author_id, winner_id, category_id) 
VALUES ('DC Ply Mens 2016/2017 Snowboard', '2020-05-15 12:10:40', 'Один из лучших сноубордов в своем классе', 'img/lot-2.jpg', 159999, '2020-06-15 12:00:00', 1000, 2, NULL, 1);
INSERT INTO lots (name, add_date, description, image_link, start_price, expiration_date, step_sum, author_id, winner_id, category_id) 
VALUES ('Крепления Union Contact Pro 2015 года размер L/XL', '2020-05-30 10:59:30', 'Надежные крепления', 'img/lot-3.jpg', 8000, '2020-06-23 15:00:00', 200, 3, NULL, 2);
INSERT INTO lots (name, add_date, description, image_link, start_price, expiration_date, step_sum, author_id, winner_id, category_id) 
VALUES ('Ботинки для сноуборда DC Mutiny Charocal', '2020-06-01 00:00:30', 'Удобные ботинки', 'img/lot-4.jpg', 10999, '2020-06-25 20:30:00', 300, 1, NULL, 3);
INSERT INTO lots (name, add_date, description, image_link, start_price, expiration_date, step_sum, author_id, winner_id, category_id)
VALUES ('Куртка для сноуборда DC Mutiny Charocal', '2020-06-03 18:09:34', 'Теплая и лёгкая куртка', 'img/lot-5.jpg', 7500, '2020-07-10 00:00:00', 200, 3, NULL, 4);
INSERT INTO lots (name, add_date, description, image_link, start_price, expiration_date, step_sum, author_id, winner_id, category_id)
VALUES ('Маска Oakley Canopy', '2020-06-04 15:55:25', 'Стильная маска', 'img/lot-6.jpg', 5400, '2020-07-25 12:00:00', 100, 3, 2, 6);

INSERT INTO users (reg_date, email, name, password, contact_inf) 
VALUES ('2020-02-01 12:11:42', 'ivan_1970_123@)mails.ru', 'Иван', '1234567', 'телефон: 8-900-1234567');
INSERT INTO users (reg_date, email, name, password, contact_inf) 
VALUES ('2020-05-02 18:43:01', 'vladimir_1980_abc@)gmails.ru', 'Владимир', 'qweasdzxc', 'телефон: 8-900-1111111');
INSERT INTO users (reg_date, email, name, password, contact_inf) 
VALUES ('2019-12-31 23:55:30', 'Nik_1985@)yand.ru', 'Николай', 'abcdefg', 'телефон: 8-912-1212121');

INSERT INTO bet (bet_date, sum_price, user_id, lot_id) 
VALUES ('2020-05-02 10:59:50', 11499, 1, 1);
INSERT INTO bet (bet_date, sum_price, user_id, lot_id) 
VALUES ('2020-05-15 12:54:16', 11999, 3, 1);
INSERT INTO bet (bet_date, sum_price, user_id, lot_id) 
VALUES ('2020-06-05 19:22:19', 5500, 2, 6);

-- получить все категории
SELECT name FROM categories;

-- получить самые новые, открытые лоты с названием, стартовой ценой, ссылкой на изображение, текущей ценой и названием категории
SELECT l.name, l.start_price, l.image_link, b.sum_price, c.name category FROM lots l JOIN categories c ON c.id = l.category_id
LEFT JOIN bet b ON b.lot_id = l.id WHERE l.expiration_date > NOW() ORDER BY l.add_date DESC;

-- показать лот с названием категории по его id
SELECT l.id, l.name, c.name category  FROM lots l JOIN categories c ON c.id = l.category_id WHERE l.id = 2;

-- обновить название лота по его идентификатору
UPDATE lots SET name = 'Крепления Union Contact Pro 2015 года размер M/XXL' WHERE id = 3;

-- получить список ставок для лота по его идентификатору с сортировкой по дате
SELECT * FROM bet WHERE lot_id=1 ORDER BY bet_date;
