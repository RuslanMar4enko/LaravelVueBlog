<template>
  <div class="main-admin-top container">
    <h1>Category Three</h1>
    <div class="tree-wrap">
      <v-tree :data='treeData' :multiple="false"/>
    </div>
  </div>
</template>

<script>
  import "vue-tree-halower/dist/halower-tree.min.css";
  import Category from "../../../api/Categories";




  export default {
  	data() {
  		return {
  			treeData: [],
  		};
  	},

  	components: {},

  	mounted() {
  		this.getTreeData();
  	},

  	methods: {
  		async getTreeData() {
  			const treeCategory = await Category.nestedSetGetCategory();
  			this.treeData = treeCategory.data;
  		},
  	},
  };
</script>
