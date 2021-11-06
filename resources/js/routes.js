import Vue from 'vue';
import VueRouter from 'vue-router';
import busComponent from './components/BusComponent';
import busStopComponent from './components/BusStopComponent';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: busComponent },
        { path: '/:busId', component: busStopComponent },
    ],
    mode: 'history'
})
