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

Vue.use(Notifications);
Vue.use(getErrors);

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
