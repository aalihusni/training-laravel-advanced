# Step by step create Laravel Package

Create the directory structure in application

```
packages
	vendor
		package
			src
			.gitignore
```

Sample

```
packages
	nasrulhazim
		clean
			src
			.gitignore
```

**p/s: `.gitignore` is a file, not a directory**

Update application's `.gitignore` file to exclude `packages` directory

```
	/packages
	/node_modules
	/public/storage
	/vendor
	/.idea
	Homestead.json
	Homestead.yaml
	.env
``` 

Update package's `.gitignore` file as following

```
	/node_modules
	/public/storage
	/vendor
	/.idea
	Homestead.json
	Homestead.yaml
	.env
```

In package's directory, run `composer init`. just follow the questions being ask. You should have something like following:

```
{
    "name": "nasrulhazim/scaffold",
    "description": "Scaffold Generator for Laravel 5.3",
    "license": "MIT",
    "authors": [
        {
            "name": "Nasrul Hazim",
            "email": "nasrulhazim.m@gmail.com"
        }
    ],
    "minimum-stability": "dev",
    "require": {}
}
```

Create a service provider and move the new provider to the package's `src` directory

```
php artisan make:provider PackageServiceProvider
```

Open up the package's `composer.json`, and add in `autoload` in the file and save

```
	"autoload": {
        "psr-4": {
            "VendorName\\PackageName\\": "src/"
        }
    },
```

Open up the application's `composer.json`, and update the `autoload` in the file and save

```
	"autoload": {
        "psr-4": {
        	"App\\": "app/",
            "VendorName\\PackageName\\": "packages/vendor-name/package-name/src/"
        }
    },
```

Update the package's service provider (`src/Providers/PackageServiceProvider.php`) namespace 

```
namespace VendorName\PackageName\Providers;
```

Register our package in `config/app.php` in `providers` 

```
VendorName\PackageName\Providers\PackageServiceProvider::class,
```

Starting from this point, it's depends how you develop your package. You may want to just create some custom Artisan commands, you may use `$this->commands()` to register the commands with application.






