## About
Laravel package for https://partner.rentler.com/swagger/index.html Rentler(c) Partner API.

## Installation
In your `composer.json`, add this repository:
```
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/tenantcloud/php-rentler-sdk"
    }
],
```
Then do `composer require tenantcloud/php-rentler-sdk` to install the package.

### Commands
Install dependencies:
`docker run -it --rm -v $PWD:/app -w /app composer install`

Run tests:
`docker run -it --rm -v $PWD:/app -w /app php:7.4-cli vendor/bin/pest`

Run php-cs-fixer on self:
`docker run -it --rm -v $PWD:/app -w /app composer cs-fix`
