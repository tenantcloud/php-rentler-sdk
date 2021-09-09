## About
Laravel package for https://partner.rentler.com/swagger/index.html Rentler(c) Partner API.

## Requirements
* PHP version >=7.4.1
* Laravel Framework version >=8.*
* Rentler SDK version V1-ALPHA
* Docker (optional)

## Installation
In your `composer.json`, add this repository:
```
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/tenantcloud/rentler-sdk"
    }
],
```
Then do `composer require tenantcloud/rentler-sdk` to install the package.

### Commands
Install dependencies:
`docker run -it --rm -v $PWD:/app -w /app composer install`

Run tests:
`docker run -it --rm -v $PWD:/app -w /app php:7.4-cli vendor/bin/phpunit`

Run php-cs-fixer on self:
`docker run -it --rm -v $PWD:/app -w /app composer cs-fix`
