export default {
    async signIn(data) {
        const token = await  window.axios.post('/api/login', data);
        return token
    },

    async register(data){
        const user = await  window.axios.post('/api/register', data)
        return user
    }
}