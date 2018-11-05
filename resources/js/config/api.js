import axios from 'axios'
import apiUrl from './baseURL'

export default () => {
    return axios.create({
        baseURL: apiUrl
    });
}
