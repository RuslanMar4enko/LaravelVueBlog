import axios from "axios";
import apiUrl from "./baseURL";

const api = axios.create({
	baseURL: apiUrl,
});

api.interceptors.request.use(request => {
	const token = localStorage.getItem("token");

	if (token) {
		request.headers.Authorization = `Bearer ${token}`;
	}
	return request;
});

export default api;
