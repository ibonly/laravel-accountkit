*Laravel Facebook Account Kit

composer require ibonly/facebook-account-kit


        Ibonly\FacebookAccountKit\FacebookAccountKitServiceProvider::class,


        
        'AccountKit' => Ibonly\FacebookAccountKit\Facades\FacebookAccountKitFacade::class,


php artisan vendor:publish

##How to use
> Use composer to Install
> Register the ServiceProvider - "Ibonly\FacebookAccountKit\FacebookAccountKitServiceProvider"
> Register the Facade - "'AccountKit' =>Illuminate\Support\Facades\AccountKit::class"
