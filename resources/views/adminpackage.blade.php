https://voyager-docs.devdojo.com/getting-started/installation

composer require tcg/voyager


/////////////config/database
'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'vendor'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
///////////// AppServiceProvider
Schema::defaultStringLength(191);

/////////////.env
APP_URL=http://localhost:8000
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret


php artisan voyager:install  //it not too good.added by shakil
If you prefer installing it with the dummy data run the following command:
php artisan voyager:install --with-dummy    //it too good.added by shakil

/////////create admin
php artisan voyager:admin your@email.com --create

//////////dropdown
 "default" : "option1",
    "options" : {
        "pending": "Pending",
        "processing": "Processing",
        "complete": "complete",
        "decline": "Decline"
    }


    ////radio
    "on" : "Paid",
    "off" : "Not Paid",
    "checked" : true




    ////////image
    "resize": {
        "width": "1000",
        "height": null
    },
    "quality" : "70%",
    "upsize" : true,
    "thumbnails": [
        {
            "name": "medium",
            "scale": "50%"
        },
        {
            "name": "small",
            "scale": "25%"
        },
        {
            "name": "cropped",
            "crop": {
                "width": "300",
                "height": "250"
            }
        }
    ]




    //////////date time
    "format" : "%Y-%m-%d"
    //////////seeder will change all the setting in order page.to keep same you should do follows
    https://github.com/orangehill/iseed
    composer require orangehill/iseed
    //////////////create a gist
    php artisan iseed data_types,data_rows,categories,posts,pages,menus,menu_items,roles,users,user_roles,permissions,permission_role,settings



////////////////observer for trigering active status and sending mail
https://laravel.com/docs/7.x/eloquent#observers
php artisan make:observer ShopObserver --model=Model/Shop
//serviceProvider
<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Model\Shop;
use App\Observers\ShopObserver;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Shop::observe(ShopObserver::class);
    }
}



///////////controller for limit access.nijer chara onnerta dekhte parbe na
1.bread a giye controler add koro.example: App\Http\Controllers\Admin\ProductController

2.<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Events\BreadDataDeleted;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ProductController extends VoyagerBaseController
{
    

    public function index(Request $request)
    {
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope' . ucfirst($dataType->scope))) {
                $query = $model->{$dataType->scope}();
            } else {
                $query = $model::select('*');
            }

            //query to display seller's shop only

            if(auth()->user()->hasRole('seller')) {
                if(empty(auth()->user()->shop)){
                      abort(404);
                }
                $query->where('shop_id', auth()->user()->shop->id);
            }

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model)) && Auth::user()->can('delete', app($dataType->model_name))) {
                $usesSoftDeletes = true;

                if ($request->get('showSoftDeleted')) {
                    $showSoftDeleted = true;
                    $query = $query->withTrashed();
                }
            
   
}

////////////////policy er jonno route id change krte parbe na
command:php artisan make:policy ShopPolicy --model=Model/Shop

1.bread a giye policy add koro. example: App\Policies\ShopPolicy
2.
<?php

namespace App\Policies;

use App\Model\Shop;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    public function browse(User $user)
    {
        return $user->hasRole('seller');
    }


    public function read(User $user, Shop $shop)
    {
        return $user->id == $shop->user_id;
    }

    /**
     * Determine whether the user can update the shop.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
    public function edit(User $user, Shop $shop)
    {

        return $user->id == $shop->user_id;
    }


    /**
     * Determine whether the user can create shops.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function add(User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the shop.
     *
     * @param  \App\User  $user
     * @param  \App\Shop  $shop
     * @return mixed
     */
    public function delete(User $user, Shop $shop)
    {
        return $user->id == $shop->user_id;
    }


}

product policy
<?php

namespace App\Policies;

use App\Model\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{


    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    public function browse(User $user)
    {
        return $user->hasRole('seller');
    }


    public function read(User $user, Product $product)
    {
        if (empty($product->shop)) {
            return false;
        }

        return $user->id == $product->shop->user_id;
    }

    /**
     * Determine whether the user can update the Product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function edit(User $user, Product $product)
    {
        if(empty($product->shop)) {
            return false;
        }

        return $user->id == $product->shop->user_id;
    }


    /**
     * Determine whether the user can create Products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function add(User $user)
    {
        return $user->hasRole('seller');
    }

    /**
     * Determine whether the user can delete the Product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        if (empty($product->shop)) {
            return false;
        }

        return $user->id == $product->shop->user_id;
    }


}

/////////////custom edit file 
just make folder and edit code;
Example:
vendor/orders/read.blade.php(evabe order item show koro)
vendor/prodcts/edit-add.blade.php(evabe shop option disable koro .fole product add er somoy onner shop choose krte parbe na)


//////////////create model custom
in appserviceProviders
use TCG\Voyager\Facades\Voyager;

 public function register()
    {
        Voyager::useModel('Category', \App\Model\Category::class);

    }


    <?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Arr;
use TCG\Voyager\Models\Category as ModelsCategory;

class Category extends ModelsCategory
{
public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    } 
}



///////////seller role

Browse Admin

Menus
Browse Menus
Read Menus

Shops
Browse Shops
Read Shops
Edit Shops

Products
Browse Products
Read Products
Edit Products
Add Products
Delete Products



///////////database change
191 field ache joto

categories
data_types
postspages
translation
users


translation a tbl_name=255 column_name=255 locale=255

