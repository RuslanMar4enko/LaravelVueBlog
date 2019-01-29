<template>
  <div>
    <div class="login-page">
      <div class="form">
        <div class="login-form">
          <small class="form-text text-danger" v-if="err">
            {{err}}
          </small>
          <small class="form-text text-danger" v-if="errors.has('email')">
            {{ errors.first('email') }}
          </small>
          <input v-model="email" class="input-login" type="text" placeholder="email" name="email"
                 :data-vv-as="'email'"
                 v-validate="'required|min:3|email'"/>
          <small class="form-text text-danger" v-if="errors.has('password')">
            {{ errors.first('password') }}
          </small>
          <input v-model="password" class="input-login" type="password" name="password" placeholder="password"
                 :data-vv-as="'password'"
                 v-validate="'required|min:6|max:16'"/>
          <button @click='singIn' class="login-btn">login</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  import Auth from "../../api/Auth";

  export default {
  	data() {
  		return {
  			email: null,
  			password: null,
  			err: null
  		};
  	},

  	mounted() {
  		this.ifSignIn();
  	},

  	methods: {
  		async singIn() {
  			const isValid = await this.$validator.validateAll();
  			if (isValid) {
  				try {
  					const {email, password} = this;
  					const auth = await Auth.signIn({
  						email,
  						password
  					});
  					const {token} = auth.data;
  					if (token) {
  						localStorage.setItem("token", token);
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

  		ifSignIn() {
  			if (localStorage.getItem("token")) {
  				this.$router.push({name: "AdminHome"});
  			}
  		}

  	},

  };

</script>
