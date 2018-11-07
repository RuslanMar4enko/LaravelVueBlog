const camelCase = require("to-camel-case");

const getErors = {
	install(Vue) {
		Vue.mixin({
			methods: {
				getErrors(e) {
					const errors = (e.errors === undefined) ? e.response.data.errors : e.errors;

					Object.values(errors).forEach((item) => {
						this.$notify({
							type: "error",
							text: this.$t(`translation.${camelCase(item[0])}`),
						});
					});
				},
			}
		});
	}
};

export default getErors;

