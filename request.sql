Create Table Users
(
    user_id       integer primary key autoincrement,
    user_login    text unique not null,
    user_password text        not null, -- In SHA256
    user_is_admin boolean     not null
);

Insert into Users(user_login, user_password, user_is_admin)
values ('test', 'test', true);

Create Table Items
(
    item_id    integer primary key autoincrement,
    item_label text unique not null,
    item_desc text not null,
    item_price integer not null,
    item_image text not null
);

SELECT * from Items
