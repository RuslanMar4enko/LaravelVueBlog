import * as types from './mutation-types';

export default {
    [types.SIGN_IN](state, payload) {
        state.token = payload;
    },

    [types.REGISTER](state, payload) {
        state.register = payload;
    }
};