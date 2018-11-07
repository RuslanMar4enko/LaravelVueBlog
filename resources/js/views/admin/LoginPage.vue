<template>
    <div>
        <div class="login-page">
            <div class="form">
                <div class="login-form">
                    <small class="form-text text-danger" v-if="err">
                        {{err}}
                    </small>
                    <small class="form-text text-danger" v-if="errors.has('username')">
                        {{ errors.first('username') }}
                    </small>
                    <input v-model="username" class="input-login" type="text" placeholder="email" name="username"
                           :data-vv-as="'email'"
                           v-validate="'required|min:3|email'"/>
                    <small class="form-text text-danger" v-if="errors.has('password')">
                        {{ errors.first('password') }}
                    </small>
                    <input v-model="password" class="input-login" type="password" name="password" placeholder="password"
                           :data-vv-as="'password'"
                           v-validate="'required|min:6|max:16'"/>
                    <button @click='login' class="login-btn">login</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import * as types from "../../store/modules/auth/mutation-types";

    export default {
    	data() {
    		return {
    			username: null,
    			password: null,
    			err: null
    		};
    	},

    	mounted() {
    		if (localStorage.getItem("token")) {
    			this.$router.push({name: "AdminHome"});
    		}
    	},

    	methods: {
    		async login() {

    			const results = Promise.all([
    				this.$validator.validate("username"),
    				this.$validator.validate("password")
    			]);
    			const valid = (await results).every(isValid => isValid);
    			if (valid) {
    				try {
    					const token = await this.$store.dispatch("signIn", {
    						email: this.username,
    						password: this.password,
    					});
    					if (token.data.token) {
    						localStorage.setItem("token", token.data.token);
    						this.$store.commit(types.TOKEN, token.data.token);
    						location.reload();
    						this.$router.push({name: "AdminHome"});
    					}

    				} catch (e) {

    					if (e) {
    						this.err = "Incorrect password or email";
    					}
    					this.getErrors(e);
    				}
    			}
    		},

    	},

    };

</script>