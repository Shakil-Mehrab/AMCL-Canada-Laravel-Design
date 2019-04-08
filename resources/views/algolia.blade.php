
//package
composer require laravel/scout
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
//algolia
https://www.algolia.com

https://www.algolia.com/dashboard
//config/scout
   'queue' => true,
    'algolia' => [
            'id' => env('ALGOLIA_APP_ID', ''),
            'secret' => env('ALGOLIA_SECRET', ''),
        ],  
//env te copy krte hobe ID and Admin Api key from algolia


//Model
<?php

namespace App;

use Laravel\Scout\Searchable;

class News extends Model
{
	use Searchable;
	public function searchableAs()
    {
        return 'News';
    }
    public function toSearchableArray()
                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    {
        $listins = $this->toArray();
        $listins['created_at_human']=$this->created_at->diffForHumans();
        $listins['user']=$this->user;
        $listins['category']=$this->category;
        $listins['news']=$this->news;
        return $listins;
    }
}

composer require algolia/algoliasearch-client-php:^2.2
php artisan scout:import "App\Listing"

 npm install algoliasearch --save
 npm install autocomplete.js --save

//vue file
js/component/search.vue
///js/app.js
Vue.component('search-component', require('./components/search.vue').default);
//jekhane show krte hobe sekhane 
<search-component :area-ids="{{$products->pluck('id')}}"></search-component>


