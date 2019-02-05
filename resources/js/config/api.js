import axios from "axios";
import Auth from "../api/Auth";

const api = axios.create({

});


api.interceptors.response.use(response => response, async error => {
	const status = error.response ? error.response.status : null;
	if (status === 401) {

		const token = await newToken();
		localStorage.setItem("token", token);
		error.config.headers.Authorization = `Bearer ${token}`;
		return api(error.config);

	} else {
		return Promise.reject(error);
	}
});

api.interceptors.request.use(request => {
	const token = localStorage.getItem("token");
	if (token) {
		request.headers.Authorization = `Bearer ${token}`;
	}
	return request;
});


const newToken = async function () {
	let newToken = await Auth.refreshToken();
	newToken = newToken.data.token;
	return newToken;
};

export default api;
