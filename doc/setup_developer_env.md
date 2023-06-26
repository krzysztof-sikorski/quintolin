# Setting up development environment

## Summary

- Install **PHP-CLI**, **PHP-FPM**, and necessary PHP modules
- Install **Composer** and **Symfony CLI**
- Install required third-party libraries via Composer
- Use Symfony CLI to run application

## Installing PHP

You need two variants of PHP binary: PHP-CLI for executing command line scripts,
and PHP-FPM for running a HTTP server.

Because PHP has modular architecture, you also need to install all PHP modules
that are actually used by application.

On APT-based Linux distributions (Debian, Ubuntu, Linux Mint, etc), these
commands should be enough to install all the required packages:

```shell
sudo apt-get install php-cli php-fpm # for PHP binaries
sudo apt-get install php-intl php-mbstring php-xml # required PHP modules
sudo apt-get install php-curl # for speeding up Composer
```

## Install Composer and Symfony CLI

Follow [official documentation][COMPOSER] to install Composer package manager.

Follow [official documentation][SYMFONY] to install Symfony CLI tool.

## Install required dependencies

Go to `website` subdirectory and execute following commands:

```shell
composer check-platform-reqs # verify PHP version and available modules
symfony local:check:requirements # verify requirements of Symfony framework
composer install # actual installation of PHP packages
```

## Running HTTP server via Symfony CLI

One of the features of Symfony CLI is build-in basic HTTP server.

You can start it by following command: `symfony local:server:start --no-tls`

Check [official documentation][HTTP_SERVER] for more information.


[COMPOSER]:
https://getcomposer.org/download/

[SYMFONY]:
https://symfony.com/download

[HTTP_SERVER]:
https://symfony.com/doc/current/setup/symfony_server.html
