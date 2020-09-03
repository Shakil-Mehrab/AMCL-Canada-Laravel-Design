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



    <!-- vuex -->
    https://github.com/s950329/vue-owl-carousel


<carousel :items="4">

    <img src="https://placeimg.com/200/200/any?1">

    <img src="https://placeimg.com/200/200/any?2">

    <img src="https://placeimg.com/200/200/any?3">

    <img src="https://placeimg.com/200/200/any?4">

</carousel>

import carousel from 'vue-owl-carousel'
    components:{
      components: { carousel },
    },