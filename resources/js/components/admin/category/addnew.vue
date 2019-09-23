<template>
    <div>
        <section class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="offset-md-2 col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Category</h3>
                                <h6 class="text-right">
                                    <router-link to="categorylist">Back</router-link>
                                </h6>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" @submit.prevent="addnewcat">
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

        data () {
            return {
              // Create a new form instance
              form: new Form({
                name: '',
                status: 0,
              })
            }
          },
        methods: {
            addnewcat () {
              // Submit the form via a POST request
              this.form.post('/addcategory')
                .then(({ data }) => { 
                    this.$router.push('/categorylist');
                    Toast.fire({
                      type: 'success',
                      title: 'Category added in successfully'
                    })
                })
                .catch(({ data }) => { 
                    console.log(error) 
                })           
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
  
</style>