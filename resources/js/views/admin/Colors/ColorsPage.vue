<template>
  <div>
    <div class="main-admin-top container">
      <h1>Colors</h1>
      <table class="table">
        <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Code</th>
          <th scope="col">Colour</th>
          <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody v-for="item in colors">
        <tr>
          <th scope="row">{{item.id}}</th>
          <td>{{item.name}}</td>
          <td>{{item.code}}</td>
          <td><div class ="color-admin" :style="{background: item.code}"></div></td>
          <td>
        <!--<span @click="deleteLang(item.id)" class="fa fa-trash actions-icons delete-action"-->
              <!--aria-hidden="true"></span>-->
            <router-link :to="{name: 'UpdateColorsPage', params: { id: item.id }}"><span
              class="fa fa-pencil-square actions-icons update-action" aria-hidden="true"></span></router-link>
          </td>
        </tr>
        </tbody>
      </table>
      <router-link :to="{ name: 'CreateColorsPage'}">
        <button type="button" class="btn btn-success">Create</button>
      </router-link>
    </div>
  </div>
</template>


<script>
  import Colors from "../../../api/Colors";

  export default {
  	data() {
  		return {
  			colors: null,
  		};
  	},
  	mounted() {
  		this.getColors();
  	},
  	methods: {
  		async getColors() {
  			try {
  				const colors = await Colors.getColors();
  				if (colors.status === 200) {
  					this.colors = colors.data.data;
  				}
  			} catch (e) {

  			}
  		}
  	}
  };
</script>
