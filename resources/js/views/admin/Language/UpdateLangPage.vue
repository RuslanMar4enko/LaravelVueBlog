<template>
  <div>
    <div class="main-admin-top container">
      <h1>Update Language</h1>
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
        <button @click="upfateLanguage" type="submit" class="btn btn-success">Submit</button>
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
  			landId: null,
  			err: null
  		};
  	},
  	mounted() {
  		this.landId = this.$route.params.id;
  		this.showLang();
  	},
  	methods: {
  		async showLang() {
  			try {
  				const lang = await Lang.showLang(this.landId);
  				if (lang.status === 200) {
  					this.name = lang.data.name;
  				}
  			} catch (e) {

  			}
  		},
  		async upfateLanguage() {
  			try {
  				const isValid = await this.$validator.validateAll();
  				if (isValid) {
  					const {name} = this;
  					const lang = await Lang.updateLang({
  						name
  					}, this.landId);
  					if (lang.status === 200) {
  						this.$notify({
  							group: "foo",
  							title: "Update Language",
  							text: "Update Language",
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
