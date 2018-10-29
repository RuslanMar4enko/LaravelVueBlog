export default {
    async getAticles() {
        const data = await window.axios.get('/api/video/general');
        return data;
    },

};