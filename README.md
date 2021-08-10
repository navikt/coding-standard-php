# PHP Coding Standard for NAV IT

This is the coding standard for the PHP-based projects and tools at NAV IT. The ruleset is enforced using the [PHP Coding Standards Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) tool.

## How to setup

First, add this package as a development dependency to your project:

    composer require --dev navikt/coding-standard

then, create a PHP-CS-Fixer configuration file named `.php-cs-fixer.php` local to your repository that includes the following:

```php
<?php declare(strict_types=1);
require 'vendor/autoload.php';

use NAVIT\CodingStandard\Config;
use Symfony\Component\Finder\Finder;

$finder = (new Finder())
    ->files()
    ->name('*.php')
    ->in(__DIR__)
    ->exclude('vendor');

return (new Config())
    ->setFinder($finder);
```

You can adjust the `$finder` instance if you wish to include/exclude other directories.

Now you can run the following command to check the coding standard in your project:

    php-cs-fixer fix --dry-run --diff

You can drop the `--dry-run` option to let the tool fix your files automatically.

Refer to the [documentation](https://github.com/FriendsOfPHP/PHP-CS-Fixer) on how to install php-cs-fixer locally.

## Add step in the GitHub workflow

All PHP-based NAV IT projects use GitHub workflows, and checking the coding standard should be a part of that workflow:

```yaml
name: CI workflow
on: push
jobs:
  php-cs-fixer:
    runs-on: ubuntu-20.04
    name: Check coding standard
    steps:
      - name: Checkout code
        uses: actions/checkout@v2

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '7.4'
          tools: php-cs-fixer

      - name: Install dependencies
        run: composer install --prefer-dist

      - name: Check coding standard
        run: php-cs-fixer fix --dry-run --diff
```

## PHP-CS-Fixer and PHP-8

To run PHP-CS-Fixer on PHP-8 you will need to set an environment variable that forces the php-cs-fixer command to ignore the environment requirement:

    PHP_CS_FIXER_IGNORE_ENV=1 php-cs-fixer fix --dry-run --diff

PHP-8 support in PHP-CS-Fixer is tracked here: https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues/4702.
