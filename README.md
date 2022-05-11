# clients-from-internet
test task

##Задача
Создать небольшое web приложение для создания, просмотра, и редактирования карточек.<br />
Карточки должны иметь древовидную структуру с неограниченной вложенностью также необходимо отобразить древовидность.<br /> 
На странице изначально выводятся только карточки первого уровня - остальные отображать только при клике по их родителю, также при клике по карточке - выводить title и description в определенной области.
***
Авторизация через форму (валидация приветствуется) <br />
Не авторизованный пользователь может только просматривать карточки.<br />
Администратор (авторизованный пользователь) - crud.
***
##Требования
Технологии(без фреймворков - онли хард): PHP5, MySQL, JavaScript
***
##Как развернуть проект
Проект упакован в Docker
1. Устанавливаем Docker на компьютер
2. Переходим в терминал
3. Переходим в папку docker <br/>
`cd /docker`
4. Запускаем создание контейнеров <br />
`docker compose up -d`
5. После того, как контейнеры создадуться и стартанут необходимо подключится к БД (MySQL8)<br />
`Host: localhost` <br />
`Port: 3356` <br />
`login: root` <br />
`password: root`
6. После подключения создать БД `clients-from-internet`
7. Выполнить SQL команду для создания таблицы users <br />
`create table users
   (
   id       int auto_increment,
   email    varchar(255) null,
   password varchar(255) null,
   constraint users_id_uindex
   unique (id)
   );`<br/>

`
alter table users
add primary key (id);` <br />

`INSERT INTO users (id, email, password) VALUES (1, 'XEGO@yandex.ru', '$2y$10$653RE/3nyjUzs1jmg5wU9.UY5h00VDUMlbArJegWrqNik5wS9jLKq');`
8. Выполнить SQL команду для создания таблицы c карточками <br/>
`create table cards
   (
   id          int auto_increment
   primary key,
   title       varchar(255) null,
   description varchar(255) null,
   parentId    int          null
   );` <br />

`INSERT INTO cards (id, title, description, parentId) VALUES (1, 'Card 1', 'Description card 1', 0);
INSERT INTO cards (id, title, description, parentId) VALUES (2, 'Card 2', 'Description card 2', 0);
INSERT INTO cards (id, title, description, parentId) VALUES (3, 'Card 3', 'Description card 3', 1);
INSERT INTO cards (id, title, description, parentId) VALUES (4, 'Card 4', 'Description card 4', 1);
INSERT INTO cards (id, title, description, parentId) VALUES (5, 'Card 5', 'Description card 5', 1);
INSERT INTO cards (id, title, description, parentId) VALUES (6, 'Card 6', 'Description card 6', 2);
INSERT INTO cards (id, title, description, parentId) VALUES (7, 'Card 7', 'Description card 7', 2);
INSERT INTO cards (id, title, description, parentId) VALUES (8, 'Card 8', 'Description card 8', 5);
INSERT INTO cards (id, title, description, parentId) VALUES (9, 'Card 9', 'Description card 9', 5);
INSERT INTO cards (id, title, description, parentId) VALUES (10, 'Card 10', 'Description card 10', 8);
INSERT INTO cards (id, title, description, parentId) VALUES (11, 'Card 11', 'Description card 11', 10);
INSERT INTO cards (id, title, description, parentId) VALUES (12, 'Card 12', 'Description card 12', 10);
INSERT INTO cards (id, title, description, parentId) VALUES (13, 'Card 13', 'Description card 13', 0);
INSERT INTO cards (id, title, description, parentId) VALUES (14, 'Card 14', 'Description card 14', 0);
INSERT INTO cards (id, title, description, parentId) VALUES (15, 'Card 15', 'Description card 15', 0);
INSERT INTO cards (id, title, description, parentId) VALUES (16, 'Card 16', 'Description card 16', 0);` <br />

9. Авторизация на сайте: <br />
`Email: XEGO@yandex.ru`<br />
`Password: 12345`

10. Запуск `http://localhost:8080/`
<br />
![Иллюстрация к проекту](https://github.com/krivilyov/clients-from-internet/raw/main/static/project_description_1.png) <br />
![Иллюстрация к проекту](https://github.com/krivilyov/clients-from-internet/raw/main/static/project_description_2.png) <br />
![Иллюстрация к проекту](https://github.com/krivilyov/clients-from-internet/raw/main/static/project_description_3.png) <br />
![Иллюстрация к проекту](https://github.com/krivilyov/clients-from-internet/raw/main/static/project_description_4.png) <br />
![Иллюстрация к проекту](https://github.com/krivilyov/clients-from-internet/raw/main/static/project_description_5.png) <br />