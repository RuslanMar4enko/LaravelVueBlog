import * as types from './mutation-types';


export default {

    [types.ARTICLES](state, payload) {
        state.articles = payload;
    },

}