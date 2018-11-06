import * as types from './mutation-types';


export default {

    [types.LANGUAGE](state, payload) {
        state.language = payload;
    },

}