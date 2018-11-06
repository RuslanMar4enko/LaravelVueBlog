<template>
    <div>
        <div class="main-admin-top container">
            <h1>New Language Registration</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputLanguage">Name Language</label>
                    <input v-model="name" type="text" class="form-control" id="exampleInputLanguage"
                           placeholder="Language">
                </div>
                <button @click="saveLanguage" type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: null
            }
        },
        methods: {
            async saveLanguage() {
                const lang = await this.$store.dispatch('saveLang', {
                    name: this.name,
                })

                if(lang.status === 201){

                }

            }
        }
    }
</script>