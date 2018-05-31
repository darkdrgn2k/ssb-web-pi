#!/bin/bash
function fix_permissions() {
    ln -s /root/.ssb /var/www
    chmod a+rwX /var/www/.ssb
    chmod -R a+rwX /var/www/.ssb
    exit 0
}
php-fpm5
nginx
fix_permissions &
sbot server 
