import auth from '../../../api/Auth'

// import * as types from './mutation-types';

export const signIn = async (context, payload) => {
    const json = await auth.signIn(payload);

    if (json.status === 200){
        return json;
    }

    throw json;
}


export default {
    signIn,
}