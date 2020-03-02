//node
node -v
npm -v
https://nodejs.org/en/download/

//auth
composer require laravel/ui --dev
php artisan ui vue --auth

//lte install
https://adminlte.io/docs/2.4/installation
https://github.com/ColorlibHQ/AdminLTE/releases
 v3.0.1
 npm install admin-lte@v3.0.1 --save
 //resource/js/app
    require('admin-lte');

 //resorce/sass/app
@import '~admin-lte/dist/css/adminlte.css';


//vue router install/install
https://router.vuejs.org/guide/
npm install vue-router

 //resource/js/app
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


//vue router install/getting started
const router = new VueRouter({
  routes // short for `routes: routes`
})
const app = new Vue({
    el: '#app',
    router
});
//remode #/ from link
const router = new VueRouter({
  routes // short for `routes: routes`
  mode:'history'//by default 'hash' #mode
})


//v-form
https://github.com/cretueusebiu/vform
npm i axios vform
//ap.js
import { Form, HasError, AlertError } from 'vform'
window.Form=Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
//form//
<form role="form"  @click.prevent="addCategory()">
<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" v-model="form.category_name" :class="{ 'is-invalid': form.errors.has('category_name') }">
<has-error :form="form" field="category_name"></has-error>
export default{
		name:"add",
		data () {
			    return {
			      // Create a new form instance
			      form: new Form({
			        category_name: ''
			      })
			    }
			},
		methods:{
                addCategory(){
                	// console.log('ok')
                	this.form.post('/add-category')
                	.then((response)=>{this.$router.push('/category-list')})
                	.catch(()=>{})
                }
		}
	}

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

adding to vue file
addCategory(){
                	// console.log('ok')
                	this.form.post('/add-category')
                	.then((response)=>{this.$router.push('/category-list')
                    Toast.fire({
                      icon: 'success',
                      title: 'Category Added Successfully!'
                    })
                })
                	.catch(()=>{})
                }

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

//index.js
 export default{
 	state: {
    category: "hlw i am here",
  },
  getters:{
    getCategory(state){
    	return state.category;
    }
  },
  actions:{

  },
  mutations: {
    increment (state) {
      state.count++
    }
  }
 }

 
 //moment
https://momentjs.com/