https://github.com/avil13/vue-sweetalert2

//nuxt js 
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);
//method(){
message() {
      const Toast = this.$swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
      });
      Toast.fire({
        icon: "success",
        title: "Product Added Successfully!"
      });
    },
}
//call a function
this.store([
  {
    product_id: this.form.product_id,
    size_id: this.form.size_id,
    image: this.form.image,
    quantity: this.form.quantity
  }
])
  .then(response => (this.requiredErrors = "",this.message()))
  .catch(error => (this.requiredErrors = error.response.data.errors));
}