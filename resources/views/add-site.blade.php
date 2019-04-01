//https://github.com/lazychaser/laravel-nestedset#installation
composer require kalnoy/nestedset >>gitbashe run
//table
//vendor/kalnoy/nestedset/src/nestedset
use Kalnoy\Nestedset\NestedSet;

Schema::create('table', function (Blueprint $table) {

    NestedSet::columns($table);
});
//Model
use Kalnoy\Nestedset\NodeTrait;

use NodeTrait;
    protected $fillable=['name','slug'];

    public function getRouteKeyName()
  {
    return 'slug';
  }
//database seeder
  public function run()
    {
        $this->call(AreaTableSeeder::class);
    }
//Seeder
php artisan make AreaTableSeeder
 $areas=[
            [
             'name'=>'US',
             'children'=>[
                 [
                     'name'=>'Albama',
                     'children'=>[
                     	['name'=>'Auburn'],
                     	['name'=>'Birmingam'],
                     
                     ],
                 ],
                 [
                     'name'=>'Alaska',
                     'children'=>[
                     	['name'=>'Barisal'],
                     	
                     ],
                 ],
                 [
                     'name'=>'Khulna',
                     'children'=>[
                     	['name'=>'Sonadanga'],
                     	
                     ],
                 ],
                 [
                     'name'=>'Dhaka',
                     'children'=>[
                     	['name'=>'Mirpur'],
                     
                     ],
                 ],
               ],
            ],
        ];

       foreach($areas as $area){
       	\App\Area::create($area);
       }
    }
//App service provider
 public function boot()
    {
        \App\Area::creating(function($area){

           $prefix=$area->parent ? $area->parent->name.' ':'';
           $area->slug=str_slug($prefix.$area->name);
        });
    }