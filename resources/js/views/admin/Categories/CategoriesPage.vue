<template>
  <div class="main-admin-top container">
    <h1>Category</h1>
  </div>
</template>

<script>
  import Category from "../../../api/Categories";

  export default {
  	data() {
  		return {
  			category: null,
  		};
  	},
  	mounted() {
  		this.getCategories();
  	},
  	methods: {
  		async getCategories() {
  			try {
  				const categories = await Category.getCategories();
  				if (categories.status == 200) {
  					this.category = categories.data;
  				}
  			} catch (e) {
  				console.log(e);
  			}
  		}
  	}
  };
</script>
