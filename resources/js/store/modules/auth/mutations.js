import * as types from './mutation-types';

export default {
    [types.login](state, payload) {
        state.token = payload;
    },
};