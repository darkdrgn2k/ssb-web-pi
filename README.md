# SSB WEB PI

Project to allow you to interact with the scuttlebot backend with a web interface.


## Installation notes

* NGINX and PHP needed
* Tree placed in /var/www
* .ssb in /var/www linked to /home/user/.ssb (or other database)
* .ssb given +rwX access to www-data (or a+rwX or group or something)
* backend link node_modules -> /usr/local/lib/node_modules (Some odd bugg where it doesnt find some modules in global?!?!)
* userlist and keys MUST be www-data read/write
* js must be www-data executable
