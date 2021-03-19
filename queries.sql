INSERT users (email, password, name) VALUES('alex123@gmail', 'Abwgd', 'Alex');
INSERT users (email, password, name) VALUES('maria123@gmail', 'aBhwgd', 'Maria');
INSERT users (email, password, name) VALUES('mikki123@gmail', 'abtWgd', 'Mikki');

INSERT categories (title, user_id) VALUES('Входящие', '3');
INSERT categories (title, user_id) VALUES('Учеба', '2');
INSERT categories (title, user_id) VALUES('Работа', '2');
INSERT categories (title, user_id) VALUES('Домашние дела', '1');
INSERT categories (title, user_id) VALUES('Авто', '3');

INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Покормить кота', '1', '', '2021-02-27', '4', '1');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Сделать работу', '1', '', '2021-02-27', '3', '1');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Заказать пиццу', '0', '', '2021-02-27', '3', '3');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Помыть посуду', '1', '', '2021-02-27', '4', '2');

/*SELECT users_id, name FROM categories WHERE users_id = 1;
SELECT put_date, status, deadline FROM tasks WHERE category_id = 1;
SELECT * FROM tasks WHERE status = 1;
UPDATE tasks SET id = DEFAULT;*/
