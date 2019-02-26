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
import TreePageCategories from "../views/admin/Categories/TreePageCategories";
import CreateCategoryPage from "../views/admin/Categories/CreateCategoryPage";
import UpdateCategoryPage from "../views/admin/Categories/UpdateCategoryPage";
import ColorsPage from "../views/admin/Colors/ColorsPage";
import CreateColorsPage from "../views/admin/Colors/CreateColorsPage";
import UpdateColorsPage from "../views/admin/Colors/UpdateColorsPage";
import MapPage from "../views/MapPage.vue";

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
		path: "/admin/language/update/:id",
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

	{
		path: "/admin/categories/tree",
		name: "TreePageCategories",
		component: TreePageCategories,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/categories/create",
		name: "CreateCategoryPage",
		component: CreateCategoryPage,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/categories/update/:id",
		name: "UpdateCategoryPage",
		component: UpdateCategoryPage,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/colors",
		name: "ColorsPage",
		component: ColorsPage,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/colors/create",
		name: "CreateColorsPage",
		component: CreateColorsPage,
		meta: {requiresAuth: true}
	},

	{
		path: "/admin/colors/update/:id",
		name: "UpdateColorsPage",
		component: UpdateColorsPage,
		meta: {requiresAuth: true}
	},

	{
		path: "/map",
		name: "MapPage",
		component: MapPage,
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
