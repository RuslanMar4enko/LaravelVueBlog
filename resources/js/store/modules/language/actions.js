import language from "../../../api/Languages";
import * as types from "./mutation-types";

export const getLang = async ({ commit }) => {
	const json = await language.getLang();

	if (json.status === 200){
		commit(types.LANGUAGE, json.data);
		return json;
	}

	throw json;

};

export const  saveLang =  (context, payload) =>{
	const json =   language.saveLang(payload);
	if (json){
		return json;
	}

	throw json;
};


export default {
	getLang,
	saveLang,
};
