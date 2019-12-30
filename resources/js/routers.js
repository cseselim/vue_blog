
import adminhome from './components/admin/adminhome.vue';

import categorylist from './components/admin/category/list.vue';
import addcategory from './components/admin/category/addnew.vue';
import editcategory from './components/admin/category/edit.vue';

import postlist from './components/admin/post/list.vue';
import addpost from './components/admin/post/addnew.vue';
import editpost from './components/admin/post/edit.vue';


//frontend page route
import fronthome from './components/frontend/home.vue';


export const routes = [
  { path: '/admin',component: adminhome},

  { path: '/categorylist',component: categorylist},
  { path: '/addcategory',component: addcategory},
  { path: '/editcategory/:id',component: editcategory},

  { path: '/postlist',component: postlist},
  { path: '/addpost',component: addpost},
  { path: '/editpost/:id',component: editpost},
  
  //frontend page router
  { path: '/',component: fronthome},

]