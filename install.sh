#!/bin/sh


root=$(pwd);
currentDir=${PWD##*/}  

url="localhost/$currentDir"

read -p "Please enter db name: " input_db_name
[ -z "$input_db_name" ] && exit;

read -p "Please enter db user: " input_db_user
[ -z "$input_db_user" ] && exit;

# No need to check if password is empty
read -p "Please enter db pass: " input_db_pass

read -p "Please enter template name: " input_template
input_template=${input_template:-litfire}

# Run composer
composer update

# create wp-config.php
cp wp-config-sample.php  wp-config.php

# Replace database credentials
sed -i -e "s:<BASE_URL>:$url:g" wp-config.php
sed -i -e "s:<DB_NAME>:$input_db_name:g" wp-config.php
sed -i -e "s:<DB_USER>:$input_db_user:g" wp-config.php
sed -i -e "s:<DB_PASS>:$input_db_pass:g" wp-config.php

# Generate wordpress salt
SALTS=$(curl -s https://api.wordpress.org/secret-key/1.1/salt/)
while read -r SALT; do
SEARCH="define('$(echo "$SALT" | cut -d "'" -f 2)"
REPLACE=$(echo "$SALT" | cut -d "'" -f 4)
echo "... $SEARCH ... $SEARCH ..."
sed -i "/^$SEARCH/s/put your unique phrase here/$(echo $REPLACE | sed -e 's/\\/\\\\/g' -e 's/\//\\\//g' -e 's/&/\\\&/g')/" wp-config.php
done <<< "$SALTS"

# create database and import
echo 'Creating database...'
wp db create
echo 'Importing database...'
wp db import import/*.sql
echo 'Replacing URL...'
wp search-replace --all-tables "http://localhost/wordpress" "http://$input_url"

# clone template
mkdir content/themes
cd content/themes
git clone git@gitlab.clickablebrand.com:webbongga/template-basic.git $input_template

# install bower and npm 
cd $input_template
echo 'Installing bower components...'
bower install
echo 'Installing node modules...'
npm install

#remove .git folder
rm -rf .git

echo 'DONE!'