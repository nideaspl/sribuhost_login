## Configure mysql.
```shell
sudo systemctl status mysql
sudo systemctl start mysql
sudo systemctl enable mysql
```
## Create user kali and grant all privileges.
```
┌──(kali㉿kali)-[~/Desktop/login-form-php]
└─$ mysql    
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 6
Server version: 10.11.7-MariaDB-4 Debian n/a

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Support MariaDB developers by giving a star at https://github.com/MariaDB/server
Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> use mysql;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
MariaDB [mysql]> select User,Password,Host from user;
+-------------+----------+-----------+
| User        | Password | Host      |
+-------------+----------+-----------+
| mariadb.sys |          | localhost |
| root        | invalid  | localhost |
| mysql       | invalid  | localhost |
+-------------+----------+-----------+
3 rows in set (0.002 sec)


MariaDB [mysql]> CREATE USER 'kali'@'localhost' IDENTIFIED BY 'password';
Query OK, 0 rows affected (0.013 sec)

MariaDB [mysql]> SELECT User, Password FROM user;
+-------------+-------------------------------------------+
| User        | Password                                  |
+-------------+-------------------------------------------+
| mariadb.sys |                                           |
| root        | invalid                                   |
| mysql       | invalid                                   |
| kali        | *2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19 |
+-------------+-------------------------------------------+
4 rows in set (0.002 sec)


MariaDB [mysql]>         GRANT ALL PRIVILEGES ON sribuhost_login.* TO 'kali'@'localhost';
Query OK, 0 rows affected (0.001 sec)

MariaDB [mysql]> FLUSH PRIVILEGES;
Query OK, 0 rows affected (0.000 sec)
MariaDB [mysql]> source sribuhost_login.sql
Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.004 sec)

Query OK, 1 row affected (0.001 sec)

Query OK, 0 rows affected (0.006 sec)
Records: 0  Duplicates: 0  Warnings: 0

Query OK, 1 row affected (0.005 sec)               
Records: 1  Duplicates: 0  Warnings: 0

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

Query OK, 0 rows affected (0.000 sec)

MariaDB [sribuhost_login]> SHOW DATABASES;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| performance_schema |
| sribuhost_login    |
| sys                |
+--------------------+
5 rows in set (0.000 sec)

```


## Finally host it.
```shell
cd <repositiry directory>
cp * /var/www/html
sudo systemctl restart apache2
```
## Access local website using this URL:
```
http://localhost/index.php
```
