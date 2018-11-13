import Vue from 'vue';
import VueRouter from 'vue-router';
import review from './components/review.vue'
import home from './components/home.vue'
import app from './components/app.vue'

Vue.use(VueRouter);

const routes = [
    { path: '/review', component: review},
    { path: '/', component: home}
];

const router = new VueRouter({
    routes: routes
})

new Vue({
   render: h => h(app),
   router,
}).$mount('#app');

