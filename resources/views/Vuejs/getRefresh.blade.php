<template>
    <div class="container">
        <ul class="list-group">
          <li href="#" class="list-group-item active">
            <h4>All Todo Tasks<span class="pull-right"><a class="btn btn-success btn-xs" data-toggle="modal" href="#addModal">+</a></span></h4>
          </li>
          <li href="#" class="list-group-item" v-for="t in tasks.data">{{t.id}}-{{t.name}}
          	<span class="pull-right"><button class="btn btn-primary btn-xs">Edit</button>|<button class="btn btn-danger btn-xs">Delete</button>|<button class="btn btn-info btn-xs">Preview</button></span></li>
          	<pagination :data="tasks" v-on:pagination-change-page="getResults"></pagination>
        </ul>
        <div id="modal">
        	<addtask @recordadded="refreshRecord"></addtask>
        </div>
    </div>
</template>

<script>
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addtask', require('./addModalComponent.vue').default);

    export default {
        data(){
            return{
               tasks:[],
            }
        },
        methods:{
		getResults(page) {
			if(typeof page==='undefined'){
				page=1;
			}
			axios.get('http://localhost:8000/tasks?page=' + page)
			.then(response =>this.tasks = response.data)
        	.catch(error=>console.log(error));
			},
			refreshRecord(record){
				this.tasks=record.data
			}
        },
        created() {
        	axios.get('http://localhost:8000/tasks')
        	.then(response=>this.tasks=response.data)
        	.catch(error=>console.log(error));
            console.log('Task Component Loaded.')
        }
    }
</script>
<style scoped>
h4{
    color:white;
}
</style>