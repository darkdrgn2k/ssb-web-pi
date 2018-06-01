#!/bin/bash
function fix_permissions() {
    sleep 5
    echo Fixing Permissions
    ln -s /root/.ssb /var/www
    chmod a+rwX /var/www/.ssb
    chmod -R a+rwX /var/www/.ssb
    exit 0
}
php-fpm5
nginx
fix_permissions &
echo Starting SBOT
sbot server 
