#!/bin/bash
# echo -n "User for mysql [ENTER]: "
# read username

# echo -n "Password for $username [ENTER]: "
# read password

# echo -n "Database name for export? [ENTER]: "
# read database

# echo "Dumping database $database..."

#DB Credentials
username="root"
password="root"
database="company"
host="localhost"

backup_path=$(pwd)"/mysql"
date=$(date +"%d-%b-%Y")

umask 177
mysqldump --user=$username --password=$password --host=$host $database > $backup_path/$database-$date.sql

# Delete files older than 30 days
 find $backup_path/* -mtime +30 -exec rm {} \;