<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        window.Laravel={!! json_encode([
              "csrfToken"=>csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
    <div class="container">
        <star-rating></star-rating>
      </div>
    </div>  
</body>
</html>
//link
https://github.com/craigh411/vue-star-rating
or
https://jsfiddle.net/craig_h_411/992o7cq5/
//install
npm install vue-star-rating

// in app.js
import StarRating from 'vue-star-rating'
Vue.component('star-rating', StarRating);

//database clean
php artisan migrate:refresh --seed

//resource/js/components/review-star.vue 

//Property/Model

 public function getStarRating(){
  
    $count=$this->comments()->count('star');
    if(empty($count)){
      return 0;
    }
    $total_star=$this->comments()->sum('star');
    foreach ($this->comments() as $comment) {
          $count=$count+$comment->replies()->count();
          $total_star=$total_star+$comment->replies()->sum('star');      
        }
    
    $average=$total_star/$count;
    return $average;
  }