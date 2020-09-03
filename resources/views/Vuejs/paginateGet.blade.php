 <template>
    <div id="publicview">
        <NavLoad/>
        <CategoryLoad/>
        <div class="electro-product-wrapper wrapper-padding pt-95 pb-45">
            <div class="container-fluid">
                <div class="section-title-4 text-center mb-40">
                    <h2>Top Products</h2>
                </div>
                <div class="top-product-style">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="electro1" role="tabpanel">
                            <div class="custom-row-2">
                                <div class="custom-col-style-2 custom-col-4" v-for="product in getBestProduct.data" :key="product.id">
                                    <div class="product-wrapper product-border mb-24">
                                        <div class="product-img-3">
                                            <router-link :to="`/single/product/${product.id}`">
                                            <img :src="`storage/${product.cover_img}`" alt="product">
                                            </router-link>
                                            <div class="product-action-right">
                                                <a class="animate-right" href="#" :data-target="`#exampleModal${product.id}`" data-toggle="modal" title="Quick View">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                                <a href='' @click.prevent="addToCart(product.id)" class="animate-top" title="Add To Cart">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                                <a class="animate-left" title="Wishlist" @click.prevent="addToWish(product.id)" href="">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                                <a class="animate-left" title="Add To Compare" @click.prevent="addToCompare(product.id)" href="">
                                                    <i class="pe-7s-repeat"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-4 text-center">
                                            <div class="product-rating-4">
                                               <star-rating :star-size="20" :rating="product.rating"></star-rating>
                                            </div>
                                            <h4><router-link :to="`/single/product/${product.id}`">{{product.name}}</router-link></h4>
                                            <!-- <span>{{product.description | replace}}</span> -->
                                            <h6>$ {{product.price}}</h6>
                                        </div>
                                    </div>

                                        <div class="modal fade" :id="`exampleModal${product.id}`" tabindex="-1" role="dialog" aria-hidden="true">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="pe-7s-close" aria-hidden="true"></span>
                                            </button>
                                            <div class="modal-dialog modal-quickview-width" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="qwick-view-left">
                                                            <div class="quick-view-learg-img">
                                                                <div class="quick-view-tab-content tab-content">
                                                                    <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                        <img :src="`storage/${product.cover_img}`" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="quick-view-list nav" role="tablist">
                                                                <!-- <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                                                    <img :src="`storage/${product.cover_img}`" style="width:110px;height:110px"  alt="">
                                                                </a>
                                                                <a href="#modal2" data-toggle="tab" role="tab">
                                                                    <img src="/assets/img/quick-view/s2.jpg" alt="">
                                                                </a> -->
                                                            </div>
                                                        </div>
                                                        <div class="qwick-view-right">
                                                            <div class="qwick-view-content">
                                                                <h3>{{product.name}}</h3>
                                                                <div class="price">
                                                                    <span class="new">$ {{product.sale_price}}</span>
                                                                    <span class="old">$ {{product.price}} </span>
                                                                </div>
                                                                <div class="rating-number">
                                                                <star-rating :star-size="20" :rating="product.rating" :read-only="true"></star-rating>
                                                                </div>
                                                                <p>{{product.description}}</p>
                                                                <div class="product-details-cati-tag mt-35">
                                                                    <ul>
                                                                        <li class="categories-title">Attributes :</li>
                                                                        <li v-for="attribute in product.product_attributes" :key="attribute.id">
                                                                            <a href="#">{{attribute.name}}</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="product-details-cati-tag mt-35">
                                                                    <ul>
                                                                        <li class="categories-title">Categories :</li>
                                                                        <li v-for="category in product.product_categories" :key="category.id"><a href="#"> {{category.name}} </a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="quickview-plus-minus">
                                                                    <div class="cart-plus-minus">
                                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                                    </div>
                                                                    <div class="quickview-btn-cart">
                                                                        <a class="btn-hover-black" @click.prevent="addToCart(product.id)" href="">add to cart</a>
                                                                    </div>
                                                                    <div class="quickview-btn-wishlist">
                                                                        <a class="btn-hover" @click.prevent="addToWish(product.id)" href=""><i class="pe-7s-like"></i></a>
                                                                    </div>
                                                                    <div class="quickview-btn-wishlist">
                                                                        <a class="btn-hover" @click.prevent="addToCompare(product.id)" href=""><i class="pe-7s-repeat"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <pagination :data="getBestProduct" v-on:pagination-change-page="showBestProduct"></pagination>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="electro-product-wrapper wrapper-padding pt-95 pb-45">
    <div class="container-fluid">
        <div class="section-title-4 text-center mb-40">
            <h2>Recent Collection</h2>
        </div>
        <div class="top-product-style">
            <div class="tab-content">
                <div class="tab-pane active show fade" id="electro2" role="tabpanel">
                    <div class="custom-row-2">
                        <div class="custom-col-style-2 custom-col-4" v-for="product in getRecentProduct.data" :key="product.id">
                            <div class="product-wrapper product-border mb-24">
                                <div class="product-img-3">
                                    <router-link :to="`/single/product/${product.id}`">
                                    <img :src="`storage/${product.cover_img}`" alt="product">
                                    </router-link>
                                    <div class="product-action-right">
                                        <a class="animate-right" href="#" :data-target="`#exampleModal${product.id}`" data-toggle="modal" title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                        <a href='' @click.prevent="addToCart(product.id)" class="animate-top" title="Add To Cart">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                        <a class="animate-left" title="Wishlist" @click.prevent="addToWish(product.id)" href="">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a class="animate-left" title="Add To Compare" @click.prevent="addToCompare(product.id)" href="">
                                            <i class="pe-7s-repeat"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-4 text-center">
                                    <div class="product-rating-4">
                                       <star-rating :star-size="20" :rating="product.rating"></star-rating>
                                    </div>
                                    <h4><router-link :to="`/single/product/${product.id}`">{{product.name}}</router-link></h4>
                                    <!-- <span>{{product.description | replace}}</span> -->
                                    <h6>$ {{product.price}}</h6>
                                </div>
                            </div>

                                <div class="modal fade" :id="`exampleModal${product.id}`" tabindex="-1" role="dialog" aria-hidden="true">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="pe-7s-close" aria-hidden="true"></span>
                                    </button>
                                    <div class="modal-dialog modal-quickview-width" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="qwick-view-left">
                                                    <div class="quick-view-learg-img">
                                                        <div class="quick-view-tab-content tab-content">
                                                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                <img :src="`storage/${product.cover_img}`" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="quick-view-list nav" role="tablist">
                                                        <!-- <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                                            <img :src="`storage/${product.cover_img}`" style="width:110px;height:110px"  alt="">
                                                        </a>
                                                        <a href="#modal2" data-toggle="tab" role="tab">
                                                            <img src="/assets/img/quick-view/s2.jpg" alt="">
                                                        </a> -->
                                                    </div>
                                                </div>
                                                <div class="qwick-view-right">
                                                    <div class="qwick-view-content">
                                                        <h3>{{product.name}}</h3>
                                                        <div class="price">
                                                            <span class="new">$ {{product.sale_price}}</span>
                                                            <span class="old">$ {{product.price}} </span>
                                                        </div>
                                                        <div class="rating-number">
                                                        <star-rating :star-size="20" :rating="product.rating" :read-only="true"></star-rating>
                                                        </div>
                                                        <p>{{product.description}}</p>
                                                        <div class="product-details-cati-tag mt-35">
                                                            <ul>
                                                                <li class="categories-title">Attributes :</li>
                                                                <li v-for="attribute in product.product_attributes" :key="attribute.id">
                                                                    <a href="#">{{attribute.name}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-details-cati-tag mt-35">
                                                            <ul>
                                                                <li class="categories-title">Categories :</li>
                                                                <li v-for="category in product.product_categories" :key="category.id"><a href="#"> {{category.name}} </a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="quickview-plus-minus">
                                                            <div class="cart-plus-minus">
                                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                            </div>
                                                            <div class="quickview-btn-cart">
                                                                <a class="btn-hover-black" @click.prevent="addToCart(product.id)" href="">add to cart</a>
                                                            </div>
                                                            <div class="quickview-btn-wishlist">
                                                                <a class="btn-hover" @click.prevent="addToWish(product.id)" href=""><i class="pe-7s-like"></i></a>
                                                            </div>
                                                            <div class="quickview-btn-wishlist">
                                                                <a class="btn-hover" @click.prevent="addToCompare(product.id)" href=""><i class="pe-7s-repeat"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <pagination :data="getRecentProduct" v-on:pagination-change-page="showRecentProduct"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import NavLoad from "././includes/nav.vue"
import CategoryLoad from "././pages/category/category.vue"


export default {
    name: "PublicHome",
    components:{
      NavLoad,
      CategoryLoad
    },
    computed:{
        getBestProduct(){
            return this.$store.getters.getBestProduct
        },
        getFashionProduct(){
        return this.$store.getters.getFashionProduct
        },
        getRecentProduct(){
        return this.$store.getters.getRecentProduct
        },
        getPopularProduct(){
        return this.$store.getters.getPopularProduct
        },
        getBestSale(){
        return this.$store.getters.getBestSale
        },
        getAllTopRated(){
        return this.$store.getters.getAllTopRated
        },
        getDiscount(){
        return this.$store.getters.getDiscount
        },
        getDiscountAllProduct(){
        return this.$store.getters.getDiscountAllProduct
        },
    },
    methods:{
        showBestProduct(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showBestProduct',page);
        },
        showFashionProduct(){
          this.$store.dispatch('showFashionProduct');
        },
        showDiscount(){
          this.$store.dispatch('showDiscount');
        },
        showDiscountAllProduct(){
          this.$store.dispatch('showDiscountAllProduct');
        },
        showRecentProduct(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showRecentProduct',page);
        },
        showPopularProduct(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showPopularProduct',page);
        },
        showAllTopRated(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showAllTopRated',page);
        },
        showBestSale(page){
        if(typeof page==='undefined'){page=1;}
          this.$store.dispatch('showBestSale',page);
        },
        addToCart(id){
        console.log(id)
        axios.get('/user/cart/add/'+id)
        .then(()=>{
        this.$store.dispatch('showCartCount');
            Toast.fire({
            icon: 'success',
            title: 'Product Added to Cart!'
          })
      })
      .catch(()=>{})
      },
      addToWish(id){
        console.log(id)
        axios.get('/user/wish/add/'+id)
        .then(()=>{
        this.$store.dispatch('showAllWishProduct');
            Toast.fire({
            icon: 'success',
            title: 'Product Added to Wish!'
          })
      })
      .catch(()=>{})
      },
      addToCompare(id){
        console.log(id)
        axios.get('/user/compare/add/'+id)
        .then(()=>{
        this.$store.dispatch('showAllCompareProduct');
            Toast.fire({
            icon: 'success',
            title: 'Product Added to Compare!'
          })
      })
      .catch(()=>{})
      },
    },
    mounted(){
      this.showBestProduct();
      this.showFashionProduct();
      this.showRecentProduct();
      this.showPopularProduct();
      this.showBestSale();
      this.showAllTopRated();
      this.showDiscount();
      this.showDiscountAllProduct();
    // var click=document.getElementsByClassName('owl-item')['1'];
    // if(click.style.width==="330px"){
    //     click.style.width="160px"
    // }
    click.style.width="160px";
    },
};
</script>

<style scoped>
.custom-col-4 {
    max-width: 14%;
}
.custom-col-3 {
    max-width: 25%;
}
.col-xl-4 {
    max-width: 24.333333%;
}
 .cloned{
    width:165px;

}
.owl-item{
    width:165px;
}
.tab-content {
    border: none;
}
@media (max-width: 767px){
.custom-col-4 {
    max-width: 50%;
}
.custom-col-3 {
    max-width: 50%;
}
.col-xl-4 {
    max-width: 50%;
}
.extra-layout4.cus2 .col-pre {
    display: none;
}
}
#shakil .owl-stage .owl-item{
    width: 160px;
}
div.owl-item.active{background: red}
</style>
