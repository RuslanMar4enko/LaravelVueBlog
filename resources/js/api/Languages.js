import api from "../config/api";

export default {
	async getLang() {
		const response = await api.get("/api/admin/languages");
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

};
