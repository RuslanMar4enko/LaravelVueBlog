<template>
    <div>
        <div class="login-page">
            <div class="form">
                <div class="login-form">
                    <input v-model="username" class="input-login" type="text" placeholder="username"/>
                    <input v-model="password" class="input-login" type="password" placeholder="password"/>
                    <button @click = 'login' class="login-btn">login</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import * as types from '../../store/modules/auth/mutation-types';
    export default
    {
        data(){
            return{
                    username: null,
                    password: null


            }
        },

        methods: {
            login(){
                try {
                    this.$store.dispatch('login', {
                        email: this.email,
                        tags: this.password,
                    });

                } catch (e) {
                    this.getErrors(e);
                }
            }
        }
    }

</script>