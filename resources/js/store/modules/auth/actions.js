import auth from '../../../api/Auth'
import * as types from './mutation-types';


export const signIn = async (context, payload) => {
    const json = await auth.signIn(payload);

    if (json.status === 200){
        return json;
    }

    throw json;
}


export const register = async(context, payload) =>{
    const json = await auth.register(payload)

    if(json.status === 200){
        this.commit(types.REGISTER, json.data)
    }
}


export default {
    signIn,
}