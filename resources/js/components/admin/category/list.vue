<template>
    <div>
      <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="font-size: 2.1rem;">Category List</h3>
              <div class="text-right">
              <router-link to="/addcategory" class="btn btn-primary" href="">Add New</router-link>
            </div>
            </div>
            
            <!-- /.card-header -->
            <div class="container">
              <div class="row">
                <div class="offset-md-2 col-md-8">
                  <div class="card-body">
              <table id="myTable1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for='(category,index) in allcategory' :key='category.id'>
                  <td>{{ index+1 }}</td>
                  <td>{{ category.name }}</td>
                  <td>
                    <router-link :to="'/editcategory/' + category.id">edit</router-link>
                    <a href="" @click.prevent="deletecat(category.id)">delete</a>
                  </td>
                </tr>

                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
                </div>
              </div>
            </div>
            
            <!-- /.card-body -->
          </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$store.dispatch('allcategory')
        },
        computed:{
          allcategory() {
            return this.$store.getters.getCategory
          }
        },
        methods:{
          deletecat(id){
            axios.get('/deletecategory/'+id)
            .then((response ) => { 
                this.$store.dispatch('allcategory')
                Toast.fire({
                  type: 'success',
                  title: 'Category delete successfully'
                })
            })
          }
        }
    }
</script>

<style scoped>
  
</style>