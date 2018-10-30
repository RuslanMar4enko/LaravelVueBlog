<template>
    <div>
        <div class="container">
            {{articleData}}
        </div>
    </div>
</template>


<script>

    export default {
        data() {
            return {

            }
        },

        mounted() {
            this.$store.dispatch('getAticles');
        },
        computed: {
            articleData() {
                return this.$store.getters.articles;
            },
        },

        methods: {

        }


    }
</script>