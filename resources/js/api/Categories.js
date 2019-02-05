import api from "../config/api";

export default {
	async getCategories(url) {
		const response = await api.get(url);
		return response;
	},

	async nestedSetGetCategory() {
		const response = await  api.get("/api/admin/nested/category");
		return response;
	}
};
