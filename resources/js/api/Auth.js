import api from "../config/api";

export default {
	async signIn(payload) {
		const response = await api.post("login", payload);
		return response;
	},

	async сheckIn(payload) {
		const response = api.post("register", payload);
		return response;
	}
};
