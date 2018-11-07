<template>
    <div>
        <page-header-admin v-if="$route.name !== 'AdminLogin' &&  $route.meta.requiresAuth !== undefined"></page-header-admin>
        <notifications group="foo" />
        <router-view></router-view>
    </div>
</template>

<script>
    import PageHeaderAdmin from "../components/admin/Header";
    export default {
    	data(){
    		return{

    		};
    	},
    	components:{
    		PageHeaderAdmin
    	},
    };
</script>