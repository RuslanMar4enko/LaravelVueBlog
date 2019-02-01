<template>
  <div class="main-admin-top container">
    <h1>Category</h1>
    <div class="row">
      <div class="col-5">
        <nav class="navbar navbar-light bg-light">
          <form class="form-inline">
            <input v-model="filter" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          </form>
        </nav>
      </div>
      <div class="col-2">

      </div>
      <div class="col-5">
        <div class="form-group">
          <select class="form-control" v-model="sort" id="exampleFormControlSelect1">
            <option value="" selected disabled hidden>Sort by</option>
            <option v-for="item in options" :value="item.value">{{item.label}}</option>
          </select>
        </div>
      </div>
    </div>
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
      <tbody v-for="item in categorySearc? categorySearc : category">
      <tr>
        <th scope="row">{{item.id}}</th>
        <td>{{item.name}}</td>
        <td>{{item.parent_id}}</td>
        <td>{{item.language}}</td>
        <td>
          <span class="fa fa-trash actions-icons delete-action" aria-hidden="true"></span>
          <span class="fa fa-pencil-square actions-icons update-action" aria-hidden="true"></span>
        </td>
      </tr>
      </tbody>
    </table>
    <div class="pagun">
      <pagination :data="paginate" @pagination-change-page="getCategories">
        <span slot="prev-nav">&lt;<</span>
        <span slot="next-nav">>&gt;</span>
      </pagination>
    </div>
  </div>
</template>

<script>
  import Category from "../../../api/Categories";
  import pagination from "laravel-vue-pagination";

  export default {
  	data() {
  		return {
  			category: null,
  			categorySearc: null,
  			paginate: null,
  			sort: "",
  			filter: "",
  			options: [
  				{label: "DESC", value: "views"},
  				{label: "ASC", value: "none"},
  			],
  		};
  	},
  	components: {
  		pagination,
  	},
  	mounted() {
  		this.getCategories();
  	},
  	watch: {
  		sort(data) {
  			if (data === "views") {
  				this.category = _.orderBy(this.category, "id", "desc");
  			} else {
  				this.category = _.orderBy(this.category, "id", "asc");
  			}

  		},
  		filter(data) {
  			if (data) {
  				this.categorySearc = this.category.filter((player) => {
  					return player.name.toLowerCase().includes(this.filter.toLowerCase());
  				});
  			} else {
  				this.categorySearc = null;
  				return this.category;
  			}
  		},
  	},
  	methods: {
  		async getCategories(page = 1) {
  			try {
  				const url = "admin/categories?page=" + page;
  				const categories = await Category.getCategories(url);
  				if (categories.status === 200) {
  					this.category = categories.data.data;
  					this.paginate = categories.data;
  				}
  			} catch (e) {
  			}
  		},
  	}
  };
</script>
