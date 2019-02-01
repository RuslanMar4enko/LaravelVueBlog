import api from "../config/api";

export default {
	async getCategories(url){
		const response = await api.get(url);
		return response;
	}
};
