## About
Laravel package for https://partner.rentler.com/swagger/index.html Rentler(c) Partner API.

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
`docker run -it --rm -v $PWD:/app -w /app php:8.1-cli vendor/bin/phpunit`

Go to directory `tools/php-cs-fixer` and install dependencies:
`docker run -it --rm -v $PWD:/app -w /app composer install`

Run php-cs-fixer on self:
`docker run -it --rm -v $PWD:/app -w /app composer cs-fix`
