import auth from "../../../api/Auth";
import * as types from "./mutation-types";


export const signIn = (context, payload) => {
	const json = auth.signIn(payload);
	return json;
};


export const сheckIn = async(context, payload) =>{
	const json = await auth.сheckIn(payload);

	if(json.status === 200){
		this.commit(types.CHECKIN, json.data);
	}
};


export default {
	signIn,
	сheckIn,
};