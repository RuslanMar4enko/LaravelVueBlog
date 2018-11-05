import api from '../config/api'

export default {
    async signIn(data) {
        const token = await  api().post('login', data);
        return token
    },

    async сheckIn(data){
        const user = await  api().post('register', data)
        return user
    }
}