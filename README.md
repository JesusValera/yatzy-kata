# PHP version of Yatzy Refactoring Kata

This is the PHP version of the Yatzy Refactoring Kata.

Your task is to score a GIVEN roll in a GIVEN category. You do NOT have to program the random dice rolling.
The game is NOT played by letting the computer choose the highest scoring category for a given roll.

## Installation

The kata uses:

- [PHP 7.3 or 7.4 or 8.0+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Clone the repository

Install all the dependencies using composer

```sh
composer install
```

Run all the tests

```shell script
composer test
```

## Dependencies

The kata uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard)

## Folders

- `src` - contains the Yatzy class which need to be refactored.
- `tests` - contains the corresponding tests. All the tests are passing, however the tests could be improved.

## Testing

PHPUnit is pre-configured to run tests. PHPUnit can be run using a composer script. To run the unit tests, from the root
of the PHP kata run:

```shell script
composer test
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening /builds/**index.html** in your browser.

## Code Standard

Easy Coding Standard (ECS) is used to check for style and code standards, **PSR-12** is used.

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
```

### Fix Code

There are many code fixes automatically provided by ECS, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan
```

**Happy coding**!
