export default {
	state: {
    	category:[],
      allpost:[],
  	},
	getters: {
    	getCategory(state){ //this getCategory function is use in list.veu computed methods
  			return state.category;
  		},
      getAllpost(state){
        return state.allpost;
      }
  	},

  	actions: {
      //get all category action
    	allcategory(context){
    		axios.get('/category')//action will be laravel category route
    		.then((response ) => { 
                context.commit('categories',response.data.categories)
            })
    	},

      //get all post action
      getallpost(context){
        axios.get('/allpostget') //action will be laravel allpostget route
        .then((response) => {
          context.commit('allpostcommit',response.data.allposts)
        })
      }
  	},

  	mutations: {
      //get all category commit
    	categories(state,data){
    		return state.category = data
    	},

      //get all post commit
      allpostcommit(state,data){
        return state.allpost = data
      }
  	},

}