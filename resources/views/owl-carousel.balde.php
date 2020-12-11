<link rel="stylesheet" href="./css/owl.carousel.min.css">
<link rel="stylesheet" href="./css/owl.theme.default.min.css">
<section>
    <div class="blog">
        <div class="container">
            <div class="owl-carousel owl-theme blog-post">
                <div class="blog-content">
                    <img src="./assets/1.jpg" alt="">
                    <div class="blog-title">
                        <h3>London Fashion</h3>
                        <button class="btn btn-blog">Fashion</button>
                        <span>2 minutes</span>
                    </div>
                </div>
                <div class="blog-content">
                    <img src="./assets/2.jpg" alt="">
                    <div class="blog-title">
                        <h3>London Fashion</h3>
                        <button class="btn btn-blog">Fashion</button>
                        <span>2 minutes</span>
                    </div>
                </div>
                <div class="blog-content">
                    <img src="./assets/3.jpg" alt="">
                    <div class="blog-title">
                        <h3>London Fashion</h3>
                        <button class="btn btn-blog">Fashion</button>
                        <span>2 minutes</span>
                    </div>
                </div>
                <div class="blog-content">
                    <img src="./assets/4.jpg" alt="">
                    <div class="blog-title">
                        <h3>London Fashion</h3>
                        <button class="btn btn-blog">Fashion</button>
                        <span>2 minutes</span>
                    </div>
                </div>
            </div>
            <div class="owl-navigation">
                <span class="owl-nav-prev left-0"><i class="fas fa-long-arrow-alt-left"></i></span>
                <span class="owl-nav-next right-0"><i class="fas fa-long-arrow-alt-right"></i></span>
            </div>
        </div>
    </div>
</section>
<script src="./js/jquery-2.2.4.min.js"></script>
<script src="./js/owl.carousel.min.js"></script>
<script src="./js/main.js"></script>




<!-- Shakil  Used in musium -->
https://ssense.github.io/vue-carousel/guide/  
npm install -S vue-carousel
<!-- app.js -->
import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);
<!-- component -->
<template>
  <div class="container-fluid">
    <carousel
      class="home-slider"
      :per-page="1"
      :autoplay="true"
      :autoplayTimeout="5000"
      :loop="true"
      :navigationEnabled="true"
    >
      <slide v-for="slide in slides" :key="slide.id">
        <div>
          <img
            class="img-responsive"
            src="https://picsum.photos/600/300"
            alt="Awesome Image"
          />
        </div>
      </slide>
    </carousel>
  </div>
</template>
<script>
export default {
  props: {
    slides: {
      required: true,
      type: Object / Array
    }
  }
};
</script>
<style>
.home-slider .VueCarousel-navigation-button {
  color: tomato;
}
.home-slider .VueCarousel-navigation-prev {
  left: 30px;
}
.home-slider .VueCarousel-navigation-prev {
  right: 50px;
}
</style>

//nicher ta lage na cz ami globally Carousel define korchi means in app.js
<!-- import { Carousel, Slide } from 'vue-carousel';
export default {
  components: {
    Carousel,
    Slide
  }
};
 -->






<!-- //nicher ta temon sujog nei -->
https://www.npmjs.com/package/vue-slick-carousel
npm i vue-slick-carousel
<script>
  import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
  export default {
    name: 'MyComponent',
    components: { VueSlickCarousel },
  }
</script> 
https://codesandbox.io/s/github/kyuwoo-choi/nuxt-vue-slick-carousel-example
<template>
  <div class="carousel-wrapper">
    <VueSlickCarousel v-bind="slickOptions">
      <div v-for="i in 5" :key="i" class="img-wrapper">
        <img :src="`./${i}-200x100.jpg`" />
      </div>
    </VueSlickCarousel>
  </div>
</template>
<script>
export default {
  data() {
    return {
      slickOptions: {
        slidesToShow: 3,
        arrows: false
      }
    }
  }
}
</script>
<style>
.carousel-wrapper {
  padding: 40px;
}
.img-wrapper img {
  margin: auto;
  width: 200px;
  height: 100px;
  background-image: linear-gradient(gray 100%, transparent 0);
}
</style>
