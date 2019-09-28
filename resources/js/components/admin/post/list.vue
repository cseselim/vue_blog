<template>
    <div>
      <div class="card">
            <div class="card-header">
              <h2 class="card-title" style="font-size: 2.1rem;">Post List</h2>
              <div class="text-right">
              <router-link to="/addpost" class="btn btn-primary" href="">Add New</router-link>
            </div>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>title</th>
                  <th>discription</th>
                  <th>image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for='(post,index) in allposts'>
                  <td>{{ index+1 }}</td>
                  <td>{{post.title}}</td>
                  <td>{{post.description}}</td>
                  <td><img :src="ourImage(post.image)" alt="image" style="width: 54px"></td>
                  <td>
                    <router-link :to="'/editpost/' + post.id">Edit</router-link> |
                    <a href="" @click.prevent="deletepost(post.id)">delete</a>
                  </td>
                  
                </tr>

                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$store.dispatch('getallpost');
        },
        computed:{
          allposts() {
            return this.$store.getters.getAllpost;
          }
        },
        methods:{
          ourImage(img){
              return "uploadimage/"+img;
          },
          deletepost(id){
            axios.get('/postdelete/'+id)
            .then((response ) => { 
                this.$store.dispatch('getallpost')
                Toast.fire({
                  type: 'success',
                  title: 'Post Delete successfully'
                })
            })
          }
        }
    }
</script>

<style scoped>
  
</style>