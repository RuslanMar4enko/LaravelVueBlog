import api from "../config/api";

export default {
	async getCategories(){
		const response = await api.get("admin/categories");
		return response;
	}
};
