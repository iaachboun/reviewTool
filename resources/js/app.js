import Vue from 'vue'
import VueRouter from 'vue-router'
import review from './components/review'
import home from './components/home'
import app from './components/app'

Vue.config.productionTip = false;
Vue.use(VueRouter);

const routes = [
    {path: '/', component: home},
    {path: '/review', component: review},
];

const router = new VueRouter({
    routes: routes,
    mode: 'history',
});

new Vue({
    render: h => h(app),
    router,
}).$mount('#app');

