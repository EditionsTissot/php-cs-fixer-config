# php-cs-fixer-config

[`PHP CS Fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer) config for Editions Tissot components.

## Installation

Run

```
$ composer require --dev editions-tissot/php-cs-fixer-config
```

## Usage

### Configuration

Create a configuration file `.php-cs-fixer.dist.php` in the root of your project:

```php
<?php

$config = new EditionsTissot\CS\Config\Config;
$config->getFinder()
    ->in(
        [
            __DIR__.'/src',
            __DIR__.'/tests',
        ]
    );

return $config;
```

### Git

Add `.php-cs-fixer.cache` (this is the cache file created by `php-cs-fixer`) to `.gitignore`:

```
vendor/
.php-cs-fixer.cache
```

### Makefile

Create a `Makefile` with the targets below:

```Makefile
# Coding Style

cs:
	./bin/php-cs-fixer fix --dry-run --stop-on-violation --diff

cs-fix:
	./bin/php-cs-fixer fix

cs-ci:
	./bin/php-cs-fixer fix --dry-run --using-cache=no --verbose
```

## Fixing issues

### Manually

If you need to **check** issues locally, just run

```
$ make cs
```

If you need to **fix** issues locally, just run

```
$ make cs-fix
```

In your Continuous Integration, run

```
$ make cs-ci
```

## Credits

Developed by [Editions Tissot](https://www.editions-tissot.fr/) , inspired by [Rémy BRUYERE (rem42)](https://remy.ovh).

## License

This project is licensed under the [MIT license](LICENSE).
