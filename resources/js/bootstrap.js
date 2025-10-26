import axios from 'axios';
import router from './router'
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
axios.defaults.xsrfCookieName = 'XSRF-TOKEN';
axios.defaults.xsrfHeaderName = 'X-XSRF-TOKEN';

window.axios.interceptors.response.use({}, error => {
    if (error.response.status === 401 || error.response.status === 419) {
        const token = localStorage.getItem('auth_token')
        if (token) {
            localStorage.removeItem('auth_token')
        }
     router.push({name: 'app.login'})
    }
})
