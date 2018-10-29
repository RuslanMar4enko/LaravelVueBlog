import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

import articles from './modules/articles';


export default new Vuex.Store({
    /**
     * Assign the modules to the store.
     */
    modules: {

        articles,

    },
});
