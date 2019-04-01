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

