# Nginx, PHP-FPM, MariaDB, phpMyAdmin

You can easily run these services by using [docker-compose](https://docs.docker.com/compose).

## Information

| Name       | Port          | Version |
|------------|---------------|---------|
| Nginx      | 8080 (Expose) | 1.17    |
| PHP-FPM    | 9000          | 7.4     |
| MariaDB    | 3306          | 10.4    |
| phpMyAdmin | 8090 (Expose) | 5.0     |

## Structure

```
.
├── db-datas
├── docker-compose.yml
├── html
│   ├── db-check.php
│   └── index.php
└── settings
    ├── nginx
    │   └── default.conf
    └── php-fpm
        ├── Dockerfile
        ├── php.ini-development
        └── php.ini-production
```

## Try it out

```shell
$ git clone https://github.com/nbsp1221/docker-settings.git
$ cd 'docker-settings/nginx php-fpm mariadb phpmyadmin'
$ sudo docker-compose up
```

Visit http://localhost:8080 then you can see PHP information.
