export default class HttpService {

    static get() {
        const url = '/get';
        return axios.get(url);
    }
}
