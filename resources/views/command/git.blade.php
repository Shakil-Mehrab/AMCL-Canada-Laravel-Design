  Php artisan make:model  App/Product -a
1.Migration a factory hobe.Okhane faker libray anujayi db table er column heading guli sapi a je vabe dekhano hoyeche ovabe  krte hobe.( https://github.com/fzaninotto/Faker)
2.sedder a giye kaj krte hobe
3.php artisan db:seed

Git Init
Open git ignore in folder blog and cut the vendor option 
add . //add all er jonno nicher command ti likho
//j kono repositary te jao 
colone option a gele previous existing repositary chibe
okhane repositary er link diye "change repositary" click koro

git remote add origin https://github.com/Shakil-Mehrab/api.git>git push -u origin master
route api update:
database ekta foldare rekhe git add . dao.
git init>status>add .>status >commit -m “Created Model -a”> git status will show clean>git push

php artisan tinker//change to mood of query
create Resource:  php artisan make:resource Product/ProductCollection
Request:php artisan make:request ProductRequest

//already esist problem sove
git remote rm origin
git remote rm upstream

//index.lok remove
git folder er position dekhabe okhane giye hidden file show korale
.git a giye index.lok delete krte hobe
create all in one command
php artisan make:model Model/Shop -a

table a kichu new field add and migration
php artisan migrate:rollback
php artisan migrate

mail with template
php artisan make:mail Shuper --markdown=mail.admin.shop.cativation

policy
php artisan make:policy ShopPolicy --model=Model/Shop
storage,public link
php artisan storage:link

create table 
php artisan make:migration create_product_variation_order_table --create=product_variation_order

stock view
php artisan make:migration create_product_variation_stock_view

generate event
event servce provider a jao.then folder thik koro
php artisan event:generate

old version of laravel
composer create-project laravel/laravel TwitterClone "7.0.*"


//npm un install hoy
npm uninstall package_name -S
or 
package.json a giye line kete dao then npm update

//composer remove hoy
composer remove package_name -S
or 
composer.json a giye line kete dao then composer update