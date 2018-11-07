import api from "../config/api";

export default {
	async getAticles() {
		const data = api().get("admin/articles");
		return data;
	},

};