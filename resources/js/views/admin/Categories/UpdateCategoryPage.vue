<template>
  <div class="main-admin-top container">
    <h1> Update Categories</h1>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Language</label>
      <select v-model="language" class="form-control" id="exampleFormControlSelect1"
              name="language"
              :data-vv-as="'Language'"
              v-validate="'required'"
      >
        <option v-for="lang in dataLanguage">{{lang.name}}</option>
      </select>
      <small class="form-text text-danger" v-if="errors.has('language')">
        {{ errors.first('language') }}
      </small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input v-model="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name"
             name="name"
             :data-vv-as="'Enter name'"
             v-validate="'required|min:2'"
      >
      <small class="form-text text-danger" v-if="errors.has('name')">
        {{ errors.first('name') }}
      </small>
    </div>
    <button @click="updateCategory" type="submit" class="btn btn-success">Submit</button>
  </div>
</template>

<script>
  import Treeselect from "@riophae/vue-treeselect";
  import "@riophae/vue-treeselect/dist/vue-treeselect.css";
  import Category from "../../../api/Categories";
  import Lang from "../../../api/Languages";

  export default {
  	data() {
  		return {
  			categoryId: null,
  			parent_id: null,
  			options: [],
  			language: null,
  			dataLanguage: null,
  			name: null,
  		};
  	},
  	components: {
  		Treeselect
  	},
  	mounted() {
  		this.categoryId = this.$route.params.id;
  		this.getCategorySelect();
  	},

  	methods: {
  		async getCategorySelect() {
  			const category = await Category.nestedSetGetCategorySelect();
  			this.options = category.data;
  			this.showCategory();
  			this.getLang();
  		},
  		async getLang() {
  			try {
  				const lang = await Lang.getLang();
  				const {data} = lang;
  				if (data) {
  					this.dataLanguage = data;
  				}
  			} catch (e) {

  			}
  		},
  		async showCategory() {
  			try {
  				const category = await Category.showCategories(this.categoryId);
  				if (category.status === 200) {
  					this.name = category.data.name;
  					this.language = category.data.language;
  					this.parent_id = category.data.parent_id;
  				}
  			} catch (e) {

  			}
  		},
  		async updateCategory() {
  			try {
  				const isValid = await this.$validator.validateAll();
  				if (isValid) {
  					const {name, language, parent_id} = this;
  					const category = await Category.updateCategories({
  						name,
  						language,
  						parent_id,
  					}, this.categoryId);
  					console.log(category);
  					if (category.status === 200) {
  						this.$notify({
  							group: "foo",
  							title: "Update Category",
  							text: "Update Category",
  							duration: 8000,
  							speed: 500
  						});
  						this.$router.push({name: "CategoriesPage"});
  					}
  				}
  			} catch (e) {

  			}
  		}
  	}
  };
</script>
