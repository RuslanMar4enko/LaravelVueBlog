export default {
    async getAticles() {
        const data = await window.axios.get('/api/admin/articles');
        return data;
    },

};