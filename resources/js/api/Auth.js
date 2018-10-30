export default {
    async signIn(data) {
        const token = await  window.axios.post('/api/login', data);
        return token;
    }
}