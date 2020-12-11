//node
node -v
npm -v
https://nodejs.org/en/download/

//auth
composer require laravel/ui --dev
php artisan ui vue --auth
////////////vuex install
https://vuex.vuejs.org/installation.html
npm install vuex --save
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

//lte install
https://adminlte.io/docs/2.4/installation
https://github.com/ColorlibHQ/AdminLTE/releases
 v3.0.1
 npm install admin-lte@v3.0.1 --save
 //resource/js/app
    require('admin-lte');

 ///////////resorce/sass/app
@import url('https://fonts.googleapis.com/css?family=Nunito');
// Variables
@import 'variables';
// Bootstrap
@import '~bootstrap/scss/bootstrap';
@import '~admin-lte/dist/css/adminlte.css';
///////////////////js/bootstrap.js

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
    require('admin-lte');
} catch (e){}


///////////////////////////vue router install/install
https://router.vuejs.org/guide/
npm install vue-router

///////////////////////////app.js
require('./bootstrap');
window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use(Vuex)

import storeData from "./store/index"
const store = new Vuex.Store(
  storeData
)
import {filter} from './filter'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './route';
const router = new VueRouter({
  routes, // short for `routes: routes`
  mode:'hash'//by detault # mode  //you can use history

})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-master', require('./components/user/userMaster.vue').default);
Vue.component('admin-master', require('./components/Admin/adminMaster.vue').default);

import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form=Form;

import Swal from 'sweetalert2'
window.Swal=Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
const app = new Vue({
    el: '#app',
    router,
    store
});



///////////////////////////////////////v-form
https://github.com/cretueusebiu/vform
npm i axios vform
//ap.js
import { Form, HasError, AlertError } from 'vform'
window.Form=Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
//form//
<form role="form"  @submit.prevent="addCategory()">
<input type="text" class="form-control" id="name" name="name" placeholder="Category Name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
<has-error :form="form" field="name"></has-error>
<input type="submit">
</form>
//////////////////////////////create
<script>
  export default{
    name:"store",
    data () {
          return {
            form: new Form({
              name: '',
              brand: '',
              price: '',
              qty: '',
              min_order: '',
              max_order: '',
              discount: '',
              size: '',
              category_id: '',
              detail: '',
            })
          }
      },
    mounted(){
      this.$store.dispatch("showCategory")
    },
    computed:{
      getallCategory(){
            return this.$store.getters.getCategory
        }
    },
    methods:{
        addProduct(){
          this.form.post('user/product')
          .then((response)=>{
            this.$router.push('/edit/product/image/'+response.data.product)
            Toast.fire({
              icon: 'success',
              title: 'Product Added Successfully!'
            })
        })
          .catch(()=>{})
        }
    }
  };
</script>
//////////////////////////////update
<script>
  export default{
    name:"store",
    data () {
        return {
          // Create a new form instance
          form: new Form({
            name: '',
            brand: '',
            price: '',
            qty: '',
            min_order: '',
            max_order: '',
            discount: '',
            size: '',
            category_id: '',
            detail: '',

          })
        }
    },
    mounted(){
      this.$store.dispatch("showCategory")
      axios.get(`user/product/${this.$route.params.id}/edit`)
      .then((response)=>{this.form.fill(response.data.product);})
      .catch(()=>{})
    },
    computed:{
      getallCategory(){return this.$store.getters.getCategory}
    },
    methods:{
        editProduct(){
            this.form.post(`user/product/update/${this.$route.params.id}`)
            .then((response)=>{
              // this.$router.push('/edit/product/image/'+response.data.product)
              Toast.fire({
                icon: 'success',
                title: 'Product Updated Successfully!'
              })
            })
            .catch(()=>{})
        }
    }
  };
</script>




//sweet alert//
https://sweetalert2.github.io/
//install
npm install sweetalert2
//app.js
import Swal from 'sweetalert2'
window.Swal=Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast;


//shoing from database//
https://vuex.vuejs.org/
npm install vuex --save
//app
import Vue from 'vue'//already required.so doesn't need
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
	storeData
)

/////////////////////index.js
 export default{
  state: {
    product: [],
  },
  getters:{
    getProduct(state){
      return state.product;
    },
  },
  actions:{
    showProduct(context){
       axios.get('/user/product')
       .then((response)=>{context.commit('products',response.data.products)})
    },
  },
  mutations: {
    products(state,data) {
      return state.product=data;
    },
  },
 }
 
///////////////////////route.js
import userHome from './components/user/userHome.vue';
export const routes = [
  { path: '/home', component: userHome },
]
 
 ////////////////////////moment
https://momentjs.com/
npm install moment --save 
//ap.js
import {filter} from './filter'
//filter.js
import moment from 'moment'
import Vue from 'vue'

Vue.filter('timeformat',(arg)=>{
  return moment(arg).format("MMM Do YY");    
})
Vue.filter('shortlength',function(text,length,suffix){
  return text.substring(0,length)+suffix;    
})


<!-- //fragment -->
https://github.com/Thunberg087/vue-fragment#readme
npm i -s vue-fragment
//app.js
import Fragment from 'vue-fragment'
Vue.use(Fragment.Plugin)

export const MyComponent {
  template: '
  <fragment>
    <input type="text" v-model="message">
    <span>{{ message }}</span>
  </fragment>
  ',
  data() { return { message: 'hello world }}
}


//npm un install hoy
npm uninstall package_name -S
or 
package.json a giye line kete dao then npm update

//composer remove hoy
composer remove package_name -S
or 
composer.json a giye line kete dao then composer update

<!-- $ not defined -->
https://stackoverflow.com/questions/37928998/how-to-use-a-jquery-plugin-inside-vue
npm install jquery --save  //enough


01757825949=chaim (sala)

<!-- sweet alert -->
npm install sweetalert --save
import swal from 'sweetalert';

await axios
    .post("/api/client/store", this.form)
    .then(response => {
      swal("Thank you ");
    })
    .catch(() => {});
}