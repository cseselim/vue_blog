<template>
    <div>
        <section class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="offset-md-2 col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Category {{this.$route.params.id}}</h3>
                                <h6 class="text-right">
                                    <router-link to="categorylist">Back</router-link>
                                </h6>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" @submit.prevent="updatecategory()">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category" v-model="form.name" name="name" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="form.status" name="status" value="1">
                                        <label class="form-check-label" for="exampleCheck1">Status</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
    	name: "Edit",
    	mounted() {
            axios.get(`/editcategory/${this.$route.params.id}`)
            .then((response) => {
                this.form.fill(response.data.category)
            })  
        },

        data () {
            return {
              // Create a new form instance
              form: new Form({
                name:'',
                status: '',
              })
            }
          },
        methods: {
            updatecategory(){
                this.form.post(`/updatecategory/${this.$route.params.id}`)
                .then((response) => {
                this.$router.push('/categorylist');
                Toast.fire({
                  type: 'success',
                  title: 'Category Updated successfully'
                })
            })
            } 
        }
        
    }
</script>

<style scoped>
  
</style>