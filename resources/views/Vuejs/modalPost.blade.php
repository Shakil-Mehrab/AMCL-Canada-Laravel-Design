<template>
        <div id="addModal" class="modal fade" tabindex="-1" role="dialog" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" @click="clearModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add Task</h4>
                  </div>
                   <div class="modal-body">
                    <p class="alert alert-success" v-if="success.length>0">{{success}}</p>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <textarea type="text" class="form-control" name="name" id="name"   v-model="record"></textarea>
                            <ul v-if="errors.name" class="list-unstyled">
                              <li v-for="err of errors.name" class="alert alert-danger">{{err}}</li>
                            </ul>
                        </div>
                   </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="addRecord">Save changes</button>
              </div>
            </div>
          </div>
        </div>
</template>

<script>
    export default {
        // mounted() {
        //     console.log('Modal Component mounted.')
        // },
        data(){
            return{
                success:"",
                errors:[],
                record:"",
            }
        },
         methods:{
              addRecord(){
                axios.post('http://localhost:8000/tasks',{
                  "name":this.record,
                })
                .then(data =>{
                  this.$emit('recordadded',data);
                  this.success="Task Added Successfully";
                  this.record='';               
                  this.errors=[];

                })
                .catch(error=>{
                  this.errors=error.response.data.errors;
                  console.log(this.errors);
                })
              },
              clearModal(){
                this.errors=[];
                this.record='';               
                this.success="";
              }
            }
    }
</script>
<style>
h4{
    color:white;
}
</style>