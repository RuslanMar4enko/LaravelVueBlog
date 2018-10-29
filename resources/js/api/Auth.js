export default {
    async login() {
        let token = await  window.axios.post(data);
        return token;
    }
}