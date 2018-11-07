
import article from "../../../api/Articles";
import * as types from "./mutation-types";

export const getAticles = async ({ commit }) => {
	const json = await article.getAticles();

	if (json.status === 200){
		commit(types.ARTICLES, json.data);
		return json;
	}

	throw json;

};


export default {
	getAticles,
};