import auth from '../../../api/Auth'

import * as types from './mutation-types';

export const login = async ({ commit }) => {
    const json = await auth.login(commit);

    if (json.status === 200){
        commit(types.LOGIN, json.data);
        return json;
    }

    throw json;
};