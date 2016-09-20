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


## Submit to Packagist.

1. Register an account with GitHub & Packagist

2. To submit packages to Packagist, you need to push your source code to Git / Svn platform - GitHub, BitBucket, GitLab or any version control platform.

3. Once you have a repository, copy the URL to the repository and in Packagist (you need to login), click on **Submit** menu. You will have an input to insert your repository URL. Paste the URL you just copy in the input and click Submit.

4. Once submitted, wait for Packagist to verify your repository - if it's ok, just proceed and you're done.

**Next step is to have automatic update to your Packagist package via GitHub Settings > Integration & Services**

1. Open up your repository in Git platform and go to `Settings` and click on `Integration and Services`. Click add a new service - find Packagist.

2. Next, put in your Packagist username, token(get from Packagist > Profile) and the domain is `https://packagist.org`.

3. Then save the service. You need to click on `Test Service` in order to make the service running and then you're done.

**p/s: You may want to add some instruction in your `readme.md` and also add some tagging in your package.**



