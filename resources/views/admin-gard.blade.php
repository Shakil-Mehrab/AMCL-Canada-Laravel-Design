//config/auth 


//controller
Auth\AdminLoginController
Auth\AdminForgotPasswordController
Auth\AdminResetPasswordController

Admin\AdminController

//route
Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});


//Model
Admin
ekhane giye kaj koro

//Middleware 
Middleware/RedirectIfAuthenticate
Middleware/Admin


//Lv/frm/src/Illu/foundation/exception/handler

//table
admin table

//Admin Input
Php artisan tinker
$admin =new App\Admin
$admin->name=”Shakil Mehrab”
$admin->email=”Shakil Mehrab”
$admin->job_title=”Shakil Mehrab”
$admin->password=bcrypt(”123456”)
$admin->save():




//Reset password
php artisan make:notification AdminRestPasswordNotification


//delete in controller
 public function getDeleteCategory($id)
    {
        if(Auth::guard('admin')){
        $category=Category::find($id);
        $category->delete();
        return redirect()->back()->withMessage("Category  Deleted !");
        }
        return redirect()->back()->withMessage("You can't Delete !");
    }
//Middleware for route
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('admin')->check()){
            return $next($request);

        }
        return redirect('/admin/login');
    }
}
//App\Http\Kernel
'admin' => \App\Http\Middleware\Admin::class,
