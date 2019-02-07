<template>
  <div>
    <div class="main-admin-top container">
      <h1>Language</h1>
      <table class="table">
        <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody v-for="item in language">
        <tr>
          <th scope="row">{{item.id}}</th>
          <td>{{item.name}}</td>
          <td>
            <span @click="deleteLang(item.id)" class="fa fa-trash actions-icons delete-action"
                  aria-hidden="true"></span>
            <router-link :to="{name: 'UpdateLangPage', params: { id: item.id }}"><span class="fa fa-pencil-square actions-icons update-action" aria-hidden="true"></span></router-link>
          </td>
        </tr>
        </tbody>
      </table>
      <router-link :to="{ name: 'CreateLangPage'}">
        <button type="button" class="btn btn-success">Create</button>
      </router-link>
    </div>
  </div>
</template>
<script>
  import Lang from "../../../api/Languages";

  export default {
  	data() {
  		return {
  			language: null
  		};
  	},
  	mounted() {
  		this.getLang();
  	},
  	methods: {
  		async getLang() {
  			try {
  				const lang = await Lang.getLang();
  				const {data} = lang;
  				if (data) {
  					this.language = data;
  				}
  			} catch (e) {

  			}
  		},

  		async deleteLang(id) {
  			try {
  				const category = await Lang.deleteLang(id);
  				if (category.status === 200) {
  					console.log([category.data.status]);
  					const index = this.language.findIndex(s => s.id === category.data.status.id);
  					this.language.splice(index, 1);
  					this.$notify({
  						group: "foo",
  						title: "Language delete",
  						text: "Language delete",
  						duration: 8000,
  						speed: 500
  					});
  				}


  			} catch (e) {

  			}
  		}
  	}

  };
</script>
