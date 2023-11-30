Create Table Users
(
    user_id integer primary key autoincrement,
    user_login text unique not null,
    user_password text not null -- In SHA256
);

Insert into Users(user_login, user_password) values ('test_login', 'test_password');