import axios from "axios";
import apiUrl from "./baseURL";

const api = axios.create({
	baseURL: apiUrl,
	headers: {Authorization: "Bearer " + localStorage.getItem("token")}
});

export default api;
