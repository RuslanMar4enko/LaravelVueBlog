import api from "../config/api";

export default {
	signIn(data) {
		const token = api().post("login", data);
		return token;
	},

	сheckIn(data){
		const user = api().post("register", data);
		return user;
	}
};