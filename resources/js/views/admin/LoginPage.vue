<template>
    <div>
        <div class="login-page">
            <div class="form">
                <div class="login-form">
                    <input v-model="username" class="input-login" type="text" placeholder="email"/>
                    <input v-model="password" class="input-login" type="password" placeholder="password"/>
                    <button @click='login' class="login-btn">login</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import * as types from '../../store/modules/auth/mutation-types';

    export default {
        data() {
            return {
                username: null,
                password: null
            }
        },

        methods: {
            async login() {
                try {
                    const token = await this.$store.dispatch('signIn', {
                        email: this.username,
                        password: this.password,
                    });
                    if (token.data.token) {
                        localStorage.setItem('token', token.data.token)
                        this.$store.commit(types.SIGN_IN, token.data.token)
                    }

                } catch (e) {
                    this.getErrors(e);
                }
            },

        }
    }

</script>