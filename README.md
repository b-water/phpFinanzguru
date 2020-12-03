# phpFinanzguru (Work in Progress)

phpFinanzguru reads the Excel Files of the Finanzguru App giving you a flexible API to work with your Data.

### Installing

For now add this repo to your composer.json

```
"repositories":[
    {
        "type": "vcs",
        "url": "git@github.com:b-water/phpFinanzguru.git"
    }
],
```

and

```
    "require": {
        ...
        "b-water/php-finanzguru": "dev-master"
    },
```

So far didnt setup a package.

### How to Use

Just instance a new Reader Object with your Finanzguru Excel Export

```
try {
    $reader = new Reader($file->getRealPath());
    $collection = $reader->getCollection();
} catch (Throwable $t) {
    die($t);
}
```

This will return a Collection Instance representing all of your transactions

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details