Create Table Users
(
    user_id integer primary key autoincrement,
    user_login text unique,
    user_password text
);

Insert into Users(user_login, user_password) values ('test_login', 'test_password');