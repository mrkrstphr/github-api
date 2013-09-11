# GitHub API

martha/github-api is a GitHub API implementation written for PHP 5.3+. This library provides a fluent interface to the
GitHub RESTful API.

## Installation

martha/github-api can be installed using Composer. Add the library to your composer.json file:

    {
        "require": {
            "martha/github-api": "1.*"
        }
    }

Then, using composer, install it:

    curl -sS https://getcomposer.org/installer | php
    php composer.phar install

martha/github-api is now downloaded and ready to use!

## Configuration

To use martha/github-api in your project, simply make sure Composer's autoloader is required where you need to use the
library:

```php:
// change to the path to your vendor directory:
require __DIR__ . '/../vendor/autoload.php';
```

This is all that is necessary to configure martha/github-api.

## Usage

To use the library, all you need to do is instantiate an instance of the client:

```php:
use Martha\GitHub\Client;

$client = new Client();
```

From the `$client` instance, all API calls can be made.

### Authenticating

To authenticate, simply pass authentication information to the constructor of `Client` as an array:

```php:
$client = new Client(array('access_token' => 'FOO'));
```

For more information, see the [authentication documentation](docs/authentication.md).

### Making API Calls

To illustrate how API calls are made, let's say we want to get information about a public repository:

```php:
use Martha\GitHub\Client;

$client = new Client();
$repo = $client->repositories()->repository('martha', 'github-api');

print_r($repo);
```

Simple!

### Further Documentation

See the [full documentation](docs/README.md) for more examples and details.
