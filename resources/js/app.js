import Vue from 'vue'
import VueRouter from 'vue-router'
import review from './components/review'
import home from './components/home'
import app from './components/app'
import VueResource from 'vue-resource'

Vue.config.productionTip = false;
Vue.use(VueRouter);
Vue.use(VueResource);

const routes = [
    {path: '/', component: home},
    {path: '/review', component: review},
];

const router = new VueRouter({
    routes: routes
});

new Vue({
    render: h => h(app),
    router,
}).$mount('#app');


