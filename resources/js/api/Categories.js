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
	async deleteCategory(id) {
		const response = await api.delete(`/api/admin/category/delete/${id}`);
		return response;
	},
	async showCategories(id) {
		const response = await api.get(`/api/admin/categories/${id}`);
		return response;
	},
	async updateCategories(payload, id) {
		const response = await api.put(`/api/admin/category/update/${id}`, payload);
		return response;
	},
};
