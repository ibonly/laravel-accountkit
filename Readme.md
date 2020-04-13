# Account Kit services no longer available starting in March - [click here](https://developers.facebook.com/blog/post/2019/09/09/account-kit-services-no-longer-available-starting-march)

# Laravel Facebook Account Kit
[![License](http://img.shields.io/:license-mit-blue.svg)](https://github.com/andela-sakande/PotatoORM/blob/master/LICENSE)

A simple package to make Password-less Login possible in Laravel using [Facebook's Account Kit](https://developers.facebook.com/docs/accountkit).

See Example [Here](https://akantkit.herokuapp.com).

## Requirements
>php 7.0+

>Composer

>Laravel 5.x

## Installation
To use this package in a Laravel Project, install via [Composer](https://getcomposer.org/)
```bash
$ composer require ibonly/laravel-accountkit
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
$ php artisan vendor:publish --provider="Ibonly\FacebookAccountKit\FacebookAccountKitServiceProvider"
```

## Usage
Create your app on Facebook following guidelines [here](https://developers.facebook.com/docs/accountkit).

You can view example [here](https://m.dotdev.co/implementing-account-kit-in-laravel-a40fbce516ad).

Update `.env` file with credentials from Facebook:
```env
ACCOUNTKIT_APP_ID=XXXXXXXXXXXX
ACCOUNTKIT_APP_SECRET=XXXXXXXXXXXXXXXXXXXXXXXX
```

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
  "email" => ""
]
```

### Views
Update the `public/js/accountkit.js` file with your `appId`. Same as the one in your env.

Ensure you add Accounkit SDK to your HTML file:
```html
<script type="text/javascript" src="https://sdk.accountkit.com/en_US/sdk.js"></script>
```
Ensure your form has `csrf_token` , hidden input `code` along with email and phone number inputs. E.g:
```html
<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
<input type="hidden" name="code" id="code" />
```

## Testing

Run any of the following commands in your terminal.
```bash
$ composer test
```

## Credits

This package is maintained by [Ibrahim Adeniyi](ibonly01@gmail.com) and [Surajudeen AKANDE](surajudeen.akande@andela.com).

## Contributing

Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.
## Change log

Please check out [CHANGELOG](CHANGELOG.md) file for information on what has changed recently.
## License

This package is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for details.
