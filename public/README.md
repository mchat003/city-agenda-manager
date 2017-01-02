
## Instructions

Install the following dependencies:
	- xampp: https://www.apachefriends.org/download.html
	- composer: https://getcomposer.org/download/


Download the project, cd into the top level directory of this project in your shell of choice and run:
```
composer global require "laravel/lumen-installer=~1.0"
```

Drop the project in your xampp htdocs directory. Open up xampp. Before you start the apache server, do the following:

- Click "Config->Apache (httpd.conf)"
- Change all instants of "AllowOverride None" to "AllowOverride All"

Start up xampp.
