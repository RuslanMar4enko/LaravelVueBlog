import api from "../config/api";

export default {
	async getLang() {
		const response = await api.get("/api/admin/languages");
		return response;
	},
	async showLang(id) {
		const response = await api.get(`/api/admin/languages/${id}`);
		return response;
	},
	async saveLang(data) {
		const response = await api.post("/api/admin/language", data);
		return response;
	},
	async deleteLang(id) {
		const response = await api.delete(`/api/admin/language/${id}`);
		return response;
	},
	async updateLang(payload, id) {
		const response = await api.put(`/api/admin/language/${id}`, payload);
		return response;
	},

};
