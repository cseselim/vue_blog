<template>
    <div>
        <section class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="offset-md-2 col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Post</h3>
                                <h6 class="text-right">
                                    <router-link to="postlist">Back</router-link>
                                </h6>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" @submit.prevent="addnewpost">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    </div>
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select class="form-control" v-model="form.category_id" name="category_id">
                                          <option value="1">option 1</option>
                                          <option value="2">option 2</option>
                                          <option value="3">option 3</option>
                                          <option value="4">option 4</option>
                                          <option value="5">option 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Discription</label>
                                        <textarea class="textarea" placeholder="Enter discription here" style="width: 100%; height: 200px; font-size: 14px;line-height: 18px; border: 1px solid #dddddd; padding: 10px;" v-model="form.description" name="description">        
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="form.status" name="status">
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
                title:'',
                category_id:'',
                description:'',
                image:'',


              })
            }
        },

        methods: {
            /*addnewpost () {
              // Submit the form via a POST request
              this.form.post('/addnewpost')
                .then(({ data }) => { 
                    this.$router.push('/postlist');
                    Toast.fire({
                      type: 'success',
                      title: 'Post created successfully'
                    })
                })
                .catch(({ data }) => { 
                    console.log(error) 
                })           
            }*/
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>