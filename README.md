# Laravel 5 Workbench

### Version Compability

| Laravel Version | Workbench Version |
|-----------------|-------------------|
| 5.2.*           | 5.2.*             |
| 5.3.*           | 5.3.*             |
| 5.4.*           | 5.4.*             |
| 5.7.*           | 5.7.*             |

### Installation

You can install the package via composer command line by running this following command.

```
composer require --dev apollopy/workbench
```

After the package installed, add `ApolloPY\Workbench\WorkbenchServiceProvider` to your `providers` array in `config/app.php` file.

And the last, publish the package's configuration by running:

```
php artisan vendor:publish
```

That will publish the `workbench.php` config file to your `config/` folder and you need to set the name and email of package creators on it. 

## Autoloading Workbench

You can autoload the workbench by adding this following command to your `public/index.php` file.

```php
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Register The Workbench Loaders
|--------------------------------------------------------------------------
|
| The Laravel workbench provides a convenient place to develop packages
| when working locally. However we will need to load in the Composer
| auto-load files for the packages so that these can be used here.
|
*/
if (is_dir($workbench = __DIR__.'/../workbench') && class_exists(ApolloPY\Workbench\Starter::class)) {
    ApolloPY\Workbench\Starter::start($workbench);
}
```

### Creating A Package

> Before you create a package, you need to update `name` and `email` config value in your `config/workbench.php` file. 

Creating a basic package.

```
php artisan workbench vendor/package
```

Creating a package with generating some scaffold resources.

```
php artisan workbench vendor/package --resources
```

### Other Documentation

> For more documentation you can visit [the official laravel documentation](http://laravel.com/docs/5.2/packages)
