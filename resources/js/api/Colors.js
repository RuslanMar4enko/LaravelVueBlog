import api from "../config/api";

export default {
	async getColors() {
		const response = await api.get("api/admin/colors");
		return response;
	},
	async createColors(payload) {
		const response = await api.post("api/admin/colors", payload);
		return response;
	},

	async showColors(id) {
		const response = await api.get(`/api/admin/colors/${id}`);
		return response;
	},

	async updateColors(payload, id) {
		const response = await api.put(`/api/admin/colors/${id}`, payload);
		return response;
	},


};
