import * as types from './mutation-types';

export default {
    [types.LOGIN](state, payload) {
        state.token = payload;
    },
};