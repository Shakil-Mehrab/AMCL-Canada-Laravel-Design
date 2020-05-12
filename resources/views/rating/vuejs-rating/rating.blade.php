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







  //code
  <div id="app">

  <h2>Default</h2>
  <star-rating></star-rating>

  <h2>Half Stars</h2>
  <star-rating :increment="0.5"></star-rating>

  <h2>Bordered Stars</h2>
  <star-rating :border-width="3"></star-rating>

  <h2>Red Stars</h2>
  <star-rating active-color="#9c0000"></star-rating>

  <h2>Vibrant Stars</h2>
  <star-rating inactive-color="#e1bad9" active-color="#cc1166"></star-rating>

  <h2>Small Stars</h2>
  <star-rating :star-size="20"></star-rating>

  <h2>Big Stars</h2>
  <star-rating :star-size="90"></star-rating>

  <h2>Fluid Stars</h2>
  <star-rating :increment="0.01" :fixed-points="2"></star-rating>

  <h2>Preset Stars</h2>
  <star-rating :rating="4"></star-rating>


  <h2>Custom Star Shape</h2>
  <star-rating :border-width="4" border-color="#d8d8d8" :rounded-corners="true" :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>


  <h2>Non rounded start rating</h2>
  <star-rating :rating="4.67" :round-start-rating="false"></star-rating>

  <h2>Read Only Stars</h2>
  <star-rating :rating="3.8" :read-only="true" :increment="0.01"></star-rating>

  <h2>Lots of stars</h2>
  <star-rating :max-rating="10" :star-size="20"></star-rating>

  <h2>RTL Stars</h2>
  <star-rating :rtl="true" :increment="0.5"></star-rating>


  <h2>Style Rating</h2>
  <star-rating text-class="custom-text"></star-rating>

  <h2>Hide Rating</h2>
  <star-rating :show-rating="false"></star-rating>

  <h2>Inline Stars</h2> Rated
  <star-rating :inline="true" :star-size="20" :read-only="true" :show-rating="false" :rating="5"></star-rating> by our customers.

  <h2>Resetable stars with v-model (Vue 2.2+)</h2>
  <star-rating  ></star-rating>
  <div style="padding-top:10px;cursor:pointer;margin-bottom:20px;color: blue;"><a @click="boundRating = 0;">Reset Rating</a></div>


  <h2>Capture Rating</h2>
  <star-rating :show-rating="false" @rating-selected="setRating"></star-rating>
  <div style="margin-top:10px;font-weight:bold;">{{rating}}</div>

  <h2>Capture Mouse Over Rating</h2>
  <div @mouseleave="showCurrentRating(0)" style="display:inline-block;">
    <star-rating :show-rating="false" @current-rating="showCurrentRating" @rating-selected="setCurrentSelectedRating" :increment="0.5"></star-rating>
  </div>
  <div style="margin-top:10px;font-weight:bold;">{{currentRating}}</div>

  <h2>Glowing Stars</h2>
  <div style="background:#000;padding-bottom:10px;">

    <star-rating :glow="10" :rounded-corners="true" :star-points="[23,2, 14,17, 0,19, 10,34, 7,50, 23,43, 38,50, 36,34, 46,19, 31,17]"></star-rating>
  </div>
</div>