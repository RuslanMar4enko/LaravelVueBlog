export default {
    async signIn(data) {
        const token = await  window.axios.post('/api/login', data);
        return token
    },

    async сheckIn(data){
        const user = await  window.axios.post('/api/register', data)
        return user
    }
}