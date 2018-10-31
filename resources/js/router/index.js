import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home';
import AdminHome from '../views/admin/Home';
import ArticlesPage from '../views/admin/Articles/ArticlesPage';
import AdminLogin from '../views/admin/LoginPage';
import CheckIn from '../views/admin/CheckInPage';


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
        meta : { requiresAuth : true }
    },

    {
        path: '/admin/login',
        name: 'AdminLogin',
        component: AdminLogin,
    },

    {
        path: '/admin/register',
        name: 'CheckIn',
        component: CheckIn,
        meta : { requiresAuth : true }
    },

    {
        path: '/admin/articles',
        name: 'ArticlesPage',
        component: ArticlesPage,
        meta : { requiresAuth : true }
    },
];

const router = new VueRouter({
    routes,
});

router.beforeEach((to, from, next) => {
    if(to.meta.requiresAuth) {
        if(localStorage.getItem('token')) {
            next()
        } else {
            next({
                path : '/admin/login'
            })
        }
    } else {
        next()
    }
})


export default router;