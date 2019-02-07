<template>
  <div>
    <div class="main-admin-top container">
      <h1>New Language Registration</h1>
      <div>
        <small class="form-text text-danger" v-if="err">
          {{err}}
        </small>
        <div class="form-group">
          <label for="exampleInputLanguage">Name Language</label>
          <input v-model="name" type="text" class="form-control" id="exampleInputLanguage"
                 placeholder="Language" name="name"
                 :data-vv-as="'Language'"
                 v-validate="'required|max:2'">
          <small class="form-text text-danger" v-if="errors.has('name')">
            {{ errors.first('name') }}
          </small>
        </div>
        <button @click="saveLanguage" type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</template>

<script>
  import Lang from "../../../api/Languages";

  export default {
  	data() {
  		return {
  			name: null,
  			err: null
  		};
  	},
  	methods: {
  		async saveLanguage() {
  			try {
  				const isValid = await this.$validator.validateAll();
  				if (isValid) {
  					const {name} = this;
  					const lang = await Lang.saveLang({
  						name
  					});
  					if (lang.status === 201) {
  						this.$notify({
  							group: "foo",
  							title: "New Language",
  							text: "New Language created",
  							duration: 8000,
  							speed: 500
  						});
  						this.$router.push({name: "LanguagePage"});
  					}
  				}

  			} catch (e) {
  				if (e) {
  					this.err = "Name or email must be unique";
  				}
  				this.getErrors(e);
  			}
  		}
  	}
  };
</script>
