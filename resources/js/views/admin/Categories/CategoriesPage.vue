<template>
  <div class="main-admin-top container">
    <h1>Category</h1>
    <div class="btn-cat">
      <router-link :to="{ name: 'CreateCategoryPage'}" class="btn btn-success">Create Category</router-link>
    </div>
    <div class="row">
      <div class="col-5 col-xs-12">
        <form class="form-group">
          <input v-model="filter" class="form-control" type="search" placeholder="Search on page" aria-label="Search">
        </form>
      </div>
      <div class="col-2 col-xs-12">
        <div class="tree-icons">
          <router-link data-description="Show Tree categories!" :to="{ name: 'TreePageCategories'}">
            <span class="fa fa-code-fork" aria-hidden="true"> </span>
          </router-link>
        </div>
      </div>
      <div class="col-5 col-xs-12">
        <div class="form-group">
          <select class="form-control" v-model="sort" id="exampleFormControlSelect1">
            <option value="" selected disabled hidden>Sort by page</option>
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
      <tbody v-for="item in ifSearch()">
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
  /* eslint-disable no-undef */

  import Category from "../../../api/Categories";
  import pagination from "laravel-vue-pagination";

  export default {
  	data() {
  		return {
  			paginate: {},
  			category: null,
  			categorySearc: null,
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
  				const url = "/api/admin/categories?page=" + page;
  				const categories = await Category.getCategories(url);
  				if (categories.status === 200) {
  					this.category = categories.data.data;
  					this.paginate = categories.data;
  				}
  			} catch (e) {
  			}
  		},

  		ifSearch(){
  			return this.categorySearc ? this.categorySearc : this.category;
  		},
  	}
  };
</script>
