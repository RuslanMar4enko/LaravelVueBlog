import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home';
import AdminHome from '../views/admin/Home';
import ArticlesPage from '../views/admin/Articles/ArticlesPage';
import AdminLogin from '../views/admin/LoginPage';


Vue.use(VueRouter);


const routes = [

    {
        path: '/',
        name: 'home',
        component: Home,
    },

    {
        path: '/admin/home',
        name: 'AdminHome',
        component: AdminHome,
    },

    {
        path: '/admin/login',
        name: 'AdminLogin',
        component: AdminLogin,
    },

    {
        path: '/admin/articles',
        name: 'ArticlesPage',
        component: ArticlesPage,
    },
];

const router = new VueRouter({
    routes,
});


export default router;