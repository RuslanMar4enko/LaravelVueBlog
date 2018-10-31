<template>
    <div>
        <div class="main-admin-top container">
            <h1>New User Registration</h1>
            <form >
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input v-model="name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp"
                           placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input v-model="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button @click="register" type="button" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: null,
                email: null,
                password: null
            }
        },

        methods:{
           async register()
            {
                try {
                  let user = await this.$store.dispatch('register', {
                      name: this.name,
                      email: this.email,
                      password: this.password
                    })
                    console.log(user);
                }catch (e) {
                    console.log(e);
                }
            }
        }
    }
</script>