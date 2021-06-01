INSERT users (email, password, name) VALUES('alex123@gmail', 'Abwgd', 'Alex');
INSERT users (email, password, name) VALUES('maria123@gmail', 'aBhwgd', 'Maria');
INSERT users (email, password, name) VALUES('mikki123@gmail', 'abtWgd', 'Mikki');

INSERT categories (title, user_id) VALUES('Входящие', '1');
INSERT categories (title, user_id) VALUES('Учеба', '1');
INSERT categories (title, user_id) VALUES('Работа', '1');
INSERT categories (title, user_id) VALUES('Домашние дела', '1');
INSERT categories (title, user_id) VALUES('Авто', '1');

INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Покормить кота', '0', '', '2021-06-15', '4', '1');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Сделать работу', '0', '', '2021-06-02', '3', '1');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Заказать пиццу', '0', '', '2021-07-12', '4', '1');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Помыть посуду', '0', '', '2021-06-11', '4', '1');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Прочитать конспект', '1', '', '2021-05-30', '2', '1');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Сделать отчет', '0', '', '2021-05-20', '3', '1');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Получить письмо', '0', '', '2021-06-27', '1', '1');
INSERT tasks (title, status, file, deadline, category_id, user_id) VALUES('Ремонт машины', '0', '', '2021-05-27', '5', '1');


/*SELECT users_id, name FROM categories WHERE users_id = 1;
SELECT put_date, status, deadline FROM tasks WHERE category_id = 1;
SELECT * FROM tasks WHERE status = 1;
UPDATE tasks SET id = DEFAULT;*/
