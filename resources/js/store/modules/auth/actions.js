import auth from '../../../api/Auth'
import * as types from './mutation-types';


export const signIn = async (context, payload) => {
    const json = await auth.signIn(payload);

    if (json.status === 200){
        return json;
    }

    throw json;
}


export const сheckIn = async(context, payload) =>{
    const json = await auth.сheckIn(payload)

    if(json.status === 200){
        this.commit(types.CHECKIN, json.data)
    }
}


export default {
    signIn,
    сheckIn,
}