import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import AdminHome from "../views/admin/Home";
import ArticlesPage from "../views/admin/Articles/ArticlesPage";
import CreateArticlesPage from "../views/admin/Articles/CreateArticlesPage";
import AdminLogin from "../views/admin/LoginPage";
import CheckIn from "../views/admin/CheckInPage";
import LanguagePage from "../views/admin/Language/LanguagePage";
import CreateLangPage from "../views/admin/Language/CreateLangPage";
import UpdateLangPage from "../views/admin/Language/UpdateLangPage";
import CategoriesPage from "../views/admin/Categories/CategoriesPage";

Vue.use(VueRouter);


const routes = [

	{
		path: "/",
		name: "home",
		component: Home,
	},

	{
		path: "/admin/home",
		name: "AdminHome",
		component: AdminHome,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/login",
		name: "AdminLogin",
		component: AdminLogin,
	},

	{
		path: "/admin/register",
		name: "CheckIn",
		component: CheckIn,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/articles",
		name: "ArticlesPage",
		component: ArticlesPage,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/articles/create",
		name: "CreateArticlesPage",
		component: CreateArticlesPage,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/language",
		name: "LanguagePage",
		component: LanguagePage,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/language/create",
		name: "CreateLangPage",
		component: CreateLangPage,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/language/update",
		name: "UpdateLangPage",
		component: UpdateLangPage,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/categories",
		name: "CategoriesPage",
		component: CategoriesPage,
		meta: {requiresAuth: true}
	},
];

const router = new VueRouter({
	routes,
});

router.beforeEach((to, from, next) => {
	if (to.meta.requiresAuth) {
		if (localStorage.getItem("token")) {
			next();
		} else {
			next({
				path: "/admin/login"
			});
		}
	} else {
		next();
	}
});


export default router;
