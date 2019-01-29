import api from "../config/api";

export default {
	async getLang() {
		const response = await api.get("admin/languages");
		return response;
	},

	async saveLang(data) {
		const response = await api.post("admin/language", data);
		return response;
	}

};
