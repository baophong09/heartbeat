import Axios from "axios";

class Api {
    constructor() {
        let token = window.localStorage.getItem('token') || '';

        this.axios = Axios.create({
            baseURL: 'http://127.0.0.1:8000/v1',
            headers: {
                'Access-Control-Allow-Origin': '*',
                'Content-Type': 'application/json',
                'Authorization': token
            },
            crossdomain: true
        });
    }

    get = (url, config) => {
        return this.axios.get(url, config);
    }

    post = (url, data, config) => {
        return this.axios.post(url, data, config);
    }

    put = (url, data, config) => {
        return this.axios.put(url, data, config);
    }

    delete = (url, config) => {
        return this.axios.delete(url, config);
    }
}

export default new Api();