import Vue from "vue";
import VeeValidate from "vee-validate";

import validationUa from "../../../node_modules/vee-validate/dist/locale/en.js";

Vue.use(VeeValidate, {
	locale: "en",
	dictionary: {
		en: validationUa,
	},
});
