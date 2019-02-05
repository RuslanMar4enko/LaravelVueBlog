/**
 * Will initialize the application.
 */

import Vue from "vue";

/**
 * Import and bootstrap the plugins.
 */

import "./bootstrap";
import router from "./router";
import store from "./store";
import i18n from "./plugins/lang";
import getErrors from "./plugins/GetErrors";
import "./plugins/vee-validate";
import Notifications from "vue-notification";
import VTree from "vue-tree-halower";

Vue.use(Notifications);
Vue.use(getErrors);
Vue.use(VTree);

/**
 * Main App.
 *
 * Last but not least, we import the main application.
 */

import App from "./views/App.vue";

new Vue({
	router,
	store,
	i18n,
	el: "#app",
	template: "<App/>",
	components: { App },
});
