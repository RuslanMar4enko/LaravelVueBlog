<template>
  <div>
    <div class="main-admin-top container">
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" v-model="name" class="form-control" id="formGroupExampleInput" placeholder="Name"
               name="name"
               :data-vv-as="'Enter name'"
               v-validate="'required|min:2'"
        >
        <small class="form-text text-danger" v-if="errors.has('name')">
          {{ errors.first('name') }}
        </small>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Code</label>
        <input v-model="code" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Code"
               name="code"
               :data-vv-as="'Code'"
               v-validate="'required|min:2'"
        >
        <small class="form-text text-danger" v-if="errors.has('code')">
          {{ errors.first('code') }}
        </small>
      </div>
      <div class="form-group">
        <button @click="createColors()" type="button" class="btn btn-success">Create</button>
      </div>
    </div>
  </div>
</template>

<script>
  import Colors from "../../../api/Colors";

  export default {
  	data() {
  		return {
  			name: null,
  			code: null,
  		};

  	},

  	methods: {
  		async createColors() {
  			const isValid = await this.$validator.validateAll();
  			if (isValid) {
  				const {name, code} = this;
  				const colors = await Colors.createColors(
  					{
  						name,
  						code
  					}
  				);
  				if (colors.status === 201) {
  					this.$notify({
  						group: "foo",
  						title: "New Colors",
  						text: "New Colors created",
  						duration: 8000,
  						speed: 500
  					});
  					this.$router.push({name: "ColorsPage"});
  				}
  			}
  		}
  	}
  };
</script>
