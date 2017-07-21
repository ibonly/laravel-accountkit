# Laravel Facebook Account Kit
[![License](http://img.shields.io/:license-mit-blue.svg)](https://github.com/andela-sakande/PotatoORM/blob/master/LICENSE)

A simple package to make Password-less Login possible in Laravel using [Facebook's Account Kit](https://developers.facebook.com/docs/accountkit). 

See Example [Here](lagosworkshop.herokuapp.com).

## Requirements
>php 5.6+

>Composer

>Laravel

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

## Usage
Create your app on Facebook following guidelines [here](https://developers.facebook.com/docs/accountkit).

You can view example [here](https://m.dotdev.co/implementing-account-kit-in-laravel-a40fbce516ad).

Define your route in `routes/web.php`. E.g:
```php
Route::post('/otp-login', 'LoginController@otpLogin');
```

Import the package in your Controller and use it therein. E.g:
```php
use AccountKit;
use Illuminate\Http\Request;

class LoginController extends Controller
{
...
    public function otpLogin(Request $request)
    {
        $otpLogin = AccountKit::accountKitData($request->code);
        ...
    }
}
```
The above return an array similar to this:
```php
[▼
  "id" => "1802782826673865"
  "phoneNumber" => "+234XXXXXXXXXXX",
  "email" => "",
  "access_token" => 
]
```
## Testing

``` bash
$ vendor/bin/phpunit test
```

## Credits

This package is maintained by [`Ibrahim Adeniyi`](ibonly01@gmail.com) and [`Surajudeen AKANDE`](surajudeen.akande@andela.com).

## License

This package is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for details.