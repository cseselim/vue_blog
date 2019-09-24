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
                            <form method="post" @submit.prevent="addnewPost">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select class="form-control" v-model="form.category_id" name="category_id">
                                          <option value="" disabled >Select One</option>
                                          <option value="1" v-for='cat in allcategory'>{{ cat.name }}</option>
                                        </select>
                                        <has-error :form="form" field="category_id"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Discription</label>
                                        <textarea class="textarea" placeholder="Enter discription here" style="width: 100%; height: 200px; font-size: 14px;line-height: 18px; border: 1px solid #dddddd; padding: 10px;" v-model="form.description" name="description" :class="{ 'is-invalid': form.errors.has('description') }">        
                                        </textarea>
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                                
                                            </div>
                                            <!-- <img :src="form.image" alt="" width="80" height="80"> -->
                                            <has-error :form="form" field="category_id"></has-error>
                                        </div>
                                        <has-error :form="form" field="description"></has-error>
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
                title:'',
                category_id:'',
                description:'',
                image:'',
                status: '',
              })
            }
        },

        mounted() {
            this.$store.dispatch('allcategory')
        },
        computed:{
          allcategory() {
            return this.$store.getters.getCategory
          }
        },

        methods: {

            /*changePhoto(event){
                let file = event.target.files[0];

                 if(file.size>1048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Something went wrong!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.image = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }

            },*/

            addnewPost(){
                this.form.post('/savepost')
                    .then(()=>{
                        this.$router.push('/postlist')
                        Toast.fire({
                          type: 'success',
                          title: 'Post added successfully'
                        })
                    })
                    .catch(()=>{

                    })
            }
        
        }
        
    }
</script>