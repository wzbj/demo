#简单管理系统开发http://www.php.cn/code/26161.html
==================================
##sql语句
==========================
create table type(

id int(11) not null primary key auto_increment,

typename varchar(255) ,

orderid int(11) ,

fid int(11))

CHARSET=utf8;
#NEWS
create table news(

id int(11) not null primary key auto_increment,

typeid int(11) not null ,

title varchar(255),

source varchar(255),

picurl varchar(255),

content text ,

posttime int(11))

CHARSET=utf8;