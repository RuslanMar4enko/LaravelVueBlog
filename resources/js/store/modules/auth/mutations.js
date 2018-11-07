import * as types from "./mutation-types";

export default {
	[types.TOKEN](state, payload) {
		state.token = payload;
	},

	[types.CHECKIN](state, payload) {
		state.register = payload;
	}
};