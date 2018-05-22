Demo is up at http://city-agenda-manager.herokuapp.com

## Instructions

1)Install the following dependencies:
	- xampp: https://www.apachefriends.org/download.html
	- composer: https://getcomposer.org/download/


2) Download the project, cd into the top level directory of this project in your shell of choice and run:
```
composer global require "laravel/lumen-installer=~1.0"
```

3) Drop the project in your xampp htdocs directory. Open up xampp. Before you start the apache server, do the following:

- Click "Config->Apache (httpd.conf)"
- Change all instants of "AllowOverride None" to "AllowOverride All"

4) Start up xampp. Now visit http://localhost:8888/city-agenda-manager in your browser.

## Configuration

- .env: Contains the paths for each CGLive's text file you want to manipulate.
- config/statuses.php: Add the meeting statuses here.
