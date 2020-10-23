<?php

namespace App\Providers;

use App\Http\View\Composers\ChanelsComposer;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // composer view
        // every single view option 1
        // View::share('products',Product::all());
        // granular view with wilcard option 2
        // View::composer(['welcome','layuts.create'],function($view){
        //     $view->with('products',Product::all());
        // });
        // View::composer(['layuts.*'],function($view){
        //     $view->with('products',Product::all());
        // });
        // option 3 dedicated class
        View::composer(['welcome','layuts.create'],ChanelsComposer::class);
    }
}

<?php

namespace App\Http\View\Composers;

use App\Models\Product;
use Illuminate\View\View;

class ChanelsComposer
{
    public function compose(View $view){
        $view->with('products',Product::all());
    }
}
