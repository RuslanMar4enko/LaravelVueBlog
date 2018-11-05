<template>
    <div>
        <div class="main-admin-top container">
            <h1>Add news</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody v-for="item in articles">
                <tr>
                    <th scope="row">{{item.id}}</th>
                    <td>{{item.title}}</td>
                    <td>{{item.image}}</td>
                    <td>{{item.description}}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                articles: null
            }
        },
        mounted() {
            this.$store.dispatch('getAticles')
        },
        computed: {
            articleData() {
                return this.$store.getters.articles
            },
        },
        watch: {
            articleData(articleData) {
                this.articles = articleData.data
            },
        },
    }
</script>