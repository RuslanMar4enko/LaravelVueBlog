import auth from '../../../api/Auth'

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