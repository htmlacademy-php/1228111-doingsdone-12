INSERT users (email, password, name) VALUES('alex123@gmail', 'Abwgd', 'Alex');
INSERT users (email, password, name) VALUES('maria123@gmail', 'aBhwgd', 'Maria');
INSERT users (email, password, name) VALUES('mikki123@gmail', 'abtWgd', 'Mikki');

INSERT categories (title, user_id) VALUES('Входящие', '1');
INSERT categories (title, user_id) VALUES('Учеба', '2');
INSERT categories (title, user_id) VALUES('Работа', '1');
INSERT categories (title, user_id) VALUES('Домашние дела', '3');
INSERT categories (title, user_id) VALUES('Авто', '3');

INSERT tasks (title, put_date, status, file, deadline, category_id, user_id) VALUES('Покормить кота', '2021-02-26', '1', '', '2021-02-27', '1', '3');
INSERT tasks (title, put_date, status, file, deadline, category_id, user_id) VALUES('Сделать работу', '2021-01-27', '1', '', '2021-02-27', '2', '1');
INSERT tasks (title, put_date, status, file, deadline, category_id, user_id) VALUES('Заказать пиццу', '2021-02-20', '0', '', '2021-02-27', '3', '3');
INSERT tasks (title, put_date, status, file, deadline, category_id, user_id) VALUES('Помыть посуду', '2021-01-01', '1', '', '2021-02-27', '4', '3');

SELECT users_id, name FROM categories WHERE users_id = 1;
SELECT put_date, status, deadline FROM tasks WHERE category_id = 1;
SELECT * FROM tasks WHERE status = 1;
UPDATE tasks SET id = DEFAULT;
