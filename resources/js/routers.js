
import adminhome from './components/admin/adminhome.vue';

import categorylist from './components/admin/category/list.vue';
import addcategory from './components/admin/category/addnew.vue';
import viewcategory from './components/admin/category/view.vue';

import postlist from './components/admin/post/list.vue';
import addpost from './components/admin/post/addnew.vue';
import viewpost from './components/admin/post/view.vue';


export const routes = [
  { path: '/',component: adminhome},

  { path: '/categorylist',component: categorylist},
  { path: '/addcategory',component: addcategory},
  { path: '/viewcategory',component: viewcategory},

  { path: '/postlist',component: postlist},
  { path: '/addpost',component: addpost},
  { path: '/viewpost',component: viewpost},
]