#!/bin/bash
nameuser="wordpress"
pass="12345"
mysql -uroot <<MYSQL_SCRIPT
CREATE DATABASE $nameuser CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER '$nameuser'@'localhost' IDENTIFIED BY '$pass';
GRANT ALL PRIVILEGES ON $nameuser.* TO '$nameuser'@'localhost';
FLUSH PRIVILEGES;
MYSQL_SCRIPT

echo "MySQL database created."
echo "Database:   $nameuser"
echo "Username:   $nameuser"
echo "Password:   $pass"
