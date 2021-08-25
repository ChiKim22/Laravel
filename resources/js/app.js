require('./bootstrap');

require('alpinejs');

windwo.Vue = require('vue');

Vue.component('comments-manager', require('./components/CommentManager.vue').default);

const app = new Vue({
    el:'#app',
});
