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
                        <span  class="fa fa-trash actions-icons delete-action" aria-hidden="true"></span>
                        <span  class="fa fa-pencil-square actions-icons update-action" aria-hidden="true"></span>
                    </td>
                </tr>
                </tbody>
            </table>
                <router-link :to="{ name: 'CreateLangPage'}"> <button type="button" class="btn btn-success">Create</button> </router-link>

        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                language: null
            }
        },
        mounted() {
            this.$store.dispatch('getLang')
        },
        computed: {
            langData() {
                return this.$store.getters.language
            },
        },
        watch: {
            langData(langData) {
                this.language = langData.data
            },
        },
    }
</script>