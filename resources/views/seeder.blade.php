Php artisan make:model  App/Product -a
//factory ( https://github.com/fzaninotto/Faker)

migration/factory
return [
       	'heading' => $faker->sentence,
        'media' => $faker->word,
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl,
        'views' => $faker->numberBetween(1,100),
        'user_id' => function(){
            return App\User::all()->random();
        },
        'category_id' => function(){
            return App\Model\Category::all()->random();
        }
    ];

//migration/seeder
factory(App\Model\News::class,50)->create();

php artisan db:seed
php artisan migration:refresh
