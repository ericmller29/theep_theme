#!/bin/bash

#DB Credentials
username="root"
password="root"
database="company"
host="localhost"
backup_path=$(pwd)"/mysql"

echo "Dropping the database..."

echo -n "What is your dev url? [ENTER]: "
read url

# mysql --user=$username  --password=$password --host=$host DROP DATABASE if exists $database
# mysql --user=$username  --password=$password --host=$host CREATE DATABASE if not exists $database

echo "Importing database..."

cd $backup_path

backup=$(ls -t | head -n1)
mysql --user=$username  --password=$password --host=$host $database < "$backup_path/$backup"