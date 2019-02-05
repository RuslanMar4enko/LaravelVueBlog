import api from "../config/api";

export default {
	async getAticles() {
		const data = api().get("/api/admin/articles");
		return data;
	},

};
