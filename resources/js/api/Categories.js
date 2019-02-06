import api from "../config/api";

export default {
	async getCategories(url) {
		const response = await api.get(url);
		return response;
	},

	async nestedSetGetCategory() {
		const response = await api.get("/api/admin/nested/category");
		return response;
	},
	async nestedSetGetCategorySelect() {
		const response = await api.get("/api/admin/nested/category/select");
		return response;
	},
	async createCategory(payload) {
		const response = await api.post("/api/admin/category/create", payload);
		return response;
	},
};
