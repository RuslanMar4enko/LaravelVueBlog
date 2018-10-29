export default {
    async login(data) {
        let token = await  window.axios.post(data);
        return token;
    }
}