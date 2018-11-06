import api from '../config/api'

export default {
    getLang() {
        const data =  api().get('admin/languages');
        return data;
    },

    saveLang(data)
    {
        const lang = api().post('admin/language', data);
        return lang
    }

};