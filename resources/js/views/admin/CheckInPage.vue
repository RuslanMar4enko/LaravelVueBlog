<template>
  <div>
    <div class="main-admin-top container">
      <h1>New User Registration</h1>
      <small class="form-text text-danger" v-if="err">
        {{err}}
      </small>
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <small class="form-text text-danger" v-if="errors.has('name')">
            {{ errors.first('name') }}
          </small>
          <input v-model="name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp"
                 placeholder="Enter name" name="name"
                 :data-vv-as="'name'"
                 v-validate="'required|min:3'">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <small class="form-text text-danger" v-if="errors.has('email')">
            {{ errors.first('email') }}
          </small>
          <input v-model="email" name="email" type="email" class="form-control" id="exampleInputEmail1"
                 aria-describedby="emailHelp"
                 placeholder="Enter email"
                 :data-vv-as="'email'"
                 v-validate="'required|min:3|email'">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <small class="form-text text-danger" v-if="errors.has('password')">
            {{ errors.first('password') }}
          </small>
          <input v-model="password" name="password" type="password" class="form-control" id="exampleInputPassword1"
                 placeholder="Password"
                 :data-vv-as="'password'"
                 v-validate="'required|min:6|max:16'">
        </div>
        <button @click="register" type="button" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
</template>

<script>
  import Auth from "../../api/Auth";

  export default {
  	data() {
  		return {
  			name: null,
  			email: null,
  			password: null,
  			err: null
  		};
  	},

  	methods: {
  		async register() {
  			try {
  				const isValid = await this.$validator.validateAll();
  				if (isValid) {
  					let {name, email, password} = this;
  					const сheckIn = await Auth.сheckIn({
  						name,
  						email,
  						password,
  					});
  					if (сheckIn.status === 201) {
  						this.$notify({
  							group: "foo",
  							title: "New user",
  							text: "New User created",
  							duration: 8000,
  							speed: 500
  						});
  						this.name = this.email = this.password = null;
  						this.err = null;
  					}
  				}
  				this.$validator.reset();
  				this.errors.clear();
  			} catch (e) {
  				if (e) {
  					this.err = "Name or email must be unique";
  				}
  				this.getErrors(e);
  			}
  		},


  	}
  };
</script>
