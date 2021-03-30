#!/bin/bash

# variable declaration
siteurl=$SITE_URL
project=$PROJECT

# move backward
cd ../

path=$(pwd)

# pull from master
git pull origin master

# update wp and plugins
COMPOSER_HOME="$path" /usr/local/bin/php /opt/cpanel/composer/bin/composer install -d=$path

# import database
/usr/local/bin/php /usr/local/bin/wp db import import/$(ls -t import/) | head -1

# change url to live site
/usr/local/bin/php /usr/local/bin/wp search-replace --all-tables "http://localhost/$project" "$siteurl"
/usr/local/bin/php /usr/local/bin/wp search-replace --all-tables "http://192.168.1.14/$project" "$siteurl"