# Laravel Facebook Account Kit
A simple package to make Two-Factor Authentication possible in Laravel using [Facebook's Account Kit](https://developers.facebook.com/docs/accountkit). 

See Example [Here](lagosworkshop.herokuapp.com).


## Installation
To use this package in a Laravel Project, install via [Composer](https://getcomposer.org/)
```bash
$ composer require ibonly/facebook-account-kit
```
Register the package to the [Service Provider](https://laravel.com/docs/5.4/providers) in the `config/app.php` file:
```php
'providers' => [
    ...
    Ibonly\FacebookAccountKit\FacebookAccountKitServiceProvider::class,
], 

'aliases' => [
    ...
    'AccountKit' => Ibonly\FacebookAccountKit\Facades\FacebookAccountKitFacade::class,
],
```
You can make of some assets provided in this package to speed up your implementation:
run
```bash
$ php artisan vendor:publish
```
## Credits

This package is maintained by [`Ibrahim Adeniyi`](ibonly01@gmail.com) and [`Surajudeen AKANDE`](surajudeen.akande@andela.com).
