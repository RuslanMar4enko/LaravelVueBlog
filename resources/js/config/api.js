import axios from "axios";
import apiUrl from "./baseURL";
import Auth from "../api/Auth";

const api = axios.create({
	baseURL: apiUrl,
});


api.interceptors.response.use(response => response, error => {
	const status = error.response ? error.response.status : null;

	if (status === 401) {
		Auth.refreshToken().then(newToken => {
			const token = newToken.data.token;
			localStorage.removeItem("token");
			localStorage.setItem("token", token);
			error.config.headers.Authorization = `Bearer ${token}`;
			return api(error.config);
		});

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


export default api;
