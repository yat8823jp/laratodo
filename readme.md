# Docker + Laravel + MariaDB(MySQL) + nginx

## Required

- Docker

## Description

- Docker -> Virtual environments
- Laravel -> PHP Framework
- MariaDB -> Database
- nginx -> Web server

## Install

Start docker container

```
docker-compose up -d
```

Access for browser

http://localhost:1234

## Database

Use to [Adminer](https://www.adminer.org/)

Access for browser

http://localhost:1234/adminer.php

| item | value |
| -- | -- |
| Server | db |
| User | root |
| Password | root |
| Database | testdb |

## Start Laravel

Document root

/testapp

```
docker-compose exec php-fpm sh
```

```
/var/www/html # cd testapp/
```

```
/var/www/html/testapp # php artisan migrate
```

Access for browser

http://localhost:1234

## Reference Site

https://re-engines.com/2019/03/14/laravel%e3%81%ae%e9%96%8b%e7%99%ba%e7%92%b0%e5%a2%83%e3%82%92docker-compose%e3%81%a7%e4%b8%80%e3%81%8b%e3%82%89%e6%a7%8b%e7%af%89%e3%81%97%e3%81%a6%e3%81%bf%e3%82%8b/?unapproved=355&moderation-hash=5544bb456b2ace41b7d7911dd35d23dd#comment-355
