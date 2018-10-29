import auth from '../../../api/Auth'

import * as types from './mutation-types';

export const login = async ({ commit }) => {
    const json = await auth.login();

    if (json.status === 200){
        commit(types.login, json.data);
        return json;
    }

    throw json;
};