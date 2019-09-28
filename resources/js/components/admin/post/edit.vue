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
                            <form role="form" enctype="multipart/form-data" @submit.prevent="updatepost">
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
                                          <option :value="cat.id" v-for='cat in allcategory'>{{ cat.name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Discription</label>
                                        <textarea class="textarea" placeholder="Enter discription here" style="width: 100%; height: 200px; font-size: 14px;line-height: 18px; border: 1px solid #dddddd; padding: 10px;" v-model="form.description" name="description">        
                                        </textarea>
                                    </div>
                                    <div class="form-group" >
                                        <input @change = "changePhoto($event)" name="image" type="file" :class="{ 'is-invalid': form.errors.has('image') }">
                                        <img :src="updateImage()" alt="" width="80" height="80">
                                        <has-error :form="form" field="image"></has-error>
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
      
      mounted() { // when page then this function load primary and get data from editpost route by id
            
            this.$store.dispatch('allcategory'); //for category load action first

            axios.get(`/editpost/${this.$route.params.id}`)
            .then((response) => {
        
                this.form.fill(response.data.post)
            })  
        },
        computed:{
          allcategory() {
            return this.$store.getters.getCategory //get all category after dispath allcategory
          }
        },

        data () { //get data then fill up all input field
            return {
              // Create a new form instance
              form: new Form({
                title:'',
                category_id:'',
                description:'',
                image: '',
                status: '',
              })
            }
          },
        methods: {
            updateImage(){ //image display on form
                let img = this.form.image;
                if(img.length>100){
                    return  this.form.image
                }else{
                    return `uploadimage/${this.form.image}`
                }
            },
            updatepost(){
                this.form.post(`/updatepost/${this.$route.params.id}`)
                .then((response) => {
                this.$router.push('/postlist');
                Toast.fire({
                  type: 'success',
                  title: 'Post Updated successfully'
                })
            })
            } 
        }
        
    }
</script>