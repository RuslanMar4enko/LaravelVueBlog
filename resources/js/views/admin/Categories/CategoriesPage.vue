<template>
  <div class="main-admin-top container">
    <h1>Category</h1>
    <table class="table">
      <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Parent Category Id</th>
        <th scope="col">Language</th>
        <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody v-for="item in category">
      <tr v-for="cat in item.categories">
        <th scope="row">{{cat.id}}</th>
        <td>{{cat.name}}</td>
        <td>{{cat.parent_id}}</td>
        <td>{{item.name}}</td>
        <td>
          <span class="fa fa-trash actions-icons delete-action" aria-hidden="true"></span>
          <span class="fa fa-pencil-square actions-icons update-action" aria-hidden="true"></span>
        </td>
      </tr>
      </tbody>
    </table>
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
  				if (categories.status === 200) {
  					this.category = categories.data;
  				}
  			} catch (e) {
  			}
  		}
  	}
  };
</script>
