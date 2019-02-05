import api from "../config/api";

export default {
	async signIn(payload) {
		const response = await api.post("/api/login", payload);
		return response;
	},

	async сheckIn(payload) {
		const response = await api.post("/api/register", payload);
		return response;
	},

	async refreshToken() {
		const response = await api.post("/api/refresh");
		return response;
	}

};
